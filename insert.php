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
	$sql = "INSERT INTO users (email,password,name) VALUES ('tommershahar5@gmail.com','12345','Tomer Shahar5')";
	mysqli_query($link,$sql);

	mysqli_close($link);
?>
