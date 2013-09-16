<?php
class GroupMembershipDAO{

	public static function insert($leadership, $industry, $roadmap, $practitioner, $other) {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO GroupMembership (Leadership, IndustryWorking, RoadmapConsultation, Practitioner, Other) VALUES (:leadership, :industry, :roadmap, :practitioner, :other)');
			$stmt->execute(array(
				':leadership' => $leadership,
				':industry' => $industry,
				':roadmap' => $roadmap,
				':practitioner' => $practitioner, 
				':other' => $other
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
			
			$stmt = $conn->prepare('SELECT GroupMembershipID FROM GroupMembership ORDER BY GroupMembershipID DESC LIMIT 1');
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			return $result->GroupMembershipID;
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