<?php
    $link = false;
    include('../db_connect.php');
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
	if(isset($_SESSION['id'])){
		$code = 300;
		$response = array('success' => true, 'message' => 'login success', 'redirect' => 'main.php');
	}
	else {
		$code = 404;
		$response = array('success' => false, 'message' => 'login failed');
	}
	http_response_code($code);
	print json_encode($response);
	mysqli_close($link);
?>
