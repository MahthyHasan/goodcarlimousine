<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient_email = "contact@goodcarslimousine.com"; 

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Compose the email message
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n";
    $email_body .= "Message:\n$message";

    // Send the email
    $headers = "From: $email\r\n";
    if (mail($recipient_email, $email_subject, $email_body, $headers)) {
        // Email sent successfully
        echo "Thank you for your message. We will get back to you shortly.";
        header("refresh:5;url=index.html");
        exit();
    } else {
        // Error sending email
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>