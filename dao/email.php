<?php
//include("dbconnect.php");
include($_SERVER['DOCUMENT_ROOT']."/include_dao.php");
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
<a href="http://www.rdafnqts.org.au/"><img src="css/images/logo.png"></a>
<div id="box">
<form name="email" method="post" action="emailProcess.php">
<?php
$to = $_POST['emailAddress'];
echo "Subject: <br/><input name='subject' type='text' id='subject' size='70' />";
echo "<br/>";
echo "Message: <br/><textarea name='message' rows='10' cols='70'></textarea>";


?>
</form>



</div>
</div>
</body>
</html>