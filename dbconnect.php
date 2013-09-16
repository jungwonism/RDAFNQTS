<?php
$username = "root";
$password = "lilac";
$hostname = "localhost"; 

//connection to the database
$connect = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");
mysql_select_db('RDAFNQTS', $connect) or die('Connection error: '.mysql_error());


//$query = "INSERT INTO Organization (OrganizationName, WebsiteAddress, OrganizationType, Subscribtion, BusinessAddressID, PostalAddressID, GroupMembershipID, RegionID, MainPurposeID, KeywordID, KeyInterestsID) VALUES ('Org0001', 'www.org0001.org', 'Federal government', '1', '0001', '0001', '0001', '0001', '0001', '0001', '0001')";
//echo $query;
//
//$result = mysql_query($query);
//	
//if ($result)		
//	echo "A new entry Added successfully";
//else
//	die('Invalid query: '.mysql_error());
//echo "<br />";

?>