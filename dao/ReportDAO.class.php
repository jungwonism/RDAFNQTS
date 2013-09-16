<?php
class ReportDAO{

	public static function insert($reporttype) {
	
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO report (type, date) VALUES (:type, now())');
			$stmt->execute(array(
				':type' => $reporttype				
			));			
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}			
	}	
	
	public static function exportCSV() {		
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 	
			date_default_timezone_set('Australia/Brisbane');
			$date = date('d_m_Y h.i.s a', time());
			
			$filename = "c:/report/searchedkeyword_".$date.".csv";
			$handle = fopen($filename, 'w+');
			$stmt = $conn->prepare('SELECT searchedkeywords, COUNT( * ) as count FROM searchedkeywords GROUP BY searchedkeywords ORDER BY COUNT( * ) DESC');
			$stmt->execute();
			
			fputcsv($handle, array('Searched Keywords','Number of times searched'));
			foreach($stmt as $row)
			{
				fputcsv($handle, array($row['searchedkeywords'], $row['count']));
			}
			 
			// Finish writing the file
			fclose($handle);	
			
					
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}		
	}
}
?>