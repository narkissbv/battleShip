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
	$sql = "SELECT name FROM users";
	$result = mysqli_query($link,$sql);

	while ($row = mysqli_fetch_row($result))
	 {
		echo 'user name: ' .$row[0]. '<br/>';
	 }

	mysqli_close($link);
?>
