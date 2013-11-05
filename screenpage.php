<?php
include("include_dao.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Before you send an email...</title>
<script type="text/javascript">
function hideEmailText(first, second) {
	document.getElementById(first+"label").style.display = 'none';	
	document.getElementById(first).style.display = 'none';
	document.getElementById(second+"label").style.display = 'none';	
	document.getElementById(second).style.display = 'none';
	
}
function showEmailText(first, second) {
	document.getElementById(first+"label").style.display = 'inline';	
	document.getElementById(first).style.display = 'inline';
	document.getElementById(second+"label").style.display = 'inline';	
	document.getElementById(second).style.display = 'inline';
}
function checkNewsOptin() {	
	if (document.getElementById('questionA_0').checked) {		
		document.getElementById('sameaddress').style.display = 'inline';
		document.getElementById('sameaddressy').style.display = 'inline';
		document.getElementById('sameaddressn').style.display = 'inline';
	} else if (document.getElementById('questionA_1').checked) {
		showEmailText('copyemail1', 'copyemail2');
	}
}
function hideSameAddress() {
	document.getElementById('sameaddress').style.display = 'none';
	document.getElementById('sameaddressy').style.display = 'none';
	document.getElementById('sameaddressn').style.display = 'none';
}
function emailValidate(form) {
  var e = form.elements;

  /* validation code. */

  if(e['firstemail'].value != e['secondemail'].value) {
    alert('Your emails do not match. Please type more carefully.');
    return false;
  }
  if(e['copyemail1'].value != e['copyemail2'].value) {
    alert('Your emails do not match. Please type more carefully.');
    return false;
  }
  return true;
}

</script>
<link href="css/basic.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>
<div id="box">
<p><strong>Please select options below. Strongly recommend you to subscribe our bi-monthly newsletter with useful information.</strong></p>
<form name="sendinfo" method="post" action="emailprocess.php" onSubmit="return emailValidate(this);">
<p>Thank you for searching with the RDA FNQ&amp;TS Regional Connector. Would you like to receive our bi-monthly newsletter?</p>
<p>
  <label>
    <input type="radio" name="questionA" value="yes" id="questionA_0" onClick="showEmailText('firstemail', 'secondemail')">
    YES</label>
  <br>
  <label>
    <input type="radio" name="questionA" value="no" id="questionA_1" onClick="hideEmailText('firstemail', 'secondemail')">
    NO</label>
  <br>
</p>
<p>
  <label for="firstemail" style="display:none" id="firstemaillabel">Email address: </label><br />
  <input name="firstemail" type="email" id="firstemail" size="30" style="display:none" />
</p>
<p>
 <label for="secondemail" style="display:none" id="secondemaillabel">Confirm  Email address: </label><br />
 <input name="secondemail" type="email" id="secondemail" size="30" style="display:none" />
</p>

<p>Would you like to send a copy of this contact e-mail to another e-mail address?</p>
<p>
  <label>
    <input type="radio" name="questionB" value="yes" id="questionB_0" onClick="checkNewsOptin(); showEmailText('copyemail1', 'copyemail2')">
    YES</label>
  <br>
  <label>
    <input type="radio" name="questionB" value="no" id="questionB_1" onClick="hideSameAddress(); hideEmailText('copyemail1', 'copyemail2')">
    NO</label>
  <br>
</p>
<p>
  <label for="copyemail1" style="display:none" id="copyemail1label">Email address: </label><br />
  <input name="copyemail1" type="email" id="copyemail1" size="30" style="display:none" />
</p>
<p>
 <label for="copyemail2" style="display:none" id="copyemail2label">Confirm  Email address: </label><br />
 <input name="copyemail2" type="email" id="copyemail2" size="30" style="display:none" />
</p>
<p><br />
</p>
<?php
$to = $_POST['to'];
echo "<input type='hidden' name='to' value='$to' />";
$subject = $_POST['subject'];
echo "<input type='hidden' name='subject' value='$subject' />";
$myDoc = $_POST['myDoc'];
echo "<input type='hidden' name='myDoc' value='$myDoc' />";
?>
<p>
 <input type="submit" name="submit" id="submit" value="Send" />
</p>
</form>
</div>
<img src="images/bottom.png">
</div>
</body>
</html>