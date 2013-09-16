<?php
class OrganizationKeyInterestsDAO{

	public static function insert($organizationid, $keyinterestsid) {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO OrganizationKeyInterests (OrganizationID, KeyInterestsID) VALUES (:organizationid, :keyinterestsid)');
			$stmt->execute(array(
				':organizationid' => $organizationid,
				':keyinterestsid' => $keyinterestsid
			));			
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}			
	}
}
?>