<?php
include("include_dao.php");

$spent = $_POST['timeSpent'];
// insert time spent value in search engine page into database
QueryPageTimeDAO::insert($spent);
?>