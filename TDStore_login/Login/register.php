<?php 

	include 'config.php';
	include 'classes/user.php';

	if (isset($_POST['submit'])) {
		$name = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$re_password = $_POST['re_password'];
		$user = new User($conn);
		$user->checkRegistration($name, $email, $password, $re_password);
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
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php if (isset($name)) { echo htmlspecialchars($name); } ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php if (isset($email)) { echo htmlspecialchars($email); } ?>" required>
				<p class="error"><?php if(isset($errors['create_email1'])) {echo htmlspecialchars($errors['create_email1']);} ?></p>
				<p class="error"><?php if(isset($errors['create_email2'])) {echo htmlspecialchars($errors['create_email2']);} ?></p>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
				<p class="error"><?php if(isset($errors['create_password'])) {echo htmlspecialchars($errors['create_password']);} ?></p>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="re_password" required>
			</div>
			<div class="input-group">
				<button type="submit" name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>
