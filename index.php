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
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<link rel="stylesheet" href="battleShip.css" />
</head>
<body>

        <h1>Welcome to Battle Ship!</h1>
        <h2>Login</h2>		
		<form action="/" data-type="login" id="loginForm">
            Username: <input class="field" type="text" name="name"><br>
			Password: <input class="field" type="password" name="password"><br>
			<div class="insert">Email: <input class="field" type="email" name="email"></div><br>
			<input type="submit">
        </form>
        <div id="actionBtn" data-type="forgotPw" style="text-decoration:underline;cursor:pointer">forgot password</div>
		
        <div id="result"></div>
        <script>
			
            $("#loginForm").submit(function(event) {
			
                event.preventDefault();
				var type = $(this).attr('data-type');
                var $form = $(this),
                    un = $form.find('input[name="name"]').val(),
                    pw = $form.find('input[name="password"]').val(),
                    url = $form.attr('action');
				var dataToSend = {
                    password:pw
                }
				var email = $form.find('input[name="email"]').val();	
				if(type == 'forgotPw'){
					dataToSend.email = email;
					dataToSend.name = un;
				} else if(type == 'insert'){
					dataToSend.email = email;
					dataToSend.name = un;
				}else{
					dataToSend.username = un;
				}
				var postingUrl = (type == 'login')? 'login.php':'insert.php';
                var posting = $.post(postingUrl, dataToSend);

                posting.always(function(dataToSend) {
					console.log(dataToSend);
					window.location.replace("main.php");
					//session destroy
					//hello session
					//redirect index php --> check if session alive and print hello "session" + logout(redirect to index.php). new page /games
					//dataToSend = JSON.parse(dataToSend.responseText);
					// $("#result").empty().text(dataToSend.message);
				})
            });
            $("#actionBtn").on('click',function(event) {
				//clear form
				$('.field').val('');
				$("#result").empty();
				
				//get new params for page
				var type = $(this).attr('data-type');
				var pageTitle = 'Forgot Password';
				var formType = 'backToLogin';
				if(type == 'backToLogin'){
					$(this).attr('data-type','forgotPw')
						.text('Register');
					$('.insert').hide();
					pageTitle = 'Login';
					formType = 'ForgotPw';
					
				}else{
					$(this).attr('data-type','backToLogin').text('Back');
					$('.insert').show();
				}
				//set new form and button type
				$('#loginForm').attr('data-type',type);
				$('h2').text(pageTitle);
				
			})
			$('#logout').on('click',function(){
				window.location.replace("/index.php");
				
			})
			$(document).ready(function(){
				var name = "<?=  isset($_SESSION['name']) ? $_SESSION['name'] : false  ?>";
				if(name){
					window.location.replace("main.php");
					$('#logout').text('logout')
				}
			})
        </script>
</body></html>
<?php
    mysqli_close($link);
?>
