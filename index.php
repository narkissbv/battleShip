<?php
    $link = false;
    include('../db_connect.php');
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
?>
        <h1>Welcome to Battle Ship!</h1>
        <h2>Repo update test 2</h2>
<?php
    mysqli_close($link);
?>
