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
	$email = $_POST["email"];
	$password = $_POST["password"];
	$name = $_POST["name"];
	$sql = "INSERT INTO Users (email,password,name) VALUES ('$email','$password','$name')";
	mysqli_query($link,$sql);

	mysqli_close($link);
?>