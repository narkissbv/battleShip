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
		<form action="/" data-type="login" id="loginForm">
            Username: <input class="field" type="text" name="name"><br>
			Password: <input class="field" type="password" name="password"><br>
			<div class="insert" style="display:none;">Email: <input class="field" type="email" name="email"></div><br>
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
				if(type == 'forgotPw'){
                    var email = $form.find('input[name="email"]').val();
					dataToSend.email = email;
					dataToSend.name = un;
				}else{
					dataToSend.username = un;
				}
				var postingUrl = (type == 'login')? 'login.php':'insert.php';
                var posting = $.post(postingUrl, dataToSend);

                posting.always(function(data) {
					console.log(data);
					data = JSON.parse(data);
					 $("#result").empty().text(data.message);
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
						.text('Back');
					$('.insert').hide();
					pageTitle = 'Login';
					formType = 'ForgotPw';
					
				}else{
					$(this).attr('data-type','backToLogin').text('Forgot password');
					$('.insert').show();
				}
				//set new form and button type
				$('#loginForm').attr('data-type',type);
				$('h2').text(pageTitle);
				
			})
			
        </script>
</body></html>
<?php
    mysqli_close($link);
?>
