<?php 

		

	include 'config.php';
	include 'classes/user.php';

	if (isset($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$user = new User($conn);
		$user->checkLogin($email, $password);
		$errors = $user->errors;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>WIND CUTE</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value=" <?php if (isset($email)) { echo htmlspecialchars($email); } ?> " required>
				<p class="error"><?php if(isset($errors['login_email'])) {echo htmlspecialchars($errors['login_email']);} ?></p>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
				<p class="error"> <?php  if(isset($errors['login_password'])) { echo htmlspecialchars($errors['login_password']);} ?> </p>
			</div>
			<div class="input-group">
				<button type="submit" name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>


