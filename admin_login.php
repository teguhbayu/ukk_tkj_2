<?php

session_start();
include 'koneksi.php';

if (isset($_POST['submit'])) {

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$login = mysqli_query($conn, "SELECT * FROM user WHERE password = '$password' AND username = '$username' ");

	if (mysqli_num_rows($login) == 0) {
		die("Username atau password salah!");
	} else {
		$_SESSION['admin'] = 1;
		header("Location: admin.php");
	}

}

//tambahkan atau perbaiki script diantara dibaris 7 sampai 12  
//sql code injection  di login admin bagian pasword   ' OR 1=1 -- -' 

?><!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Login</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>

	<h1 style="text-align: center">Login Admin</h1>
	<hr>

	<form action="" method="post">

		<p>Username:</p>
		<input type="text" name="username">

		<p>Password:</p>
		<input type="password" name="password">

		<br>
		<br>
		<input type="submit" name="submit" value="Login">

	</form>

</body>

</html>