<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// $htmlContent = file_get_contents("email.html");
$htmlContent = "Thank you for reaching out to Wyoming Business Transitions.

We truly value your time and will be getting back to you as soon as we can to schedule a meeting. While you wait, please take the time to fill out an Exit Map Survey. Having the survey completed in advance of a meeting will greatly expediate our processes.

The following link will take you to a complementary survey that will provide you with a free 12 page report on your business: http://myexitmap.com

  Thank you again and we look forward to working with you!
  Wyoming Business Transitions";

// Create the email and send the message
$to = 'mschulte@wyobt.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_subject_autoReply = "Thank you for reaching out to WyoBT";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: mschulte@wyobt.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $to";
mail($to,$email_subject,$email_body,$headers);
mail($email_address,$email_subject_autoReply,$htmlContent,$headers);
return true;
?>
