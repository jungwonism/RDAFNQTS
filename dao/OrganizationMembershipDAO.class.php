<?php
class OrganizationMembershipDAO{

	public static function insert($organizationid, $groupmembershipid) {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO OrganizationMembership (OrganizationID, GroupMembershipID) VALUES (:organizationid, :groupmembershipid)');
			$stmt->execute(array(
				':organizationid' => $organizationid,
				':groupmembershipid' => $groupmembershipid
			));			
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}			
	}
}
?>