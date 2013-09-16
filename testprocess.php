<?php
include("dbconnect.php");
include("include_dao.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Processed</title>
<link href="css/addentry.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="css/images/logo.png"></a>
<div id="box">
<?php
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$position = $_POST['position'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];
$mobile = $_POST['mobile'];
$otherNumber = $_POST['othernumber'];
$skype = $_POST['skype'];
$twitter = $_POST['twitter'];
$email1 = $_POST['email1'];
$email2 = $_POST['email2'];
$email3 = $_POST['email3'];

$keydm = "";
$keyi = "";
$early = 0;
$gate = 0;
$operation = 0;

$orgName = $_POST['orgname'];
$website = $_POST['website'];
$orgType = $_POST['orgtype'];
$promotionsubscribe = $_POST['promotionsubscribe'];
$connectorsubscribe = $_POST['connectorsubscribe'];
$businessaddress1 = $_POST['businessaddress1'];
$businessaddress2 = $_POST['businessaddress2'];
$businesssuburb = $_POST['businesssuburb'];
$businessstate = $_POST['businessstate'];
$businesspostcode = $_POST['businesspostcode'];
$businesscountry = $_POST['businesscountry'];
$postaladdress1 = $_POST['postaladdress1'];
$postaladdress2 = $_POST['postaladdress2'];
$postalsuburb = $_POST['postalsuburb'];
$postalstate = $_POST['postalstate'];
$postalpostcode = $_POST['postalpostcode'];
$postalcountry = $_POST['postalcountry'];

$leadership = "";
$industry = "";
$roadmap = "";
$practitioner = "";
$other = "";

$seekcontractor = "";
$offercontractor = "";
$etc= "";	
$seekpartner = "";
$seekchannel = "";
$offerchannel = "";
$seekcapital = "";
$offercapital = "";
$seekfunding = "";
$offerfunding = "";
$seekresearch = "";
$offerresearch = "";

$keywords = $_POST['keywords'];

$economic = "";
$environmental = "";
$socialcomm = "";
$health = "";
$education = "";
$marketing = "";
$research = "";
$contractor = "";	
$mediaoutlet = "";

$interstate = "";
$international = "";
$regionarray = array();

$rconnector = 0;
$newsletter = 0;
$info = 0;

if ($_REQUEST['submit'] == "Submit")
{	
	MemberDAO::insert($firstName, $lastName, $position, $phone, $fax, $mobile, $otherNumber, $skype, $twitter, $email1, $email2, $email3);

	$memberid = MemberDAO::queryID($firstName, $lastName, $position);
	//echo $memberid;	
	
	foreach($_POST['contacttypegroup'] as $value)
	{			
		if ($value == 'keydm') {
			$keydm = $_POST['keydmdropdown'];
		} else if ($value == 'keyi') {
			$keyi = $_POST['keyidropdown'];
		} else if ($value == 'earlyadaptor') {
			$early = 1;	
		} else if ($value == 'gatekeeper') {
			$gate = 1;	
		} else if ($value == 'operational') {
			$operation = 1;	
		}
	}
	
	ContactTypeDAO::insert($keydm, $keyi, $early, $gate, $operation);
	
	$contacttypeid = ContactTypeDAO::queryID();
	//echo "contacttypeid=".$contacttypeid;
	
	MemberContactDAO::insert($memberid, $contacttypeid);
	
	OrganizationDAO::insert($orgName, $website, $orgType, $promotionsubscribe, $connectorsubscribe, $businessaddress1, $businessaddress2, $businesssuburb, $businessstate, $businesspostcode, $businesscountry, $postaladdress1, $postaladdress2, $postalsuburb, $postalstate, $postalpostcode, $postalcountry, $memberid);
	
	$organizationid = OrganizationDAO::queryID($orgName);
	//echo "orgID=".$organizationid;
	
	foreach($_POST['membershipgroup'] as $value)
	{		
		if ($value == 'leadership') {
			$leadership = $_POST['leadershipdropdown'];
		} else if ($value == 'industry') {
			$industry = $_POST['industrytext'];
		} else if ($value == 'roadmap') {
			$roadmap = $_POST['roadmapdropdown'];
		} else if ($value == 'practitioner') {
			$practitioner = $_POST['practitionertext'];
		} else if ($value == 'othergroup') {
			$other = $_POST['othergrouptext'];
		}
	}
	
	GroupMembershipDAO::insert($leadership, $industry, $roadmap, $practitioner, $other);
	
	$groupmembershipid = GroupMembershipDAO::queryID();
	//echo "groupmembershipID=".$groupmembershipid;
	
	OrganizationMembershipDAO::insert($organizationid, $groupmembershipid);
	
	foreach($_POST['keyinterestsgroup'] as $value)
	{		
		if ($value == 'seekcontractor') {
			$seekcontractor = $_POST['seekcontracttext'];
		} else if ($value == 'offercontractor') {
			$offercontractor = $_POST['offercontracttext'];
		} else if ($value == 'etc') {
			$etc = $_POST['etctext'];
		} else if ($value == 'seekpartner') {
			$seekpartner = "Seeking partners for projects";
		} else if ($value == 'seekchannel') {
			$seekchannel = "Seeking channels to market";
		} else if ($value == 'offerchannel') {
			$offerchannel = "Offering channels to market";
		} else if ($value == 'seekcapital') {
			$seekcapital = "Seeking venture captial";
		} else if ($value == 'offercapital') {
			$offercapital = "Offering venture capital";
		} else if ($value == 'seekfunding') {
			$seekfunding = "Seeking Funding/Grants/Sponsorship/Scholarships";
		} else if ($value == 'offerfunding') {
			$offerfunding = "Offering Funding/Grants/Sponsorship/Scholarships";
		} else if ($value == 'seekresearch') {
			$seekresearch = "Seeking research support";
		} else if ($value == 'offerresearch') {
			$offerresearch = "Offering research support";
		}
	}
	
	KeyinterestsDAO::insert($seekpartner, $seekchannel, $offerchannel, $seekcontractor, $offercontractor, $seekcapital, $offercapital, $seekfunding, $offerfunding, $seekresearch, $offerresearch, $etc);
	
	$keyinterestsid = KeyinterestsDAO::queryID();
	
	OrganizationKeyInterestsDAO::insert($organizationid, $keyinterestsid);
	
	KeywordsDAO::insert($keywords);
	
	$keywordid = KeywordsDAO::queryID();
	
	OrganizationKeywordsDAO::insert($organizationid, $keywordid);
	
	foreach($_POST['orgmainpurpose'] as $value)
	{			
		if ($value == 'economic') {
			$economic = "Economic/Profit";
		} else if ($value == 'environmental') {
			$environmental = "Environmental Management/Advocacy";
		} else if ($value == 'socialcomm') {
			$socialcomm = "Social/Community Development Services";
		} else if ($value == 'health') {
			$health = "Health Services";
		} else if ($value == 'education') {
			$education = "Education";
		} else if ($value == 'marketing') {
			$marketing = "Destination Marketing";
		} else if ($value == 'research') {
			$research = "Research";
		} else if ($value == 'contractor') {
			$contractor = "Consultancy/Contractor";
		} else if ($value == 'mediaoutlet') {
			$mediaoutlet = $_POST['mediaoutletdropdown'];
		}
	}
	
	MainPurposeDAO::insert($economic, $environmental, $socialcomm, $health, $education, $marketing, $research, $contractor, $mediaoutlet);
	$mainpurposeid = MainPurposeDAO::queryID();
	
	OrganizationPurposeDAO::insert($organizationid, $mainpurposeid);
	
	foreach($_POST['regiongroup'] as $value)
	{
		if ($value == 'interstate') {
			$interstate = $_POST['interstatedropdown'];
			array_push($regionarray, $interstate);
		} else if ($value == 'international') {
			$international = $_POST['internationalregion'];
			array_push($regionarray, $international);
		} else {
			array_push($regionarray, $value);
		}		
	}
	$region = implode(",", $regionarray);
	
	RegionsDAO::insert($region);
	$regionid = RegionsDAO::queryID();
	
	OrganizationRegionDAO::insert($regionid, $organizationid);
	
	foreach($_POST['email1nominate'] as $value)
	{		
		if ($value == 'rconnector') {
			$rconnector = 1;	
		} else if ($value == 'newsletter') {
			$newsletter = 1;	
		} else if ($value == 'info') {
			$info = 1;	
		}
	}
	
	EmailDAO::insert($email1, $rconnector, $newsletter, $info, $organizationid);
	
	foreach($_POST['email2nominate'] as $value)
	{		
		if ($value == 'rconnector') {
			$rconnector = 1;	
		} else if ($value == 'newsletter') {
			$newsletter = 1;	
		} else if ($value == 'info') {
			$info = 1;	
		}
	}
	
	EmailDAO::insert($email2, $rconnector, $newsletter, $info, $organizationid);
	
	foreach($_POST['email3nominate'] as $value)
	{		
		if ($value == 'rconnector') {
			$rconnector = 1;	
		} else if ($value == 'newsletter') {
			$newsletter = 1;	
		} else if ($value == 'info') {
			$info = 1;	
		}
	}
	
	EmailDAO::insert($email3, $rconnector, $newsletter, $info, $organizationid);
	
	echo "New entry added successfully.";
}

?>
</div>
<img src="css/images/bottom.png">
</div>
</body>
</html>