<?php
	$dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'game';

$con=mysqli_connect ($dbHost, $dbUsername, $dbPassword) or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con, $dbName);
?>



