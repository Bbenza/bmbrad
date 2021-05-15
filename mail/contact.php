<?php

// $db_host="localhost";
// $db_username="root";
// $db_password="";
// $db_name"dekoh_web";


// $db_connect=mysqli_connect($bd_host,$db_username,$db_password,$db_name) or die();

// //check connection.

// if (mysqli_connect_error())
// {
//   echom "Failled to connect to MYSQL:".msqli_connect_error()
// }
// echon"connection succeful";



// $incomingContentType = $_SERVER['CONTENT_TYPE']

if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "bbenza366@gmail.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
