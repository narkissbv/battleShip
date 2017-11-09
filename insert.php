<?php
    $link = false;
    include('../db_connect.php');
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
	echo('start');
	// Perform queries 
	$email = real_escape_string($link, $_POST["email"]);
	$password = real_escape_string($link, $_POST["password"]);
	$name = real_escape_string($link, $_POST["name"]);
	
	echo($email);
	$salt = substr(md5(microtime()),rand(0,26),5);
	$password = md5($password . $salt);
	$sql = "INSERT INTO users (email,password,name,salt)
			VALUES ('$email','$password','$name', $salt)";
	mysqli_query($link,$sql);
	echo(mysqli_error($link));
	echo('end');
	mysqli_close($link);
?>
