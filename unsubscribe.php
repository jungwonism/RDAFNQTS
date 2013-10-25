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
<p>RDA FNQ&TS understands that you would like to stop receiving communication from us.</p>
<form name="unsubscribe" method="post" action="unsubscribeprocess.php">

<label>Email Address: <input name="email" type="email" id="email" size="30" required/></label>
<fieldset>
 <legend>Select which of the following you would like to be unsubscribed from.</legend>  
 <table>
   <tr>
     <td><label>
       <input type="checkbox" name="newsletter" value="newsletter" id="newsletter">
       Newsletter</label></td></tr>
   <tr>
     <td><label>
       <input type="checkbox" name="info" value="information and correspondence" id="info">
       Information and Correspondence (eg notification of upcoming funding/grants, correspondence relevant to your industry working group etc)</label></td>
   </tr>
   <tr>
     <td><label>
       <input type="checkbox" name="queries" value="queries" id="queries">
       Queries from people using our Regional Connector search engine</label></td></tr>
 <tr>
     <td><label>
       <input type="checkbox" name="all" value="all of the above" id="all">
       All of the above</label></td>
   </tr>
</table>
</fieldset>
<input type="submit" name="submit" id="submit" value="Submit" />

</form>
</div>

<img src="images/bottom.png">
</div>
</body>
</html>
