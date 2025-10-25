<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Store the email in a database (optional)
    // Example: Use MySQL to insert the email into a "waiting_list" table

    // Send the email to your inbox
    $to = 'amudarash102@gmail.com';
    $subject = 'New Waiting List Sign-up';
    $message = "New email sign-up: $email";
    $headers = 'From: amudarash102@gmail.com' . "\r\n" .
               'Reply-To: amudarash102@gmail.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

   // Send the email
   if (mail($to, $subject, $message, $headers)) {
    // Display a styled success message
    echo '<html>
            <head>
                <style>
                    /* Styles for the success message */
                    .success-popup {
                        display: none;
                        position: fixed;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        background-color: #ffffff;
                        border: 1px solid #ccc;
                        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                        padding: 20px;
                        text-align: center;
                        z-index: 9999;
                    }

                    /* Styles for the OK button */
                    .ok-button {
                        background-color: #007bff;
                        color: #fff;
                        padding: 10px 20px;
                        border: none;
                        cursor: pointer;
                    }
                </style>
            </head>
            <body>
                <div class="success-popup">
                    <p>Wow! You are now on the waiting list.</p>
                    <button class="ok-button" onclick="closePopup()">OK</button>
                </div>
                <script>
                    // Function to close the success message popup
                    function closePopup() {
                        document.querySelector(".success-popup").style.display = "none";
                        window.location.href = "../index.php";
                    }
                    
                    // Show the success message popup
                    document.querySelector(".success-popup").style.display = "block";
                </script>
            </body>
        </html>';
} else {
    echo "<script>alert('You could not join the waiting list now. Please try again later.'); window.location.href = '../index.php';</script>";
}

} else {
// Redirect back to index.php if accessed directly
header("Location: ../index.php");
}
?>
