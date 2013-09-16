<?php
class RegionsDAO{

	public static function insert($region) {
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO Regions (Region) VALUES (:region)');
			$stmt->execute(array(
				':region' => $region
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
			
			$stmt = $conn->prepare('SELECT RegionID FROM Regions ORDER BY RegionID DESC LIMIT 1');
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			return $result->RegionID;						
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}			
	}
}
?>