<?php
class KeywordsDAO{

	public static function insert($keywords) {
	
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO Keywords (Keyword) VALUES (:keywords)');
			$stmt->execute(array(
				':keywords' => $keywords
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
			
			$stmt = $conn->prepare('SELECT KeywordID FROM Keywords ORDER BY KeywordID DESC LIMIT 1');
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			return $result->KeywordID;						
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}	
		
	}
}
?>