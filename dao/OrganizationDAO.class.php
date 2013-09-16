<?php

class OrganizationDAO{
	
	public static function insert($orgName, $website, $orgType, $promotionsubscribe, $connectorsubscribe, $businessaddress1, $businessaddress2, $businesssuburb, $businessstate, $businesspostcode, $businesscountry, $postaladdress1, $postaladdress2, $postalsuburb, $postalstate, $postalpostcode, $postalcountry, $memberid) {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO Organization (OrganizationName, WebsiteAddress, OrganizationType, SubscribePromotion, SubscribeConnector, BusinessAddress1, BusinessAddress2, BusinessSuburb, BusinessState, BusinessPostcode, BusinessCountry, PostalAddress1, PostalAddress2, PostalSuburb, PostalState, PostalPostcode, PostalCountry, MemberID) VALUES (:orgName, :website, :orgType, :promotionsubscribe, :connectorsubscribe, :businessaddress1, :businessaddress2, :businesssuburb, :businessstate, :businesspostcode, :businesscountry, :postaladdress1, :postaladdress2, :postalsuburb, :postalstate, :postalpostcode, :postalcountry, :memberid)');
			$stmt->execute(array(
				':orgName' => $orgName,
				':website' => $website,
				':orgType' => $orgType,
				':promotionsubscribe' => $promotionsubscribe,
				':connectorsubscribe' => $connectorsubscribe,
				':businessaddress1' => $businessaddress1,
				':businessaddress2' => $businessaddress2,
				':businesssuburb' => $businesssuburb,
				':businessstate' => $businessstate,
				':businesspostcode' => $businesspostcode,
				':businesscountry' => $businesscountry,
				':postaladdress1' => $postaladdress1,
				':postaladdress2' => $postaladdress2,
				':postalsuburb' => $postalsuburb,
				':postalstate' => $postalstate,
				':postalpostcode' => $postalpostcode,
				':postalcountry' => $postalcountry,
				':memberid' => $memberid
			));	
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}			
	}
	
	public static function queryID($orgName) {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 			
			
			$stmt = $conn->prepare('SELECT OrganizationID FROM Organization WHERE OrganizationName = :orgName');
			$stmt->execute(array(':orgName' => $orgName));
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			return $result->OrganizationID;
			// while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
				// $memberid = $row->MemberID;
				// print_r($memberid);
			// }			
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}	
	}
}
?>