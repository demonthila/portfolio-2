<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['massage'], FILTER_SANITIZE_STRING);

    // Email details
    $to = "yourprivateemail@example.com";  // Replace with your private email
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    // Additional headers for a more formatted email
    $full_message = "You have received a new message from your contact form on your website.\n\n";
    $full_message .= "Here are the details:\n\n";
    $full_message .= "Email: " . $email . "\n";
    $full_message .= "Subject: " . $subject . "\n";
    $full_message .= "Message: \n" . $message . "\n";

    // Send email
    if (mail($to, $subject, $full_message, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send the message.";
    }
} else {
    echo "Invalid request method.";
}
?>
