<?php
// Check for empty fields and validate email
if(empty($_POST['name']) ||
   empty($_POST['email']) ||
   empty($_POST['message']) ||
   !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "No arguments Provided or Invalid Email!";
    return false;
}

$name = htmlspecialchars(strip_tags($_POST['name']));
$email_address = htmlspecialchars(strip_tags($_POST['email']));
$message = htmlspecialchars(strip_tags($_POST['message']));

// Create the email and send the message
$to = 'Owusuafriyiemanuel@gmail.com'; // Recipient's email address
$email_subject = "Website Contact Form: $name";
$email_body = "You have received a new message from your website contact form.\n\n".
              "Here are the details:\n\n".
              "Name: $name\n\n".
              "Email: $email_address\n\n".
              "Message:\n$message";

// Set up headers for the email
$headers = "From: Owusuafriyiemanuel@gmail.com\r\n"; // Use a valid domain for the 'From' address
$headers .= "Reply-To: $email_address\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n"; // Ensure proper encoding

// Send the email
if(mail($to, $email_subject, $email_body, $headers)) {
    echo "Message sent successfully!";
    return true;
} else {
    echo "Message delivery failed.";
    return false;
}
?>
