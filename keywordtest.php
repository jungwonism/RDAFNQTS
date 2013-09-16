<?php
include("include_dao.php");
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Generate Report</title>
<link href="css/searchengine.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function hideCommentText() {
	document.getElementById("commentLabel").style.display = 'none';	
	document.getElementById("comment").style.display = 'none';	
}
function showCommentText() {
	document.getElementById("commentLabel").style.display = 'inline';	
	document.getElementById("comment").style.display = 'inline';	
}
</script>
</head>

<body>
<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>
<div id="box">
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