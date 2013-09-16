<?php
//include("dbconnect.php");
include("include_dao.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Send an email to the organization</title>
<link href="css/email.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>
<div id="box">
<form name="email" method="post" action="emailprocess.php">
<?php
$to = $_POST['emailAddress'];
echo "Subject: <br/><input name='subject' type='text' id='subject' size='80' />";
echo "<br/>";
echo "Message: <br/><textarea name='message' rows='10' cols='70'></textarea>";
echo "<input type='hidden' name='to' id='to' value='$to'>";
?>

<br />
<input type="submit" name="submit" id="submit" value="Send" />
</form>



</div>
</div>
</body>
</html>