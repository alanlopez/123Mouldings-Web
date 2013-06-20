<?php
if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}
if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = 'No email entered';}
if ((isset($_POST['phone'])) && (strlen(trim($_POST['phone'])) > 0)) {
	$phone = stripslashes(strip_tags($_POST['phone']));
} else {$phone = 'No phone entered';}
if ((isset($_POST['city'])) && (strlen(trim($_POST['city'])) > 0)) {
	$city = stripslashes(strip_tags($_POST['city']));
} else {$city = 'No city entered';}
if ((isset($_POST['comment'])) && (strlen(trim($_POST['comment'])) > 0)) {
	$comment = stripslashes(strip_tags($_POST['comment']));
} else {$comment = 'No comment entered';}
ob_start();
?>
<html>
<head>
<style type="text/css">
</style>
</head>
<body>
<table width="550" border="1" cellspacing="2" cellpadding="2">
  <tr bgcolor="#eeffee">
    <td>Name</td>
    <td><?=$name;?></td>
  </tr>
  <tr bgcolor="#eeeeff">
    <td>Email</td>
    <td><?=$email;?></td>
  </tr>
  <tr bgcolor="#eeffee">
    <td>Phone</td>
    <td><?=$phone;?></td>
  </tr>
  <tr bgcolor="#eeffee">
    <td>City</td>
    <td><?=$city;?></td>
  </tr>
  <tr bgcolor="#eeeeff">
    <td>Comment</td>
    <td><?=$comment;?></td>
  </tr>
</table>
</body>
</html>
<?
$body = ob_get_contents();

$to = 'someone@example.com';
$email = 'email@example.com';
$fromaddress = "you@example.com";
$fromname = "Online Contact";

require("phpmailer.php");

$mail = new PHPMailer();

$mail->From     = "wayko999@gmail.com";
$mail->FromName = "123 Mouldings";
$mail->AddAddress("wayko999@gmail.com","Carlos");

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject  =  "Contact form submitted";
$mail->Body     =  $body;
$mail->AltBody  =  "This is the text-only body";

if(!$mail->Send()) {
	$recipient = 'your_email@example.com';
	$subject = 'Contact form failed';
	$content = $body;	
  mail($recipient, $subject, $content, "From: wayko999@gmail.com\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
  exit;
}
?>
