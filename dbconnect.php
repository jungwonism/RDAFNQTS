<?php
$username = "root";
$password = "lilac";
$hostname = "localhost"; 

//connection to the database
$connect = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");
mysql_select_db('RDAFNQTS', $connect) or die('Connection error: '.mysql_error());



?>