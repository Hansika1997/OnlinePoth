<?php 
$errors = '';
$myemail = 'shehan97hsn@gmail.com';//<-----Put Your email address here.

if(empty($_POST['name'])  || 
   empty($_POST['email']) ||
   empty($_POST['phone']) || 
   empty($_POST['book']) || 
   empty($_POST['adress']) ||  
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$phone = $_POST['phone'];
$book = $_POST['book'];
$adress = $_POST['adress'];
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}



if( empty($errors)) {

	$to = $myemail;

	$email_subject = "Contact form submission: $name";

	$email_body = "You have a New Book Order. ".

	" Here are the details:\n Name: $name \n ".

	"Email: $email_address\n Message \n $message";

	$headers = "From: $myemail\n";

	$headers .= "Reply-To: $email_address";

	mail($to,$email_subject,$email_body,$headers);

	//redirect to the 'thank you' page

	header('Location: thank-you.html');

}
?>