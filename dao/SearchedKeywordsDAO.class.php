<?php
class SearchedKeywordsDAO{

	public static function insert($searchedkeywords) {
	
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   			
			
			$stmt = $conn->prepare('INSERT INTO searchedkeywords (searchedkeywords, date) VALUES (:searchedkeywords, now())');
			$stmt->execute(array(
				':searchedkeywords' => $searchedkeywords				
			));			
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}			
	}
	
	public static function querySearchedKeywords() {		
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 			
			
			$stmt = $conn->prepare('SELECT searchedkeywords, COUNT( * ) as count FROM searchedkeywords GROUP BY searchedkeywords ORDER BY COUNT( * ) DESC');
			$stmt->execute();
			
			echo '<table width="400">';
			   echo '<tr>
				 <td width="50%"><label><strong>Searched Keywords</strong></label></td>
				 <td width="50%"><label><strong>Number of times searched</strong></label></td>
			   </tr>';
			   while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
					echo '<tr>
					 <td width="50%"><label>',$row->searchedkeywords,'</label></td>
					 <td width="50%"><label>',$row->count,'</label></td>
				    </tr>';
					
			   }			   
			echo '</table>';		
					
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