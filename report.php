<?php
include("include_dao.php");
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Generate Report</title>
<link href="css/addentry.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>
<div id="box">
<select name="reporttype" id="reporttype" required>
  <option value="searchedkeywords" selected="selected">Searched Keywords</option>
  <option value="emailsent">Number of follow through emails sent</option>
  <option value="unsuccessful">Number of unsuccessful searches</option>
  <option value="helpful">Number of ‘helpful’ or ‘not helpful’ responses to search engine query</option>
  <option value="subscribe">Number of users who subscribed to newsletter through search engine query process</option>  
</select><br />
<input type='button' value='Generate' />
<?php

if (!file_exists('c:/report')) {
    mkdir('c:/report', 0777, true);
}


SearchedKeywordsDAO::querySearchedKeywords();
SearchedKeywordsDAO::exportCSV();


?>

</div>
<img src="images/bottom.png">
</div>
</body>
</html>