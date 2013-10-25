<?php
class EmailDAO{

	public static function insert($email, $rconnector, $newsletter, $info, $organizationid) {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		if(!isset($email)) return;
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO Email (Email, RCNominate, NewsNominate, InfoNominate, OrganizationID) VALUES (:email, :rconnector, :newsletter, :info, :organizationid)');
			$stmt->execute(array(
				':email' => $email,
				':rconnector' => $rconnector,
				':newsletter' => $newsletter,
				':info' => $info,
				':organizationid' => $organizationid
			));			
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}			
	}
	
	public static function update($email, $rconnector, $newsletter, $info) {
		$dsn = "mysql:dbname=rdafnqts;host=localhost";
		   
		$username = "root";
		$password = "lilac";

		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conn->prepare('UPDATE email
			SET RCNominate=:rconnector, NewsNominate=:newsletter, InfoNominate=:info
			WHERE Email=:email');
			if($stmt->execute(array(
			':email' => $email,
			':rconnector' => $rconnector,
			':newsletter' => $newsletter,
			':info' => $info
			))) echo 'Details Updated';

		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

}
?>