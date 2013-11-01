<?php
include("include_dao.php");
include("dbconnect.php");
?>

<!DOCTYPE HTML>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Unsubscribe</title>

<link href="css/basic.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>

<div id="box">

<?php
$email = $_POST['email'];

$result = mysql_query("SELECT * FROM email WHERE Email='".$email."'");
if($result === FALSE)
{
	    die(mysql_error());
}

if($row = mysql_fetch_array($result))
{
	$rcnominate = $row['RCNominate'];
	$newsnominate = $row['NewsNominate'];
	$infonominate = $row['InfoNominate'];
}

if(isset($_POST['newsletter']))
{
	$newsnominate = 0;
}
if(isset($_POST['info']))
{
	$infonominate = 0;
}
if(isset($_POST['queries']))
{
	$rcnominate = 0;
}
if(isset($_POST['all']))
{
	$rcnominate = 0;
	$newsnominate = 0;
	$infonominate = 0;
}

// update the values into database
EmailDAO::update($email, $rcnominate, $newsnominate, $infonominate);
?>

</div>
</div>
</body>
</html>
