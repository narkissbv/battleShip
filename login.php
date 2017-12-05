<?php
    $link = false;
    include('../db_connect.php');
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
	
	$password = mysqli_real_escape_string ($link, $_POST["password"]);
	$username = mysqli_real_escape_string ($link, $_POST["username"]);

	$sql="SELECT * FROM users WHERE name = '$username' AND password = md5(CONCAT ('$password' , salt))";
	if ($result=mysqli_query($link,$sql)) {
		if (mysqli_num_rows($result) > 0) {
			$code = 200;
			$response = array('success' => true, 'message' => 'login success');
			session_start();
			$_SESSION['id'] = $result['id'];
			$_SESSION['name'] = $result['name'];
		}
		else {
			$code = 404;
			$response = array('success' => false, 'message' => 'login failed');
		}
	}
	else {
		$code = 500;
		$response = array('success' => false, 'message' => 'Sql error' . mysqli_error($link));
	}
	http_response_code($code);
	print json_encode($response);
	mysqli_close($link);	
?>