<?php
error_reporting (E_All);
ini_set('display_errors', 1);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>alert('Please fill in all fields.'); window.location.href = 'index.php';</script>";
    } else {
        // Set your email address where you want to receive messages
        $to = "amudarash102@gmail.com";

        // Email subject
        $subject = "New Contact Message from $name";

        // Email headers
        $headers = "From: $email" . "\r\n" .
            "Reply-To: $email" . "\r\n" .
            "X-Mailer: PHP/" . phpversion();

        // Compose the email message
        $emailMessage = "Name: $name\n\n";
        $emailMessage .= "Email: $email\n\n";
        $emailMessage .= "Message:\n$message";

        // Send the email
        if (mail($to, $subject, $emailMessage, $headers)) {
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
                            <p>Message sent successfully.</p>
                            <button class="ok-button" onclick="closePopup()">OK</button>
                        </div>
                        <script>
                            // Function to close the success message popup
                            function closePopup() {
                                document.querySelector(".success-popup").style.display = "none";
                                window.location.href = "index.php";
                            }
                            
                            // Show the success message popup
                            document.querySelector(".success-popup").style.display = "block";
                        </script>
                    </body>
                </html>';
        } else {
            echo "<script>alert('Message could not be sent. Please try again later.'); window.location.href = 'index.php';</script>";
        }
    }
} else {
    // Redirect back to index.php if accessed directly
    header("Location: index.php");
}
?>
