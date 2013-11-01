<?php
include("include_dao.php");
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Email</title>
<link href="css/basic.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var oDoc, sDefTxt;

function initDoc() {
  oDoc = document.getElementById("textBox");
  sDefTxt = oDoc.innerHTML;
  if (document.email.switchMode.checked) { setDocMode(true); }
}

function formatDoc(sCmd, sValue) {
  if (validateMode()) { document.execCommand(sCmd, false, sValue); oDoc.focus(); }
}

function validateMode() {
  if (!document.email.switchMode.checked) { return true ; }
  alert("Uncheck \"Show HTML\".");
  oDoc.focus();
  return false;
}

function setDocMode(bToSource) {
  var oContent;
  if (bToSource) {
    oContent = document.createTextNode(oDoc.innerHTML);
    oDoc.innerHTML = "";
    var oPre = document.createElement("pre");
    oDoc.contentEditable = false;
    oPre.id = "sourceText";
    oPre.contentEditable = true;
    oPre.appendChild(oContent);
    oDoc.appendChild(oPre);
  } else {
    if (document.all) {
      oDoc.innerHTML = oDoc.innerText;
    } else {
      oContent = document.createRange();
      oContent.selectNodeContents(oDoc.firstChild);
      oDoc.innerHTML = oContent.toString();
    }
    oDoc.contentEditable = true;
  }
  oDoc.focus();
}

function printDoc() {
  if (!validateMode()) { return; }
  var oPrntWin = window.open("","_blank","width=450,height=470,left=400,top=100,menubar=yes,toolbar=no,location=no,scrollbars=yes");
  oPrntWin.document.open();
  oPrntWin.document.write("<!doctype html><html><head><title>Print<\/title><\/head><body onload=\"print();\">" + oDoc.innerHTML + "<\/body><\/html>");
  oPrntWin.document.close();
}
</script>
<style type="text/css">
.intLink { cursor: pointer; }
img.intLink { border: 0; }
#toolBar1 select { font-size:10px; }
#textBox {
  width: 540px;
  height: 200px;
  border: 1px #000000 solid;
  padding: 12px;
  overflow: scroll;
}
#textBox #sourceText {
  padding: 0;
  margin: 0;
  min-width: 498px;
  min-height: 200px;
}
#editMode label { cursor: pointer; }
</style>
</head>
<body onload="initDoc();">
<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>
<p><strong>Email to the organization you searched.</strong></p>
<form name="email" method="post" action="emailprocess.php" onsubmit="if(validateMode()){this.myDoc.value=oDoc.innerHTML;return true;}return false;">
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
if(isset($_POST['questionC'])) {
	$answerC = $_POST['questionC'];	
}
if($answerB == 'yes') {	
	if($answer == 'no') {
		$toMe = $_POST['copyemail2'];
	} elseif($answer == 'yes') {
		$toMe = $_POST['copyemail2'];
		if($answerC == 'yes') {
			$toMe = $_POST['secondemail'];
		}
	} 
}

$to = $_POST['emailAddress'];
echo "Subject: <br/><input name='subject' type='text' id='subject' size='80' value='[Regional Connector Contact]: ' />";
echo "<br/>";
echo "<input type='hidden' name='to' id='to' value='$to'>";
if($toMe != "") {
	echo "<input type='hidden' name='toMe' id='toMe' value='$toMe'>";
}
echo "Message: <br/><textarea name='myDoc' rows='10' cols='70'></textarea>";
?>

<p><input type="submit" name="submit" id="submit" value="Send" /></p>
</form>
</body>
</html>
