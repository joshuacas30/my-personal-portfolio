<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data without sanitization or validation
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $message = $_POST['message'];

    // Validate if email ends with @gmail.com
    if (substr($user_email, -10) !== '@gmail.com') {
        echo "<script>alert('Invalid email address. Please enter a valid email address.')</script>";
        echo "<script>window.open('index.html','_self')</script>";
        exit; // Stop further execution
    }

    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'castillon.joshua30@gmail.com'; // Your Gmail address
        $mail->Password = 'lyql gjuw ttcz waei'; // Your Gmail password (or app password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($user_email, $user_name); // Sender's email address and name
        $mail->addAddress('castillon.joshua30@gmail.com'); // Your email address
        $mail->addReplyTo($user_email, $user_name); // User's email address for reply

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission';
        $mail->Body = "Name: $user_name<br>Email: $user_email<br>Message: $message";

        // Send email
        $mail->send();
        echo "<script>alert('Message has been sent!')</script>";
        echo "<script>window.open('index.html','_self')</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
