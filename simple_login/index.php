
<!doctype html>
<html>
<head>
	<title>Index page</title>
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
			<div class="col-md-3">
				<?php
				//error_reporting(0);
				include_once 'lib/lib.php';
				if(!empty($error))
				{
					echo "<h4 class='text-info'>The following error occurred</h4>";

					echo '<ul>';
					foreach ($error as $messageError)
					{
						echo "<li class='text-danger'>$messageError</li>";
					}
					echo '</ul>';
				}

				if(!$result)
				{
					//echo '<h4 class="text-danger">Error when creating account</h4>';
				}else{
					echo '<h4 class="text-success">Account successfully created</h4>';
				}

				?>


			</div>
			<div class="col-md-8">

				<fieldset>
					<legend>Create Account</legend>
					<form action="" method="POST">
						<div class="form-group">
							<label>First Name:</label>
							<input type="text" name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']?>" class="form-control">
						</div>

						<div class="form-group">
							<label>Last Name:</label>
							<input type="text" name="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']?>" class="form-control">
						</div>

						<div class="form-group">
							<label>Email Address:</label>
							<input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']?>" class="form-control">
						</div>

						<div class="formo-group">
							<label>Create Password:</label>
							<input type="password" name="create_password" class="form-control">
						</div>

						<div class="form-group">
							<label>Confrim Password:</label>
							<input type="password" name="confirm_password" class="form-control">
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-sm">Create Account</button>
							<button type="reset" class="btn btn-danger btn-sm">Reset</button>
							<a href="login.php">Or login to your account</a>
						</div>
					</form>
				</fieldset>


			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>