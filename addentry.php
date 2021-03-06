<?php
include("include_dao.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add new entry</title>
<script type="text/javascript">
function enableInterstate(value)
{	
    var subfield = document.getElementById("interstatedropdown");	
    if (value.checked == true)
    {
        subfield.disabled = false;
    }
    else
    {
        subfield.disabled = true;
    }
}
function enableInternational(value)
{
    var subfield = document.getElementById("internationalregion");

    if (value.checked == true)
    {
        subfield.disabled = false;
    }
    else
    {
        subfield.disabled = true;
    }
} 
function enableKeyDM(value)
{
    var subfield = document.getElementById("keydmdropdown");

    if (value.checked == true)
    {
        subfield.disabled = false;
    }
    else
    {
        subfield.disabled = true;
    }
} 
function enableKeyInfluencer(value)
{
    var subfield = document.getElementById("keyidropdown");

    if (value.checked == true)
    {
        subfield.disabled = false;
    }
    else
    {
        subfield.disabled = true;
    }
} 
function enableMediaOutlet(value)
{
    var subfield = document.getElementById("mediaoutletdropdown");

    if (value.checked == true)
    {
        subfield.disabled = false;
    }
    else
    {
        subfield.disabled = true;
    }
} 
function enableLeadership(value)
{
    var subfield = document.getElementById("leadershipdropdown");

    if (value.checked == true)
    {
        subfield.disabled = false;
    }
    else
    {
        subfield.disabled = true;
    }
} 
function enableIndustry(value)
{
    var subfield = document.getElementById("industrytext");

    if (value.checked == true)
    {
        subfield.disabled = false;
    }
    else
    {
        subfield.disabled = true;
    }
} 
function enableRoadmap(value)
{
    var subfield = document.getElementById("roadmapdropdown");

    if (value.checked == true)
    {
        subfield.disabled = false;
    }
    else
    {
        subfield.disabled = true;
    }
} 
function enablePractitioner(value)
{
    var subfield = document.getElementById("practitionertext");

    if (value.checked == true)
    {
        subfield.disabled = false;
    }
    else
    {
        subfield.disabled = true;
    }
} 
function enableOthergroup(value)
{
    var subfield = document.getElementById("othergrouptext");

    if (value.checked == true)
    {
        subfield.disabled = false;
    }
    else
    {
        subfield.disabled = true;
    }
} 
function enableSeekcon(value)
{
    var subfield = document.getElementById("seekcontracttext");

    if (value.checked == true)
    {
        subfield.disabled = false;
    }
    else
    {
        subfield.disabled = true;
    }
} 
function enableOffercon(value)
{
    var subfield = document.getElementById("offercontracttext");

    if (value.checked == true)
    {
        subfield.disabled = false;
    }
    else
    {
        subfield.disabled = true;
    }
} 
function enableEtc(value)
{
    var subfield = document.getElementById("etctext");

    if (value.checked == true)
    {
        subfield.disabled = false;
    }
    else
    {
        subfield.disabled = true;
    }
} 
function isValidEmail() {	
	
	$email = document.getElementById(email1).value;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		alert("Email address is not valid");
		return false;   
	} else {
		return true;
	}
	
	
}
function isNumber(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode	
    if (charCode > 33 && (charCode < 48 || charCode > 57)) {
		return false;
	}        
    return true;
}
function isCharacterNumber(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode	
    if (charCode >= 47 && charCode <= 57) {
		return true;
	} else if (charCode >= 97 && charCode <= 122) {
		return true;
	} else if (charCode >= 65 && charCode <= 90) {
		return true;
	} else if (charCode == 32) {
		return true;
	}
    return false;
}
</script>
<link href="css/basic.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>
<div id="box">
<p><strong>Add a new organization entry into RDA FNQ&TS database. Please fill in the form provided below. (* mandatory fields)</strong></p>
<form name="addentry" method="post" action="addentryprocess.php" onSubmit="javascript:return isValidEmail()">
<p>
 <label for="firstname">First Name: *</label><br />
 <input name="firstname" type="text" id="firstname" size="30" onkeypress='return isCharacterNumber(event)' required/>
</p>
<p>
 <label for="lastname">Last Name: *</label><br />
 <input name="lastname" type="text" id="lastname" size="30" onkeypress='return isCharacterNumber(event)' required/>
</p>
<p>
 <label for="position">Position Title: </label><br />
 <input name="position" type="text" id="position" size="30" onkeypress='return isCharacterNumber(event)' />
</p>

<p>
 <label for="orgname">Organization Name: *</label><br />
 <input name="orgname" type="text" id="orgname" size="30" onkeypress='return isCharacterNumber(event)' required/>
</p>
<p>
 <label for="phone">Phone Number: *</label><br />
 <input name="phone" type="text" id="phone" size="15" onkeypress="return isNumber(event)" maxlength="15" required/>
</p>
<p>
 <label for="fax">Fax Number: </label><br />
 <input name="fax" type="text" id="fax" size="15" onkeypress="return isNumber(event)" maxlength="15" />
</p>
<p>
 <label for="mobile">Mobile Number: *</label><br />
 <input name="mobile" type="text" id="mobile" size="15" onkeypress="return isNumber(event)" maxlength="15" required/>
</p>
<p>
 <label for="othernumber">Other Number: </label><br />
 <input name="othernumber" type="text" id="othernumber" size="15" onkeypress="return isNumber(event)" maxlength="15" />
</p>
<p>
 <label for="skype">Skype Name: </label><br />
 <input name="skype" type="text" id="skype" size="30" />
</p>
<p>
 <label for="twitter">Twitter Account: </label><br />
 <input name="twitter" type="text" id="twitter" size="30" />
</p>

<p>
 <label for="email1">Email 1: *</label><br />
 <input name="email1" type="email" id="email1" size="30" required/>
 <label>
   <br>
   <input type="checkbox" name="email1nominate[]" value="rconnector" id="email1nominate_0">
   Nominate this address for RDA FNQ&TS Regional Connector</label>
 <br>
 <label>
   <input type="checkbox" name="email1nominate[]" value="newsletter" id="email1nominate_1">
   Nominate this address for RDA FNQ&TS newsletter</label>
 <br>
 <label>
   <input type="checkbox" name="email1nominate[]" value="info" id="email1nominate_2">
   Nominate this address for information and correspondence</label>
 <br>
</p>
<p>
 <label for="email2">Email 2: </label><br />
 <input name="email2" type="email" id="email2" size="30" />
 <label>
   <br>
   <input type="checkbox" name="email2nominate[]" value="rconnector" id="email2nominate_0">
   Nominate this address for RDA FNQ&TS Regional Connector</label>
 <br>
 <label>
   <input type="checkbox" name="email2nominate[]" value="newsletter" id="email2nominate_1">
   Nominate this address for RDA FNQ&TS newsletter</label>
 <br>
 <label>
   <input type="checkbox" name="email2nominate[]" value="info" id="email2nominate_2">
   Nominate this address for information and correspondence</label>
 <br>
</p>
<p>
 <label for="email3">Email 3: </label><br />
 <input name="email3" type="email" id="email3" size="30" />
 <label>
   <br>
   <input type="checkbox" name="email3nominate[]" value="rconnector" id="email3nominate_0">
   Nominate this address for RDA FNQ&TS Regional Connector</label>
 <br>
 <label>
   <input type="checkbox" name="email3nominate[]" value="newsletter" id="email3nominate_1">
   Nominate this address for RDA FNQ&TS newsletter</label>
 <br>
 <label>
   <input type="checkbox" name="email3nominate[]" value="info" id="email3nominate_2">
   Nominate this address for information and correspondence</label>
 <br>
</p>

<fieldset>
 <legend>Business Location</legend>
 <label for="businessaddress1">Address 1: *</label>
 <input name="businessaddress1" type="text" id="businessaddress1" size="40" onkeypress='return isCharacterNumber(event)' required/><br />
 <label for="businessaddress2">Address 2: </label>
 <input name="businessaddress2" type="text" id="businessaddress2" size="40" onkeypress='return isCharacterNumber(event)' /><br />
 <label for="businesssuburb">Suburb: *</label>
 <input name="businesssuburb" type="text" id="businesssuburb" size="20" onkeypress='return isCharacterNumber(event)' required/><br />
 <label for="businessstate">State: *</label> 
 <select name="businessstate" id="businessstate" required>
  <option value="qld" selected="selected">QLD</option>
  <option value="nsw">NSW</option>
  <option value="act">ACT</option>
  <option value="vic">VIC</option>
  <option value="tas">TAS</option>
  <option value="sa">SA</option>
  <option value="wa">WA</option>
  <option value="nt">NT</option>
 </select><br />
 <label for="businesspostcode">Postcode: *</label>
 <input name="businesspostcode" type="text" id="businesspostcode" size="10" onkeypress="return isNumber(event)" required/><br />
 <label for="businesscountry">Country: </label>
 <input name="businesscountry" type="text" id="businesscountry" size="30" onkeypress='return isCharacterNumber(event)' />
</fieldset>
<br />
<fieldset>
 <legend>Postal Address</legend>
 <label for="postaladdress1">Address 1: </label>
 <input name="postaladdress1" type="text" id="postaladdress1" size="40" onkeypress='return isCharacterNumber(event)' /><br />
 <label for="postaladdress2">Address 2: </label>
 <input name="postaladdress2" type="text" id="postaladdress2" size="40" onkeypress='return isCharacterNumber(event)' /><br />
 <label for="postalsuburb">Suburb: </label>
 <input name="postalsuburb" type="text" id="postalsuburb" size="20" onkeypress='return isCharacterNumber(event)' /><br />
 <label for="postalstate">State: </label> 
 <select name="postalstate" id="postalstate">
  <option value="qld" selected="selected">QLD</option>
  <option value="nsw">NSW</option>
  <option value="act">ACT</option>
  <option value="vic">VIC</option>
  <option value="tas">TAS</option>
  <option value="sa">SA</option>
  <option value="wa">WA</option>
  <option value="nt">NT</option>
 </select><br />
 <label for="postalpostcode">Postcode: </label>
 <input name="postalpostcode" type="text" id="postalpostcode" size="10" onkeypress="return isNumber(event)" /><br />
 <label for="postalcountry">Country: </label>
 <input name="postalcountry" type="text" id="postalcountry" size="30" onkeypress='return isCharacterNumber(event)' />
</fieldset>
<br />
<p>
 <label for="website">Website Address: </label><br />
 <input name="website" type="text" id="website" size="50" />
</p>
<fieldset>
 <legend>Select regions in which you do business, provide services and/or sell products *</legend>  

 <table width="500">
   <tr>
     <td width="50%"><label>
       <input type="checkbox" name="regiongroup[]" value="City of Cairns" id="regiongroup_0" class="group-required">
       City of Cairns</label></td>
     <td width="50%"><label>
       <input type="checkbox" name="regiongroup[]" value="Port Douglas & Mossman" id="regiongroup_1">
       Port Douglas & Mossman</label></td>
   </tr>
   <tr>
     <td width="50%"><label>
       <input type="checkbox" name="regiongroup[]" value="Cook Shire" id="regiongroup_2">
       Cook Shire</label></td>
     <td width="50%"><label>
       <input type="checkbox" name="regiongroup[]" value="Other Cape York Peninsula" id="regiongroup_3">
       Other Cape York Peninsula</label></td>
   </tr>
   <tr>
     <td width="50%"><label>
       <input type="checkbox" name="regiongroup[]" value="Yarrabah Shire" id="regiongroup_4">
       Yarrabah Shire</label></td>
     <td width="50%"><label>
       <input type="checkbox" name="regiongroup[]" value="Cassowary Coast" id="regiongroup_5">
       Cassowary Coast</label></td>
   </tr>
   <tr>
     <td width="50%"><label>
       <input type="checkbox" name="regiongroup[]" value="Croydon Shire" id="regiongroup_6">
       Croydon Shire</label></td>
     <td width="50%"><label>
       <input type="checkbox" name="regiongroup[]" value="Etheridge Shire" id="regiongroup_7">
       Etheridge Shire</label></td>
   </tr> 
   <tr>
     <td width="50%"><label>
       <input type="checkbox" name="regiongroup[]" value="Tablelands" id="regiongroup_8">
       Tablelands</label></td>
     <td width="50%"><label>
       <input type="checkbox" name="regiongroup[]" value="Torres Strait Islands" id="regiongroup_9">
       Torres Strait Islands</label></td>
   </tr>
   <tr>
     <td colspan="2"><label>
       <input type="checkbox" name="regiongroup[]" value="Far North QLD region excluding Torres Strait" id="regiongroup_10">
       Far North QLD region excluding Torres Strait</label></td>
   </tr>
   <tr>
     <td colspan="2"><label>
       <input type="checkbox" name="regiongroup[]" value="Far North QLD region including Torres Strait" id="regiongroup_11">
       Far North QLD region including Torres Strait</label></td>
   </tr>
   <tr>
     <td colspan="2"><label>
       <input type="checkbox" name="regiongroup[]" value="Other Queensland" id="regiongroup_12">
       Other Queensland</label></td>
   </tr>
   <tr>
     <td colspan="2"><label>
       <input type="checkbox" name="regiongroup[]" value="interstate" id="regiongroup_13" onClick="enableInterstate(this)">
       Interstate</label>       
       <select name="interstatedropdown" id="interstatedropdown" disabled="disabled">
        <option selected="selected"></option>
 		<option value="NSW">NSW</option>
  		<option value="ACT">ACT</option>
  		<option value="VIC">VIC</option>
  		<option value="TAS">TAS</option>
  		<option value="SA">SA</option>
  		<option value="WA">WA</option>
  		<option value="NT">NT</option>
        <option value="ALL">ALL</option>
       </select></td>       
   </tr>
   <tr>
     <td colspan="2"><label>
       <input type="checkbox" name="regiongroup[]" value="international" id="regiongroup_14" onClick="enableInternational(this)">
       International </label>
       <label for="internationalregion"></label>
       <input type="text" name="internationalregion" id="internationalregion" size="60" disabled="disabled" maxlength="60" onkeypress='return isCharacterNumber(event)' ></td>
   </tr>
 </table>
</fieldset>
<br />
<fieldset><legend>Contact type</legend>

    <label>
      <input type="checkbox" name="contacttypegroup[]" value="keydm" id="contacttypegroup_0" onClick="enableKeyDM(this)">
      Key Decision Maker</label>
    <select name="keydmdropdown" id="keydmdropdown" disabled="disabled">
     <option selected="selected"></option>
     <option value="CEO">CEO</option>
     <option value="MD">MD</option>
     <option value="Chair">Chair</option>
     <option value="Editor">Editor</option>
     <option value="MP">MP</option>
    </select>
    <br>
    <label>
      <input type="checkbox" name="contacttypegroup[]" value="keyi" id="contacttypegroup_1" onClick="enableKeyInfluencer(this)">
      Key Influencer</label>
    <select name="keyidropdown" id="keyidropdown" disabled="disabled">
     <option selected="selected"></option>
     <option value="deputyceo">Deputy CEO</option>
     <option value="executive">Executive</option>
     <option value="commiteemember">Committee member</option>
     <option value="seniorjourno">Senior Journo</option>
     <option value="advisor">Advisor</option>
    </select>
    <br>
    <label>
      <input type="checkbox" name="contacttypegroup[]" value="earlyadaptor" id="contacttypegroup_2">
      Early Adaptor</label>
    <br>
    <label>
      <input type="checkbox" name="contacttypegroup[]" value="gatekeeper" id="contacttypegroup_3">
      Gatekeeprer</label>
    <br>
    <label>
      <input type="checkbox" name="contacttypegroup[]" value="operational" id="contacttypegroup_4">
      Operational Contact</label>  
</fieldset>
<br />
<fieldset><legend>Organization Type</legend>
	<select name="orgtype" id="orgtype">
     <option selected="selected"></option>
     <option value="Federal government">Federal government</option>
     <option value="State government">State government</option>
     <option value="Local government">Local government</option>
     <option value="Traditional Owner/Group">Traditional Owner/Group</option>
     <option value="Government owned corporation">Government owned corporation</option>
     <option value="Statutory Authority">Statutory Authority</option>
     <option value="Not for profit">Not for profit</option>
     <option value="Private Company">Private Company</option>
     <option value="Publically Listed Company">Publically Listed Company</option>
     <option value="Social Enterprise">Social Enterprise</option>
     <option value="Small business or Sole trader">Small business or Sole trader</option>
    </select>

</fieldset>
<br />
<fieldset>
<legend>Organization Main Purpose</legend>

<label>
 <input type="checkbox" name="orgmainpurpose[]" value="economic" id="orgmainpurpose_0">
        Economic/Profit</label><br>
<label>
 <input type="checkbox" name="orgmainpurpose[]" value="environmental" id="orgmainpurpose_1">
        Environmental Management/Advocacy</label><br>
<label>
 <input type="checkbox" name="orgmainpurpose[]" value="socialcomm" id="orgmainpurpose_2">
        Social/Community Development Services</label><br>
<label>
 <input type="checkbox" name="orgmainpurpose[]" value="health" id="orgmainpurpose_3">
        Health Services</label><br>
<label>
 <input type="checkbox" name="orgmainpurpose[]" value="education" id="orgmainpurpose_4">
        Education</label><br>
<label>
 <input type="checkbox" name="orgmainpurpose[]" value="marketing" id="orgmainpurpose_5">
        Destination Marketing</label><br>
<label>
 <input type="checkbox" name="orgmainpurpose[]" value="research" id="orgmainpurpose_6">
        Research</label><br>
<label>
 <input type="checkbox" name="orgmainpurpose[]" value="contractor" id="orgmainpurpose_7">
        Consultancy/Contractor</label><br>
<label>
 <input type="checkbox" name="orgmainpurpose[]" value="mediaoutlet" id="orgmainpurpose_8" onClick="enableMediaOutlet(this)">
        Media Outlet</label>
  <select name="mediaoutletdropdown" id="mediaoutletdropdown" disabled="disabled">
   <option selected="selected"></option>
   <option value="newspaper">Newspaper</option>
   <option value="radio">Radio</option>
   <option value="tv">TV</option>
   <option value="internet">Internet</option>
   <option value="magazine">Magazine/Journal</option>
  </select>
</fieldset>
<br />
<fieldset><legend>Group Membership</legend>
    <label>
      <input type="checkbox" name="membershipgroup[]" value="leadership" id="membershipgroup_0" onClick="enableLeadership(this)">
      RDA FNQ&TS Leadership</label>
    <select name="leadershipdropdown" id="leadershipdropdown" disabled="disabled">
     <option selected="selected"></option>
  	 <option value="Business&Resources Boom">Business&Resources Boom</option>
   	 <option value="Tourism and Aviation Futures">Tourism and Aviation Futures</option>
  	 <option value="Agricultural Futures">Agricultural Futures</option>
  	 <option value="Regional Connectivity">Regional Connectivity</option>
  	 <option value="Land and Sea Livelihoods">Land and Sea Livelihoods</option>
     <option value="Climate adaptation">Climate adaptation</option>
     <option value="Energy-Water Transformations">Energy-Water Transformations</option>
     <option value="Remote Service Reform">Remote Service Reform</option>
     <option value="Social and Cultural Planning & Development">Social and Cultural Planning & Development</option>
     <option value="Tropical Knowledge Economy">Tropical Knowledge Economy</option>
     <option value="Strong Local Governance">Strong Local Governance</option>
     <option value="Devolved Government">Devolved Government</option>
    </select>
    <br>
    <label>
      <input type="checkbox" name="membershipgroup[]" value="industry" id="membershipgroup_1" onClick="enableIndustry(this)">
      Industry Working Group</label>
    <input type="text" name="industrytext" id="industrytext" size="60" disabled="disabled" maxlength="60">
    <br>
    <label>
      <input type="checkbox" name="membershipgroup[]" value="roadmap" id="membershipgroup_2" onClick="enableRoadmap(this)">
      Roadmap consultation</label>
    <select name="roadmapdropdown" id="roadmapdropdown" disabled="disabled">
     <option selected="selected"></option>
  	 <option value="2010">2010</option>
 	 <option value="2011">2011</option>
     <option value="2012">2012</option>
     <option value="2013">2013</option>
     <option value="2014">2014</option>
    </select>
    <br>
    <label>
      <input type="checkbox" name="membershipgroup[]" value="practitioner" id="membershipgroup_3" onClick="enablePractitioner(this)">
      Practitioner Group</label>
    <input type="text" name="practitionertext" id="practitionertext" size="60" disabled="disabled" maxlength="60">
    <br>
    <label>
      <input type="checkbox" name="membershipgroup[]" value="othergroup" id="membershipgroup_4" onClick="enableOthergroup(this)">
      Other Group</label>
    <input type="text" name="othergrouptext" id="othergrouptext" size="60" disabled="disabled" maxlength="60">
</fieldset>
<br />
<fieldset>
<legend>Subscribe</legend>
    <label>Would you like to subscribe to RDA FNQ&TS for promotional purpose?</label>
	<select name="promotionsubscribe" id="promotionsubscribe">
     <option selected="selected" value="promotionsub">YES</option>
  	 <option value="promotionunsub">NO</option>
	</select>      
    <br>
    <label>Would you like to subscribe to RDA FNQ&TS Regional Connector presence?</label>
	<select name="connectorsubscribe" id="connectorsubscribe">
     <option selected="selected" value="connectorsub">YES</option>
  	 <option value="connectorunsub">NO</option>
	</select>       
</fieldset>
<br />
<p>
 <label for="keywords">Keywords: (separate with comma(,)) *</label><br />
 <input name="keywords" type="text" id="keywords" placeholder="e.g. health,disability,NRM,agriculture,etc" size="80"  maxlength="300" required/>
</p>
<fieldset>
<legend>Key Interests</legend>
  <label>
    <input type="checkbox" name="keyinterestsgroup[]" value="seekpartner" id="keyinterestsgroup_0">
    Seeking partners for projects</label>
  <br>
  <label>
    <input type="checkbox" name="keyinterestsgroup[]" value="seekchannel" id="keyinterestsgroup_1">
    Seeking channels to market</label>
  <br>
  <label>
    <input type="checkbox" name="keyinterestsgroup[]" value="offerchannel" id="keyinterestsgroup_2">
    Offering channels to market</label>
  <br>
  <label>
    <input type="checkbox" name="keyinterestsgroup[]" value="seekcontractor" id="keyinterestsgroup_3" onClick="enableSeekcon(this)">
    Seeking contractor/consultant</label>
  <input type="text" name="seekcontracttext" id="seekcontracttext" size="50" maxlength="60" placeholder="e.g. Communications specialist, ICT expert" disabled="disabled">
  <br>
  <label>
    <input type="checkbox" name="keyinterestsgroup[]" value="offercontractor" id="keyinterestsgroup_4" onClick="enableOffercon(this)">
    Offering contractor/consultant</label>
  <input type="text" name="offercontracttext" id="offercontracttext" size="50" maxlength="60" placeholder="e.g. Communications specialist, ICT expert" disabled="disabled">
  <br>
  <label>
    <input type="checkbox" name="keyinterestsgroup[]" value="seekcapital" id="keyinterestsgroup_5">
    Seeking venture captial</label>
  <br>
  <label>
    <input type="checkbox" name="keyinterestsgroup[]" value="offercapital" id="keyinterestsgroup_6">
    Offering venture capital</label>
  <br>
  <label>
    <input type="checkbox" name="keyinterestsgroup[]" value="seekfunding" id="keyinterestsgroup_7">
    Seeking Funding/Grants/Sponsorship/Scholarships</label>
  <br>
  <label>
    <input type="checkbox" name="keyinterestsgroup[]" value="offerfunding" id="keyinterestsgroup_8">
    Offering Funding/Grants/Sponsorship/Scholarships</label>
  <br>
  <label>
    <input type="checkbox" name="keyinterestsgroup[]" value="seekresearch" id="keyinterestsgroup_9">
    Seeking research support</label>
  <br>
  <label>
    <input type="checkbox" name="keyinterestsgroup[]" value="offerresearch" id="keyinterestsgroup_10">
    Offering research support</label>
  <br>
  <label>
    <input type="checkbox" name="keyinterestsgroup[]" value="etc" id="keyinterestsgroup_11" onClick="enableEtc(this)">
    Etc</label>
  <input type="text" name="etctext" id="etctext" size="50" maxlength="60" disabled="disabled">
</fieldset>
<p>
 <input type="submit" name="submit" id="submit" value="Submit" />
</p>
</form>
</div>
<img src="images/bottom.png">
</div>
</body>
</html>