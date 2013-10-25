<?php
class QueryPageTimeDAO{

	public static function insert($time) {
		
		$dsn = "mysql:dbname=rdafnqts;host=localhost";
		$username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO querypagetime (Time) VALUES (:time)');
			$stmt->execute(array(
				':time' => $time
			));
		
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}		
		
	}
}
?>
