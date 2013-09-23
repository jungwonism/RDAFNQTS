<?php
include("include_dao.php");
//include("dbconnect.php");
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Result</title>
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
if ($_REQUEST['submit'] == "Submit")
{
	$interstate = "";
	$international = "";
	$queryvalue = "";
	$count = 0;
	$regionarray = array();
	foreach($_POST['regiongroup'] as $value)
	{
		if ($value == 'interstate') {
			if ($count == 0) {
				$interstate = "Region LIKE '%".$_POST['interstatedropdown']."%'";
				$count = 1;			
			} else {
				$interstate = " AND Region LIKE '%".$_POST['interstatedropdown']."%'";
			}
			array_push($regionarray, $interstate);
		} else if ($value == 'international') {
			if ($count == 0) {
				$international = "Region LIKE '%".$_POST['internationalregion']."%'";
				$count = 1;
			} else {
				$international = " AND Region LIKE '%".$_POST['internationalregion']."%'";
			}
			array_push($regionarray, $international);
		} else {
			if ($count == 0) {
				$queryvalue = "Region LIKE '%".$value."%'";
				$count = 1;
			} else {
				$queryvalue = " AND Region LIKE '%".$value."%'";
			}			
			array_push($regionarray, $queryvalue);
		}		
	}
	$region = implode("", $regionarray);

	$orgTypeValue = $_POST['orgtype'];	
	$orgType = " AND Organization.OrganizationType = '".$orgTypeValue."'";
		
	$mediaoutlet = "";
	$purposearray = array();
	
	foreach($_POST['orgmainpurpose'] as $value)
	{			
		if ($value == 'economic') {
			$queryvalue = " AND MainPurpose.EconomicProfit = 'Economic/Profit'";			
		} else if ($value == 'environmental') {
			$queryvalue = " AND MainPurpose.Environmental = 'Environmental Management/Advocacy'";
		} else if ($value == 'socialcomm') {
			$queryvalue = " AND MainPurpose.SocialCommunity = 'Social/Community Development Services'";
		} else if ($value == 'health') {
			$queryvalue = " AND MainPurpose.HealthServices = 'Health Services'";
		} else if ($value == 'education') {
			$queryvalue = " AND MainPurpose.Education = 'Education'";
		} else if ($value == 'marketing') {
			$queryvalue = " AND MainPurpose.DestinationMarketing = 'Destination Marketing'";
		} else if ($value == 'research') {
			$queryvalue = " AND MainPurpose.Research = 'Research'";
		} else if ($value == 'contractor') {
			$queryvalue = " AND MainPurpose.ConsultancyContractor = 'Consultancy/Contractor'";
		} else if ($value == 'mediaoutlet') {
			$mediaoutlet = $_POST['mediaoutletdropdown'];
			$queryvalue = " AND MainPurpose.MediaOutlet = '".$mediaoutlet."'";
		}
		array_push($purposearray, $queryvalue);
	}
	
	$purpose = implode("", $purposearray);
	
	$keywords = $_POST['keywords'];
	$separatedKeywords = explode(",", $keywords);
	$keywordArray = array();
	foreach ($separatedKeywords as &$value) {
		SearchedKeywordsDAO::insert($value);
   		$queryvalue = " AND Keyword LIKE '%".$value."%'";
		array_push($keywordArray, $queryvalue);
	}
	$orgKeywords = implode("", $keywordArray);
	$emailConstraint = " AND Email.RCNominate = 1";
	

	$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	$username = "root";
	$password = "lilac";
	
	try {
		$conn = new PDO($dsn, $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 			
		
		$stmt = $conn->prepare('SELECT distinct Region, OrganizationName, OrganizationType, WebsiteAddress, EconomicProfit, Environmental, SocialCommunity, HealthServices, Education, DestinationMarketing, Research, ConsultancyContractor, MediaOutlet, SeekingPartners, SeekingChannels, OfferingChannels, SeekingContractor, OfferingContractor, SeekingVentureCapital, OfferingVentureCaptital, SeekingFunding, OfferingFunding, SeekingResearchSupport, OfferingResearchSupport, Etc, Keyword, Email FROM Regions, Organization, OrganizationRegion, MainPurpose, OrganizationPurpose, Keyinterests, OrganizationKeyInterests, Keywords, OrganizationKeywords, Email WHERE Regions.RegionID = OrganizationRegion.RegionID AND Organization.OrganizationID = OrganizationRegion.OrganizationID AND MainPurpose.MainPurposeID = OrganizationPurpose.MainPurposeID AND Organization.OrganizationID = OrganizationPurpose.OrganizationID AND Organization.OrganizationID = OrganizationKeyInterests.OrganizationID AND Keyinterests.KeyInterestsID = OrganizationKeyInterests.KeyInterestsID AND Keywords.KeywordID = OrganizationKeywords.KeywordID AND OrganizationKeywords.OrganizationID = Organization.OrganizationID AND Email.OrganizationID = Organization.OrganizationID AND '.$region.$orgType.$purpose.$orgKeywords.$emailConstraint);
		$stmt->execute();
	
		if ($row = $stmt->fetch(PDO::FETCH_OBJ)) {		
			do {			
				echo "Name: $row->OrganizationName";
				echo "<br/>";
				echo "Region (in which this organization does business, provides services and/or sells products): $row->Region";
				echo "<br/>";
				echo "Type: $row->OrganizationType";
				echo "<br/>";
				echo "Main Purpose: $row->EconomicProfit $row->Environmental $row->SocialCommunity $row->HealthServices $row->Education $row->DestinationMarketing $row->Research $row->ConsultancyContractor $row->MediaOutlet";
				echo "<br/>";
				echo "Website: $row->WebsiteAddress";
				echo "<br/>";
				echo "Key Interests: $row->SeekingPartners $row->SeekingChannels $row->OfferingChannels $row->SeekingContractor $row->OfferingContractor $row->SeekingVentureCapital $row->OfferingVentureCaptital $row->SeekingFunding $row->OfferingFunding $row->SeekingResearchSupport $row->OfferingResearchSupport $row->Etc";
				echo "<br/>";
				echo "Keywords: $row->Keyword";				
				echo "<br/>";
				echo "<form id='emailForm' name='emailForm' method='post' action='screenpage.php'>";				
				echo "<input type='hidden' name='emailAddress' value='$row->Email' />";				
				echo "<span onclick='document.emailForm.submit();' id='here'><input type='button' value='Click here to send an email to this organization' /></span>";				 
				echo "</form>";
				echo "<hr>";
			} while($row = $stmt->fetch(PDO::FETCH_OBJ));		
		}else {
			echo "No results found.";
			ReportDAO::insert("unsuccessfulsearch");
		}		
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}		
}

echo "<form name='comment' method='post' action='comment.php' onSubmit=''>";
echo "<p>Let us know whether the Regional Connector was helpful.</p>";
echo "<p>";
  echo "<label>
    <input type='radio' name='helpful' value='helpful' id='helpful' onClick='hideCommentText()'>
    YES</label><br>";
  echo "<label>
    <input type='radio' name='helpful' value='nothelpful' id='nothelpful' onClick='showCommentText()'>
    NO</label><br>";
echo "</p>";
echo "<p>";
  echo "<label for='comment' style='display:none' id='commentLabel'>Please let us know how we can make the Regional Connector better </label><br /> ";
  echo "<textarea name='comment' id='comment' rows='10' cols='70' style='display:none'></textarea>";
echo "</p>";
echo "<p>";
 echo "<input type='submit' name='submit' id='submit' value='Submit' />";
echo "</p>";
echo "</form>";
?>
</div>
<img src="images/bottom.png">
</div>
</body>
</html>