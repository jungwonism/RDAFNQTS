<?php
class MemberContactDAO{

	public static function insert($memberid, $contacttypeid) {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO MemberContact (MemberID, ContactTypeID) VALUES (:memberid, :contacttypeid)');
			$stmt->execute(array(
				':memberid' => $memberid,
				':contacttypeid' => $contacttypeid
			));			
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}			
	}

}
?>