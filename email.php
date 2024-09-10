<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Validate the email address
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // Recipient email
        $to = "hamzawaheed057@gmail.com"; // Replace with your email address
        
        // Email subject
        $subject = "Contact Form Submission from $name";
        
        // Email message body
        $body = "
        Name: $name\n
        Email: $email\n
        Phone: $phone\n
        Message:\n$message
        ";
        
        // Email headers
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        
        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Email sent successfully!";
        } else {
            echo "Failed to send email.";
        }
        
    } else {
        echo "Invalid email format.";
    }
}
?>
