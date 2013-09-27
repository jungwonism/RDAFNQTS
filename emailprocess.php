<?php
include("include_dao.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<link href="css/basic.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>
<div id="box">
<?php
$to  = $_POST['to'] . ', '; // note the comma
$to .= $_POST['toMe'];
$subject = $_POST['subject'];
$message = $_POST['myDoc'];
$headers = 'From: RDA FNQ&TS Regional Connector Query' . "\r\n" .
    'Reply-To: jungwon.jang@my.jcu.edu.au' . "\r\n" . // email address MUST be changed later.
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