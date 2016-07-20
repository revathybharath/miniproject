<?php include 'header.php'?>

<?php 
$email = $_POST['email'];
$message = "I would like to subscribe to your blog using the entered email address";
$formcontent="From: $email \n Message: $message";
$recipient = "odonnellconnie@gmail.com";
$subject = "Subscribe";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You! You have been added to our subscriber list via your email.";
?>

<?php include 'footer.php'?>