<?php 
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
			<div class="signup">
			<form action="aksi_login.php" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="username" placeholder="username" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button class="btn btn-primary" type="submit" name="login" value="login">Login</button>
					<p align="center">Belum punya akun?<a class="btn btn-primary" style="text-decoration:none"  href = "register.php">Register</a></p>
				</form>
			</div>
	</div>
</body>
</html>
  
</body>
</html>
