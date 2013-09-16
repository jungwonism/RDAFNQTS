<?php
//include("dbconnect.php");
include("include_dao.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Helpful or Not helpful</title>
<link href="css/addentry.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>
<div id="box">
<?php
if(isset($_POST['helpful'])) {
	$answer = $_POST['helpful'];
	echo $answer;
}
if ($_REQUEST['submit'] == "Submit")
{	
	if($answer == 'helpful') {
		ReportDAO::insert("helpful");
	} elseif ($answer == 'nothelpful') {
		ReportDAO::insert("nothelpful");
	}
}
?>
</div>
<img src="images/bottom.png">
</div>
</body>
</html>