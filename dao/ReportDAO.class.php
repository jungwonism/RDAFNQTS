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
	
	public static function queryReport($interval) {		
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";		
		$timeperiod = " AND date BETWEEN DATE_SUB(NOW(), INTERVAL ".$interval." DAY) AND NOW()";		
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 			
			
			$stmt = $conn->prepare('SELECT type, COUNT( * ) as count FROM report WHERE type = "emailsent"'.$timeperiod);
			$stmt->execute();
			$emailsent = $stmt->fetch(PDO::FETCH_OBJ);
			
			$stmt = $conn->prepare('SELECT type, COUNT( * ) as count FROM report WHERE type = "unsuccessfulsearch"'.$timeperiod);
			$stmt->execute();
			$unsuccessful = $stmt->fetch(PDO::FETCH_OBJ);
			
			$stmt = $conn->prepare('SELECT type, COUNT( * ) as count FROM report WHERE type = "helpful"'.$timeperiod);
			$stmt->execute();
			$helpful = $stmt->fetch(PDO::FETCH_OBJ);
			
			$stmt = $conn->prepare('SELECT type, COUNT( * ) as count FROM report WHERE type = "nothelpful"'.$timeperiod);
			$stmt->execute();
			$nothelpful = $stmt->fetch(PDO::FETCH_OBJ);
			
			$stmt = $conn->prepare('SELECT type, COUNT( * ) as count FROM report WHERE type = "subscribed"'.$timeperiod);
			$stmt->execute();
			$subscribed = $stmt->fetch(PDO::FETCH_OBJ);		

			$stmt = $conn->prepare('SELECT time FROM querypagetime WHERE date BETWEEN DATE_SUB(NOW(), INTERVAL '.$interval.' DAY) AND NOW()');
			$stmt->execute();
			$timeArray = array();
			$count = 0;			
			while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
				array_push($timeArray, $row->time);				
				$count++;
			}
			$totaltimes = array_sum($timeArray);			
			$average = $totaltimes/$count;			
			
			echo '<table class="sortable" id="rounded-corner">';
			   echo '
			   <thead>
			   <tr>
				 <th scope="col">Number of follow through emails sent</td>
				 <th scope="col">Number of unsuccessful searches</td>
				 <th scope="col">Number of ‘helpful’ responses</td>
				 <th scope="col">Number of ‘not helpful’ responses</td>
				 <th scope="col">Number of subscribed users</td>
				 <th scope="col">Average time spent on search engine</td>
			   </tr>
			   </thead>
			   <tbody>
			   <tr>
				 <td><label>',$emailsent->count,'</label></td>
				 <td><label>',$unsuccessful->count,'</label></td>
				 <td><label>',$helpful->count,'</label></td>
				 <td><label>',$nothelpful->count,'</label></td>
				 <td><label>',$subscribed->count,'</label></td>
				 <td><label>',$average,' seconds','</label></td>
			   </tr>
			   </tbody></table>';		
					
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}		
	}
	
	public static function exportCSV($interval) {		
		
		$dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	    $username = "root";
		$password = "lilac";
		$timeperiod = " AND date BETWEEN DATE_SUB(NOW(), INTERVAL ".$interval." DAY) AND NOW()";
		
		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 	
			date_default_timezone_set('Australia/Brisbane');
			$date = date('d_m_Y h.i.s a', time());
			
			
			
			$filename = "c:/report/searchengineusage_".$date.".csv";
			//$filename = "searchengineusage_".$date.".csv";
			$handle = fopen($filename, 'w');
			
			
			$stmt = $conn->prepare('SELECT type, COUNT( * ) as count FROM report WHERE type = "emailsent"'.$timeperiod);
			$stmt->execute();
			$emailsent = $stmt->fetch(PDO::FETCH_OBJ);			
			
			$stmt = $conn->prepare('SELECT type, COUNT( * ) as count FROM report WHERE type = "unsuccessfulsearch"'.$timeperiod);
			$stmt->execute();
			$unsuccessful = $stmt->fetch(PDO::FETCH_OBJ);
						
			$stmt = $conn->prepare('SELECT type, COUNT( * ) as count FROM report WHERE type = "helpful"'.$timeperiod);
			$stmt->execute();
			$helpful = $stmt->fetch(PDO::FETCH_OBJ);			
			
			$stmt = $conn->prepare('SELECT type, COUNT( * ) as count FROM report WHERE type = "nothelpful"'.$timeperiod);
			$stmt->execute();
			$nothelpful = $stmt->fetch(PDO::FETCH_OBJ);			
			
			$stmt = $conn->prepare('SELECT type, COUNT( * ) as count FROM report WHERE type = "subscribed"'.$timeperiod);
			$stmt->execute();
			$subscribed = $stmt->fetch(PDO::FETCH_OBJ);					
				
			// create a file pointer connected to the output stream
			//$output = fopen('php://output', 'w');			
			
			fputcsv($handle, array('Number of follow through emails sent','Number of unsuccessful searches','Number of ‘helpful’ responses','Number of ‘not helpful’ responses','Number of subscribed users'));
			fputcsv($handle, array($emailsent->count, $unsuccessful->count, $helpful->count, $nothelpful->count, $subscribed->count));			
			
			// Finish writing the file
			fclose($handle);	
			
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}		
	}	
}
?>