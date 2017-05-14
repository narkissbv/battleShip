<?php
    $link = false;
    include('../db_connect.php');
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="SELECT * FROM Users WHERE name='$username' and password='$password'";
if ($result=mysqli_query($link,$sql)) {
	$count=mysqli_num_rows($result);
	if($count>1){
		$code = 200;
		$rtn = array('success' => true, 'message' => 'login success');
		session_start();
	}
	else{
		$code = 404;
		$rtn = array('success' => false, 'message' => 'login failed');
	}
	http_response_code($code);
    print json_encode($rtn);
	mysqli_close($link);
	
}
?>
