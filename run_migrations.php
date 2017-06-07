<?php
    $link = false;
    include('../db_connect.php');
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
	// Perform queries 
	$sql = "ALTER TABLE users ADD salt 	varchar(5);";
	mysqli_query ($sql, $link)

	mysqli_close($link);
?>