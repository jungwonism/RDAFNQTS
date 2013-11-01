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
$to  = $_POST['to'] . ', ';
if(isset($_POST['toMe'])) {$to .= $_POST['toMe'];}
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