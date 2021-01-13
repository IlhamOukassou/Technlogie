<?php
	session_start();
?>
<?php 
		if (isset($_POST['Login'])) {
			include('include/connexion.php');
			$_SESSION["email"]=$_POST["email"];
			$_SESSION["password"]=$_POST["password"];
			$dat=$_POST['email'];
			$data=$_POST['password'];
			$req="SELECT email,mot_de_passe FROM `user` WHERE email='$dat'  AND mot_de_passe='$data'";
			
			$res=mysqli_query($link,$req) or die("echec");
			if (mysqli_num_rows($res)==0) {
				 ?>
					<div class="erreur"> Le mot de passe ou l'email est incorrect </div>
				<?php 
			}
			else
			{
				header("location:home.php");
			}

		

		}
	 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ENSAK</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Login.css">
	<style type="text/css">
		.erreur
{
	position: absolute;
	top: 100px;
	left: 550px;
	color: red;
	font-size: 18px;
}
	</style>
</head>
<body>
	<img src="img/logo.png" alt="ENSAK" class="logo">
	<div class="conteneur">
	
	<h4>WELCOME <span class="BACK"> BACK :</span></h4>
	
	<form method="POST" action="Login.php">
		<input type="email" name="email" placeholder="Email" class="input" required="required"> 
		<img src="img/user.png" class="img_user">
		<input type="password" name="password" placeholder="Password" class="password" required="required"> <br/>
		<img src="img/password.png" class="logo_pass">
		<span class="forgot">Forgot password ? <a href="Forgotpassword.php" class="forgot_pastraitement" >Click Here</a></span> <br/>
		<input type="submit" name="Login" value="login" class="login">
	</form>
	<form method="POST" action="Signin.html">
		<input type="submit" name="Signin" value="Sign in" class="signin">
	</form>
	
</div>
</body>
</html>
