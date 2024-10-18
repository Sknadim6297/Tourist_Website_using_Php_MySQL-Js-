<?php
include('includes/config.php');

if (isset($_POST['login'])) {
	$uname = $_POST['username'];
	$password = md5($_POST['password']);


	$sql = "SELECT UserName, Password FROM admin WHERE UserName='$uname' AND Password='$password'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo "<script>alert('Login Successful');</script>";

		echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
	} else {

		echo "<script>alert('Invalid Details');</script>";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="css/style.css">
</head>

<body class="flex items-center justify-center">
	<div class="w-96 p-8 bg-gray-100 shadow-lg rounded-lg">
		<h2 class="text-center text-xl font-bold text-gray-700 mb-6">Admin Login</h2>
		<form action="" method="POST">
			<div class="mb-4">
				<label class="block text-gray-700 mb-2" for="username">
					<i class="fas fa-user mr-2"></i>
					Username
				</label>
				<input
					name="username"
					type="text"
					class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-400"
					placeholder="Dan Edwards" />
			</div>
			<div class="mb-6">
				<label class="block text-gray-700 mb-2" for="password">
					<i class="fas fa-lock mr-2"></i>
					Password
				</label>
				<input
					name="password"
					type="password"
					class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-400"
					placeholder="********" />
			</div>
			<button class="w-full bg-gray-700 text-white py-2 rounded hover:bg-gray-800" name="login">
				Login
			</button>
	</div>
	</form>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>