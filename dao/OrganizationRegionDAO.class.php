<?php
class OrganizationRegionDAO{

	public static function insert($regionid, $organizationid) {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO OrganizationRegion (RegionID, OrganizationID) VALUES (:regionid, :organizationid)');
			$stmt->execute(array(
				':organizationid' => $organizationid,
				':regionid' => $regionid
			));			
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}			
	}
}
?>