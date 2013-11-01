<?php
include("include_dao.php");
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Generate Report</title>
<link href="css/basic.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function showExportButton() {
	document.getElementById("submit").disabled = false;
}
</script>
</head>

<body>
<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>
<div id="box">
<p><strong>Generating Report. Searched keywords or Search engine usage for a particular period. Please select options below.</strong></p>
<form id='reportform' name='reportform' method='post' action=''>
<select name="reporttype" id="reporttype" required>
  <option value="">Select report type</option>
  <option value="searchedkeywords" <?php if(isset($_POST["reporttype"])) 
										{$reporttype = $_POST["reporttype"];} else {$reporttype = "";}
										if($reporttype == "searchedkeywords") echo 'selected="selected"'; ?>>Searched Keywords</option>
  <option value="searchengineusage" <?php if(isset($_POST["reporttype"])) 
										{$reporttype = $_POST["reporttype"];} else {$reporttype = "";}
										if($reporttype == "searchengineusage") echo 'selected="selected"'; ?>>Search engine usage</option>   
</select>
<select name="timeperiod" id="timeperiod" required>
  <option value="">Select time period</option>
  <option value="today" <?php if(isset($_POST["timeperiod"])) 
						{$timeperiod = $_POST["timeperiod"];} else {$timeperiod = "";}
						if($timeperiod == "today") echo 'selected="selected"'; ?>>Last 24 hours</option>
  <option value="week" <?php if(isset($_POST["timeperiod"])) 
						{$timeperiod = $_POST["timeperiod"];} else {$timeperiod = "";}
						if($timeperiod == "week") echo 'selected="selected"'; ?>>Last one week</option>
  <option value="month" <?php if(isset($_POST["timeperiod"])) 
						{$timeperiod = $_POST["timeperiod"];} else {$timeperiod = "";}
						if($timeperiod == "month") echo 'selected="selected"'; ?>>Last one month</option>
  <option value="quarter" <?php if(isset($_POST["timeperiod"])) 
						{$timeperiod = $_POST["timeperiod"];} else {$timeperiod = "";}
						if($timeperiod == "quarter") echo 'selected="selected"'; ?>>Last 3 months</option>
  <option value="halfyear" <?php if(isset($_POST["timeperiod"])) 
						{$timeperiod = $_POST["timeperiod"];} else {$timeperiod = "";}
						if($timeperiod == "halfyear") echo 'selected="selected"'; ?>>Last 6 months</option>  
</select>
<input type='submit' value='Generate' />
</form>
<?php

if(isset($_POST["reporttype"])) {
	$reporttype = $_POST["reporttype"];
}
if(isset($_POST["timeperiod"])) {
	$timeperiod = $_POST["timeperiod"];
}

// folder creation
if (!file_exists('c:/report')) {
    mkdir('c:/report', 0777, true);
}

if(isset($_POST["reporttype"], $_POST["timeperiod"])) {		
	if($reporttype == 'searchedkeywords') {
		switch($timeperiod) {
			case "today":
				SearchedKeywordsDAO::querySearchedKeywords("1");
				break;
			case "week":
				SearchedKeywordsDAO::querySearchedKeywords("7");
				break;
			case "month":
				SearchedKeywordsDAO::querySearchedKeywords("30");
				break;
			case "quarter":
				SearchedKeywordsDAO::querySearchedKeywords("90");
				break;
			case "halfyear":
				SearchedKeywordsDAO::querySearchedKeywords("180");
				break;				
		}	
	} elseif($reporttype == 'searchengineusage') {	
		switch($timeperiod) {
			case "today":
				ReportDAO::queryReport("1");
				break;
			case "week":
				ReportDAO::queryReport("7");
				break;
			case "month":
				ReportDAO::queryReport("30");
				break;
			case "quarter":
				ReportDAO::queryReport("90");
				break;
			case "halfyear":
				ReportDAO::queryReport("180");
				break;				
		}	
	}	
} else {
	echo "Please select report type and time period. Thanks.";
}
if(isset($_POST['submit'])) {
	if ($_POST['submit'] == "Export to CSV") {		
		if($reporttype == 'searchedkeywords') {			
			switch($timeperiod) {
				case "today":
					SearchedKeywordsDAO::exportCSV("1");
					break;
				case "week":
					SearchedKeywordsDAO::exportCSV("7");
					break;
				case "month":
					SearchedKeywordsDAO::exportCSV("30");
					break;
				case "quarter":
					SearchedKeywordsDAO::exportCSV("90");
					break;
				case "halfyear":
					SearchedKeywordsDAO::exportCSV("180");
					break;				
			}	
		} else {
			switch($timeperiod) {
				case "today":
					ReportDAO::exportCSV("1");
					break;
				case "week":
					ReportDAO::exportCSV("7");
					break;
				case "month":
					ReportDAO::exportCSV("30");
					break;
				case "quarter":
					ReportDAO::exportCSV("90");
					break;
				case "halfyear":
					ReportDAO::exportCSV("180");
					break;				
			}
		}
	}
}
?>
<form id='export' name='export' method='post' action=''>
<input type='hidden' id='reporttype' name='reporttype' 
<?php 
if(isset($_POST["reporttype"])) {
	$reporttype = $_POST["reporttype"];
} else {
	$reporttype = "";
}
if($reporttype == "searchedkeywords") {
	echo 'value="searchedkeywords"'; 
} elseif($reporttype == "searchengineusage") {
	echo 'value="searchengineusage"';
}
?> 
/>
<input type='hidden' id='timeperiod' name='timeperiod' 
<?php 
if(isset($_POST["timeperiod"])) {
	$reporttype = $_POST["timeperiod"];
} else {
	$timeperiod = "";
}
switch($timeperiod) {
	case "today":
		echo 'value="today"';
		break;
	case "week":
		echo 'value="week"';
		break;
	case "month":
		echo 'value="month"';
		break;
	case "quarter":
		echo 'value="quarter"';
		break;
	case "halfyear":
		echo 'value="halfyear"';
		break;				
}
?> 
/>
<input type='submit' id='submit' name='submit' value='Export to CSV' />

</form>

</div>
<img src="images/bottom.png">
</div>
</body>
</html>