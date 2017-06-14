<?php


$name = strip_tags(htmlspecialchars($_POST['contactName']));
$email_address = strip_tags(htmlspecialchars($_POST['contactEmail']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['contactMessage']));

// Create the email and send the message
$to = 'amadc2207@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body .= "\n";
$email_body .= "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$email_body .= "\n";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
file_put_contents('email.txt', $email_body, FILE_APPEND | LOCK_EX);

return true;
?>