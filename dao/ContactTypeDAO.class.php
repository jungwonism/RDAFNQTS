<?php
class ContactTypeDAO{

	public static function insert($keydm, $keyi, $early, $gate, $operation) {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO ContactType (KeyDecisionMaker, KeyInfluencer, EarlyAdaptor, Gatekeeper, OperationalContact) VALUES (:keydm, :keyi, :early, :gate, :operation)');
			$stmt->execute(array(
				':keydm' => $keydm,
				':keyi' => $keyi,
				':early' => $early,
				':gate' => $gate, 
				':operation' => $operation
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
			
			$stmt = $conn->prepare('SELECT ContactTypeID FROM ContactType ORDER BY ContactTypeID DESC LIMIT 1');
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			return $result->ContactTypeID;						
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}			
	}
}
?>