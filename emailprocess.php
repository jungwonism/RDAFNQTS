<?php
include("include_dao.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Email processed</title>
<link href="css/basic.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>
<div id="box">
<?php
$toMe = "";
if(isset($_POST['questionA'])) {
	$answer = $_POST['questionA'];	
}
if($answer == 'yes') {
	$to  = 'servertestmail00@gmail.com'; // MUST be changed to info@rdafnqts.org.au
	$subject = 'Subscribe for bi-monthly newsletter';
	$message = 'Following user wants to subscribe for the bi-monthly newsletter. ' .$_POST['secondemail'];
	mail($to, $subject, $message);
	EmailDAO::insert($_POST['secondemail'], 0, 1, 0, 0); // insert a new subscribed user into database
	ReportDAO::insert("subscribed");	
}

if(isset($_POST['questionB'])) {
	$answerB = $_POST['questionB'];	
}
if($answerB == 'yes') {	
	if($answer == 'no') {
		$toMe = $_POST['copyemail2'];
	} elseif($answer == 'yes') {
		$toMe = $_POST['copyemail2'];		
	} 
} elseif($answerB == 'no') {
	if($answer == 'yes') {
		$toMe = $_POST['secondemail'];
	}
}
$to  = $_POST['to'] . ', ';
if($toMe != "") {$to .= $toMe;}
$subject = $_POST['subject'];
$message = $_POST['myDoc'];
$headers = 'From: RDA FNQ&TS Regional Connector Query' . "\r\n" .
    'Reply-To: jungwon.jang@my.jcu.edu.au' . "\r\n" . // MUST be changed to info@rdafnqts.org.au
    'X-Mailer: PHP/' . phpversion();

if(@mail($to, $subject, $message, $headers))
{
  echo "Email Sent Successfully.";  
}else{
  echo "Email Not Sent. Please contact the administrator.";
}	
ReportDAO::insert("emailsent");
?>
</div>
</div>
</body>
</html>