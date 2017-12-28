<?php session_start();?>
<!doctype html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron">
	<div class="container">

	</div>
</div>
<div class="row">
	<div class="container">
		<div class="col-md-4">
			<?php
			include_once 'lib/loginlib.php';


			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$error = array();

					$email = $password ="";
						//check if the user have entered the email address and check the validity of the email
				if(empty($_POST['email']))
				{
					$error[] ="You forgot to enter your email";

				}else{
					//$email = $_POST['email'];

					if(checkEmailFormat($_POST['email']) == FALSE)
					{
						$error[] = "You have entered an invalid email";
					}else{

						$email = $_POST['email'];
					}
				}

				if(empty($_POST['password']))
				{
					$error[] = "You forgot to enter your password";
				}else{
					$password = $_POST['password'];
				}

				if(empty($error))
				{
					login($email, $password);
				}else{
					echo 'Error check the following error';
					echo '<ul>';
						foreach ($error as $messageErr)
						{
							echo '<li>'.$messageErr.'</li>';
						}
					echo '</ul>';
				}
			}


			?>


		</div>
		<div class="col-md-8">
			<form method="POST" action="login.php">

				<div class="form-group">
					<label>Email Address:</label>
					<input type="text" name="email" class="form-control">
				</div>

				<div class="form-group">
					<label>Password:</label>
					<input type="password" name="password" class="form-control">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Continue</button>
					or <a href="index.php">Don't account? create one</a>
				</div>
			</form>
		</div>

	</div>
</div>
</body>
</html>