<?php
class OrganizationKeywordsDAO{

	public static function insert($organizationid, $keywordid) {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO OrganizationKeywords (OrganizationID, KeywordID) VALUES (:organizationid, :keywordid)');
			$stmt->execute(array(
				':organizationid' => $organizationid,
				':keywordid' => $keywordid
			));			
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}			
	}
}
?>