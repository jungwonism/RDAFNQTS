<?php
include("include_dao.php");
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Result</title>
<link href="css/basic.css" rel="stylesheet" type="text/css">
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
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">

//This is the function that closes the pop-up
function endBlackout(){
$(".blackout").css("display", "none");
$(".msgbox").css("display", "none");
}

//This is the function that shows the pop-up
function strtBlackout(){
$(".msgbox").css("display", "block");
$(".blackout").css("display", "block");
}

//Sets the buttons to trigger the blackout on clicks
$(document).ready(function(){
$("#mailsendbutton").click(strtBlackout); // open if button is pressed
$(".blackout").click(endBlackout); // close if click outside of popup
$(".closeBox").click(endBlackout); // close if close btn clicked

});
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
	if(isset($_POST['regiongroup'])) {
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
	}
	$region = implode("", $regionarray);
	
	$orgTypeValue = $_POST['orgtype'];	
	$orgType = " AND Organization.OrganizationType = '".$orgTypeValue."'";
		
	$mediaoutlet = "";
	$purposearray = array();
	
	if(isset($_POST['orgmainpurpose'])) {
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
	}
	
	$purpose = implode("", $purposearray);
	
	if(isset($_POST['keywords'])) {
		$keywords = $_POST['keywords'];
		$separatedKeywords = explode(",", $keywords);
	}
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
		// generate search result table with the columns below
		echo '<table class="sortable" id="rounded-corner">';
			   echo '
			   <thead>
			   <tr>
				 <th scope="col">Name</th>
				 <th scope="col">Region</th>
				 <th scope="col">Type</th>
				 <th scope="col" style="white-space:nowrap;">Main purpose</th>
				 <th scope="col">Website</th>
				 <th scope="col" style="white-space:nowrap;">Key interests</th>
				 <th scope="col">Keywords</th>
				 <th scope="col" style="white-space:nowrap;">Send email</th>
			   </tr>
			   </thead><tbody>';
			   
		while($row = $stmt->fetch(PDO::FETCH_OBJ)) {				
				
				echo '					
				<tr>
				 <td><label>',$row->OrganizationName,'</label></td>
				 <td><label>',$row->Region,'</label></td>
				 <td><label>',$row->OrganizationType,'</label></td>
				 <td><label>',$row->EconomicProfit, $row->Environmental, $row->SocialCommunity, $row->HealthServices, $row->Education, $row->DestinationMarketing, $row->Research, $row->ConsultancyContractor, $row->MediaOutlet,'</label></td>
				 <td><label>',$row->WebsiteAddress,'</label></td>
				 <td><label>',$row->SeekingPartners, $row->SeekingChannels, $row->OfferingChannels, $row->SeekingContractor, $row->OfferingContractor, $row->SeekingVentureCapital, $row->OfferingVentureCaptital, $row->SeekingFunding, $row->OfferingFunding, $row->SeekingResearchSupport, $row->OfferingResearchSupport, $row->Etc,'</label></td>
				 <td><label>',$row->Keyword,'</label></td>
				 <td><center>														
							<input type="button" id="mailsendbutton" value="Click" /></center>
							<div class="blackout">
							</div>
							<div class="msgbox">									
							<br />
							<center>
							<form id="emailForm" name="emailForm" method="post" action="screenpage.php"><p>Let us know whether the Regional Connector was helpful.</p><br />
							<input type="hidden" name="emailAddress" value='.$row->Email.' />
							<label>
							<input type="radio" name="helpful" value="helpful" id="helpful" onClick="hideCommentText()">
							YES</label><br>
							<label>
							<input type="radio" name="helpful" value="nothelpful" id="nothelpful" onClick="showCommentText()">
							NO</label><br></p>
							<p>
							<label for="comment" style="display:none" id="commentLabel">Please let us know how we can make the Regional Connector better </label><br />
							<textarea name="comment" id="comment" rows="10" cols="40" style="display:none"></textarea>
							</p>
							<p><input type="submit" name="submit" id="submit" value="Submit" /></p>
							</form>
							</center>
							</div>
							
							</td>
				</tr>';		
		} 
		echo '</tbody></table>';				
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}		
}
?>

</div>
<img src="images/bottom.png">
</div>
</body>
</html>