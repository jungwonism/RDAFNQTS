<?php
class OrganizationPurposeDAO{

	public static function insert($organizationid, $mainpurposeid) {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO OrganizationPurpose (OrganizationID, MainPurposeID) VALUES (:organizationid, :mainpurposeid)');
			$stmt->execute(array(
				':organizationid' => $organizationid,
				':mainpurposeid' => $mainpurposeid
			));			
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}			
	}
}
?>