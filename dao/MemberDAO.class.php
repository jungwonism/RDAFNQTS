<?php
class MemberDAO{
	
	public static function insert($firstName, $surname, $positionTitle, $phone, $fax, $mobile, $otherNumber, $skypeName, $twitterAccount) {
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO Member (FirstName, Surname, PositionTitle, Phone, Fax, Mobile, OtherNumber, SkypeName, TwitterAccount) VALUES (:firstName, :surname, :positionTitle, :phone, :fax, :mobile, :otherNumber, :skypeName, :twitterAccount)');
			$stmt->execute(array(
				':firstName' => $firstName,
				':surname' => $surname,
				':positionTitle' => $positionTitle,
				':phone' => $phone, 
				':fax' => $fax, 
				':mobile' => $mobile, 
				':otherNumber' => $otherNumber, 
				':skypeName' => $skypeName,
				':twitterAccount' => $twitterAccount
			));			
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}		
	}
	
	public static function queryID($firstName, $surname, $positionTitle) {		
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 			
			
			$stmt = $conn->prepare('SELECT MemberID FROM Member WHERE FirstName = :firstName AND Surname = :surname AND PositionTitle = :positionTitle');
			$stmt->execute(array(
				':firstName' => $firstName,
				':surname' => $surname,
				':positionTitle' => $positionTitle				
			));
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			return $result->MemberID;
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
