<?php
include("include_dao.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<link href="css/email.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>
<div id="box">
<?php
$to = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$headers = 'From: RDA FNQ&TS' . "\r\n" .
    'Reply-To: jungwon.jang@my.jcu.edu.au' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
echo $to;
echo $subject;
echo $message;
echo $headers;
mail($to, $subject, $message, $headers);
ReportDAO::insert("emailsent");
?>



</div>
</div>
</body>
</html>