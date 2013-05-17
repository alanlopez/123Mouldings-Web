<?php
$name=$_POST['name'];
$phone=$_POST['telefono'];
$email=$_POST['email'];
$city=$_POST['ciudad'];
$message=$_POST['comment'];
$formcontent=" De: $name \n Teléfono: $phone \n Ciudad: $city \n Comentario: $message";
$recipient = "jmerida@coraform.com, dmurillo@coraform.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
header('Location: /index.html');
?>