<?php
    $link = false;
    include('../db_connect.php');
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
	session_start();
	echo $_SESSION['name'];
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<body>

	<h1>Welcome to Battle Ship!</h1>
    <h2>Login</h2>		
    <main>Hello <span id="loggedUserName"><?=$_SESSION['name'];?></span></main>		
		
	 <div id="logout" data-type="logout" style="cursor:pointer">forgot password</div>
</body>
</html>