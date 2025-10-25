<?php
// export_local_changes.php
// Usage: place in a web-accessible path and visit it, or run via CLI (adjust headers removal for CLI).
// WARNING: This script runs git shell commands. Make sure your PHP environment allows shell_exec/exec
// and that git is installed and accessible to the PHP process.

set_time_limit(0);
$repoPath = 'C:\xampp\htdocs\alqurraa'; // <--- change if needed

function run($cmd, &$exitCode = null) {
    // run and capture both stdout and stderr
    $out = [];
    exec($cmd . ' 2>&1', $out, $exitCode);
    return implode("\n", $out);
}

// 1) validate repo path
if (!is_dir($repoPath)) {
    http_response_code(500);
    echo "Repository path does not exist: $repoPath";
    exit;
}

$cwd = getcwd();
chdir($repoPath);

// quick check: is this a git repo?
$exit = 0;
$gitCheck = run('git rev-parse --is-inside-work-tree', $exit);
if ($exit !== 0 || trim($gitCheck) !== 'true') {
    chdir($cwd);
    http_response_code(500);
    echo "Path is not a git repository or git is not available.";
    exit;
}

// create temp dir
$tmpRoot = sys_get_temp_dir();
$stamp = 'export_local_changes_' . date('Ymd_His') . '_' . uniqid();
$tmpDir = $tmpRoot . DIRECTORY_SEPARATOR . $stamp;
if (!mkdir($tmpDir, 0777, true)) {
    chdir($cwd);
    http_response_code(500);
    echo "Failed to create temp directory: $tmpDir";
    exit;
}

// 2) get list of untracked files
$untrackedRaw = run('git ls-files --others --exclude-standard');
$untracked = array_filter(array_map('trim', explode("\n", $untrackedRaw)));

// 3) determine upstream existence
$upstreamCheck = run('git rev-parse --abbrev-ref --symbolic-full-name @{u} 2>&1', $exit);
$hasUpstream = ($exit === 0 && trim($upstreamCheck) !== '');

// 4) commits ahead of upstream (or all local commits if no upstream)
$commitsInfo = '';
if ($hasUpstream) {
    // list commits that are in HEAD but not in upstream
    $commitListRaw = run('git log --pretty=format:"%H %an %ad %s" @{u}..HEAD');
    $commitHashesRaw = run('git log --pretty=format:"%H" @{u}..HEAD');
} else {
    // no upstream: treat all commits as "local"
    // find root commit
    $rootHash = trim(run('git rev-list --max-parents=0 HEAD'));
    if ($rootHash === '') $rootHash = 'HEAD'; // fallback
    $commitListRaw = run('git log --pretty=format:"%H %an %ad %s" ' . escapeshellarg($rootHash) . '..HEAD');
    $commitHashesRaw = run('git log --pretty=format:"%H" ' . escapeshellarg($rootHash) . '..HEAD');
}

$commitsInfo = trim($commitListRaw);
$commitHashes = array_filter(explode("\n", trim($commitHashesRaw)));

// 5) prepare files in tmp dir
$filesAdded = [];

if (!empty($untracked)) {
    foreach ($untracked as $f) {
        // skip empty lines
        if ($f === '') continue;
        $src = $repoPath . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $f);
        if (!file_exists($src)) continue; // safety
        $dest = $tmpDir . DIRECTORY_SEPARATOR . $f;
        $destDir = dirname($dest);
        if (!is_dir($destDir)) mkdir($destDir, 0777, true);
        copy($src, $dest);
        $filesAdded[] = $f;
    }
}

// 6) create diff/patches
$patchesDir = $tmpDir . DIRECTORY_SEPARATOR . 'patches';
mkdir($patchesDir, 0777, true);

if ($hasUpstream) {
    // create patch files for each commit and a combined diff
    run('git format-patch @{u}..HEAD -o ' . escapeshellarg($patchesDir));
    run('git diff @{u}..HEAD > ' . escapeshellarg($tmpDir . DIRECTORY_SEPARATOR . 'diff.patch'));
} else {
    // no upstream: create patches from root to HEAD and a merged diff
    $rootHash = trim(run('git rev-list --max-parents=0 HEAD'));
    if ($rootHash === '') $rootHash = 'HEAD';
    run('git format-patch ' . escapeshellarg($rootHash) . '..HEAD -o ' . escapeshellarg($patchesDir));
    run('git diff ' . escapeshellarg($rootHash) . '..HEAD > ' . escapeshellarg($tmpDir . DIRECTORY_SEPARATOR . 'diff.patch'));
}

// 7) commits.txt
file_put_contents($tmpDir . DIRECTORY_SEPARATOR . 'commits.txt', $commitsInfo === '' ? "No local commits found.\n" : $commitsInfo);

// 8) summary file
$summary = "Repository: $repoPath\nExport date: " . date('c') . "\n\n";
$summary .= "Untracked files found: " . count($untracked) . "\n";
foreach ($untracked as $u) $summary .= " - $u\n";
$summary .= "\nLocal commits (HEAD vs upstream):\n" . ($commitsInfo ?: "None") . "\n";
file_put_contents($tmpDir . DIRECTORY_SEPARATOR . 'README-export.txt', $summary);

// 9) create zip
$zipName = $tmpRoot . DIRECTORY_SEPARATOR . $stamp . '.zip';
$zip = new ZipArchive();
if ($zip->open($zipName, ZipArchive::CREATE) !== TRUE) {
    chdir($cwd);
    echo "Failed to create zip file.\n";
    // cleanup attempt
    // (do not be too aggressive)
    exit;
}

$addFolderRecursively = function($dir, $basePath) use ($zip, &$addFolderRecursively) {
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::LEAVES_ONLY
    );
    foreach ($files as $file) {
        /** @var SplFileInfo $file */
        $filePath = $file->getRealPath();
        $relative = substr($filePath, strlen($basePath) + 1);
        $zip->addFile($filePath, $relative);
    }
};

// add everything in tmpDir to zip
$addFolderRecursively($tmpDir, $tmpDir);

$zip->close();

// 10) stream zip to client for download
// If running via CLI, just output file path
if (php_sapi_name() === 'cli') {
    echo "Created zip: $zipName\n";
    echo "Temporary export dir: $tmpDir\n";
    chdir($cwd);
    exit;
}

// Send headers and file
$downloadName = 'local_changes_export_' . date('Ymd_His') . '.zip';
header('Content-Type: application/zip');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="' . basename($downloadName) . '"');
header('Content-Length: ' . filesize($zipName));
header('Pragma: public');
flush();
readfile($zipName);

// 11) cleanup (remove tmp dir and zip after sending)
@unlink($zipName);

// remove temp directory recursively
function rrmdir($dir) {
    if (!is_dir($dir)) return;
    $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
    foreach($files as $file) {
        if ($file->isDir()) rmdir($file->getRealPath());
        else unlink($file->getRealPath());
    }
    rmdir($dir);
}
rrmdir($tmpDir);

chdir($cwd);
exit;
