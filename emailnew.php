<?php
include("include_dao.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Send an email to the organization</title>
<link href="css/basic.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>
<div id="box">
<p><strong>Send a newsletter to one of the following email group.</strong></p>
<form name="email" method="post" action="emailnewprocess.php" enctype="multipart/form-data">
<?php
$to = "servertestmail00@gmail.com";
echo "<input type='hidden' name='to' id='to' value='$to'>";
?>
<fieldset>
 <legend>Please enter message details below</legend>  

 <table width="500">
   <tr>
      <td><label>
	Select email group
	<select name ='group' id='group'>
	   <option value="RCNominate">Regional Connector</option>
	   <option value="NewsNominate">Newsletter</option>
	   <option value="InfoNominate">Information</option>
	</select>
      </label></td></tr>
   <tr>
     <td><label>
	Subject: <br/>
       <input name='subject' type='text' id='subject' size='80' />
       </label></td></tr>
   <tr>
     <td><label>
	Message: <br/>
       <textarea name='message' rows='10' cols='70'></textarea>
       </label></td>	
   </tr>
   <tr>
     <td>
	<label for='uploaded_file'>Select A File To Upload:</label>
	<input type="file" name="uploaded_file"></td></tr>
</table>
<input type="submit" name="submit" id="submit" value="Send" />
</fieldset>
</form>



</div>
</div>
</body>
</html>
