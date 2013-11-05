<?php
include("include_dao.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Regional Connector</title>
<script type="text/javascript">
function start()
{
	starttime = (new Date()).getTime();
}
function leave()
{
	// to measure how long the users stay in search engine page and store the value into database
	stoptime = (new Date()).getTime();
	var params = "timeSpent="+((stoptime-starttime)/1000);
	xmlobj = new XMLHttpRequest();
	xmlobj.open('POST', 'ajaxlogtime.php', true);
	xmlobj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlobj.setRequestHeader("Content-length", params.length);
	xmlobj.setRequestHeader("Connection", "close");
	xmlobj.send(params);
}
window.onload=start;
window.onbeforeunload = leave;
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
</script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<link href="css/basic.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="container">
<a href="http://www.rdafnqts.org.au/"><img src="images/logo.png"></a>
<div id="box">
<p><strong>Regional Connector - Please select options below to search like-minded organization.</strong></p>
<form name="addentry" method="post" action="searchengineprocess.php">
<fieldset>
 <legend>Select regions in which you do business, provide services and/or sell products</legend>  

 <table width="500">
   <tr>
     <td width="50%"><label>
       <input type="checkbox" name="regiongroup[]" value="City of Cairns" id="regiongroup_0">
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
       <input type="text" name="internationalregion" id="internationalregion" size="60" disabled="disabled" maxlength="60"></td>
   </tr>
 </table> 
 <input type='hidden' id='multichk' />
</fieldset>

<br />
<fieldset><legend>Organization Type</legend>
	<select name="orgtype" id="orgtype">
	 <option></option>
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
<p>
 <label for="keywords">Keywords: (separate with comma(,))</label><br />
 <input name="keywords" type="text" id="keywords" placeholder="e.g. health,disability,NRM,agriculture,etc" size="80"  maxlength="300" />
</p>
<br />
<input type="submit" name="submit" id="submit" value="Submit" />

</form>
</div>
<img src="images/bottom.png">
</div>
</body>
</html>