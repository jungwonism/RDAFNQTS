<?php
class MainPurposeDAO{

	public static function insert($economic, $environmental, $socialcomm, $health, $education, $marketing, $research, $contractor, $mediaoutlet) {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO MainPurpose (EconomicProfit, Environmental, SocialCommunity, HealthServices, Education, DestinationMarketing, Research, ConsultancyContractor, MediaOutlet) VALUES (:economic, :environmental, :socialcomm, :health, :education, :marketing, :research, :contractor, :mediaoutlet)');
			$stmt->execute(array(
				':economic' => $economic,
				':environmental' => $environmental,
				':socialcomm' => $socialcomm,
				':health' => $health, 
				':education' => $education,
				':marketing' => $marketing,
				':research' => $research,
				':contractor' => $contractor,
				':mediaoutlet' => $mediaoutlet
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
			
			$stmt = $conn->prepare('SELECT MainPurposeID FROM MainPurpose ORDER BY MainPurposeID DESC LIMIT 1');
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			return $result->MainPurposeID;						
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}		
	}
}
?>