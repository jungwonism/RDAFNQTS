<?php
include("include_dao.php");

$spent = $_POST['timeSpent'];
QueryPageTimeDAO::insert($spent);
?>