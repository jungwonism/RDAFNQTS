<?php
include("include_dao.php");
include("dbconnect.php");
require_once('PHPMailer-master/class.phpmailer.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Newsletter</title>
<link href="css/basic.css" rel="stylesheet" type="text/css">

</head>

<body>                                             
<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>
<div id="box">
<?php
	if($_POST['group']=='RCNominate')
	{
		$elist = mysql_query("SELECT Email FROM email WHERE RCNominate=1");
	}
	elseif($_POST['group']=='NewsNominate')
	{
		$elist = mysql_query("SELECT Email FROM email WHERE NewsNominate=1");
	}
	elseif($_POST['group']=='InfoNominate')
	{
		$elist = mysql_query("SELECT Email FROM email WHERE InfoNominate=1");
	}

	if($elist === FALSE) {
	    die(mysql_error());
	}
	while($elist_result = mysql_fetch_array($elist)){
		
		$email = new PHPMailer();
		$address = $elist_result['Email'];
		$email->AddAddress($address);

		$email->SMTPAuth  = true;
		$email->SMTPSecure = "tls";
		$email->Host = "smtp.gmail.com";
		$email->Port	  = 587;
		$email->Username = "servertestmail00@gmail.com";
		$email->Password = "s3rv3rt3st";

		$email->From      = 'servertestmail00@gmail.com';
		$email->FromName  = 'RDA FNQ&TS';
		$email->Subject   = $_POST['subject'];
		$email->Body      = $_POST['message'];
		//$email->AddAddress('servertestmail00@gmail.com');

		if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK) {
			$email->AddAttachment($_FILES['uploaded_file']['tmp_name'], $_FILES['uploaded_file']['name']);
		}
		if($email->send()){
			echo 'Email has been successfully sent to ', $address, '<br>';
		} else {
			echo 'Failed to send email to ', $address, '<br>';
		}		
	}
?>

</div>
</div>
</body>
</html>
