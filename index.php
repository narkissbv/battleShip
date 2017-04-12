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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
</head>
<body>

        <h1>Welcome to Battle Ship!</h1>
        <h2>Login</h2>		
		<form action="/" id="loginForm">
            Username: <input type="text" name="name"><br>
			Password: <input type="text" name="password"><br>
			<input type="submit">
        </form>
        <div id="result"></div>
        <script>
            $("#loginForm").submit(function(event) {
                event.preventDefault();

                var $form = $(this),
                    un = $form.find('input[name="name"]').val(),
                    pw = $form.find('input[name="password"]').val(),
                    url = $form.attr('action');
                var posting = $.post('login.php', {
                    username:un,
                    password:pw
                });

                posting.always(function(data) {
					console.log(data);
					data = JSON.parse(data);
					 $("#result").empty().text(data.message);
				})
            });
        </script>
</body></html>
<?php
    mysqli_close($link);
?>
