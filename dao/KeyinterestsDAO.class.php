<?php
class KeyinterestsDAO{

	public static function insert($seekpartner, $seekchannel, $offerchannel, $seekcontractor, $offercontractor, $seekcapital, $offercapital, $seekfunding, $offerfunding, $seekresearch, $offerresearch, $etc) {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO Keyinterests (SeekingPartners, SeekingChannels, OfferingChannels, SeekingContractor, OfferingContractor, SeekingVentureCapital, OfferingVentureCaptital, SeekingFunding, OfferingFunding, SeekingResearchSupport, OfferingResearchSupport, Etc) VALUES (:seekpartner, :seekchannel, :offerchannel, :seekcontractor, :offercontractor, :seekcapital, :offercapital, :seekfunding, :offerfunding, :seekresearch, :offerresearch, :etc)');
			$stmt->execute(array(
				':seekpartner' => $seekpartner,
				':seekchannel' => $seekchannel,
				':offerchannel' => $offerchannel,
				':seekcontractor' => $seekcontractor, 
				':offercontractor' => $offercontractor,
				':seekcapital' => $seekcapital,
				':offercapital' => $offercapital,
				':seekfunding' => $seekfunding,
				':offerfunding' => $offerfunding, 
				':seekresearch' => $seekresearch,
				':offerresearch' => $offerresearch,
				':etc' => $etc
			));			
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}	
	}
	
	public static function queryID() {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 			
			
			$stmt = $conn->prepare('SELECT KeyInterestsID FROM Keyinterests ORDER BY KeyInterestsID DESC LIMIT 1');
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			return $result->KeyInterestsID;						
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}		
	}
}
?>