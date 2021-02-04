<?php session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change your name</title>
	<link rel="stylesheet" type="text/css" href="Login.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		*
		{
			text-align: center;
		}
		.form
		{
			margin-top: 40px;
			font-size: 18px;
		}
		.input
		{
			border-radius: 15px;
			width: 400px;
		}
		#exampleInputEmail1
		{
			width: 300px;
			margin-left: 30px;
		}
		#exampleInputPassword1
		{
			width: 300px;
			margin-left: 30px;
		}
		.erreur
{
	position: absolute;
	top: 100px;
	left: 550px;
	color: red;
	font-size: 18px;
}
.conteneur
{
	height: 500px;
}
		</style>
</head>
<body>
	<?php include('Search.php') ?>
	<div class="conteneur">
		<h2>Change your name:</h2>
<form action="name.php" method="POST" class="form">
  <div class="form-group">
    <label for="exampleInputEmail1">Enter your password:</label>
    <input class="input" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Enter your new first name:</label>
    <input class="input"  type="text" class="form-control" id="exampleInputPassword1" name="prenom" >
     <label for="exampleInputPassword1">Enter your new last name:</label>
    <input class="input"  type="text" class="form-control" id="exampleInputPassword1" name="nom" >
  </div>
  <div class="form-group form-check">
  </div>
  <button type="submit" class="btn btn-primary" name="button">Submit</button>
</form>
</div>
<?php
	if (isset($_POST['button'])) {
		include('connexion.php');
		$mail=$_SESSION['email'];
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$req="SELECT mot_de_passe FROM user WHERE email='$mail' AND nom='$nom'";
		$res=mysqli_query($link,$req)or die ("echec select");
		if ($_POST['password']!=$res) { ?>
			<div class="erreur"> Le mot de passe ou l'email est incorrect </div>
		<?php }
		else{
			$a="UPDATE user SET nom='$nom',prenom='$prenom' WHERE mot_de_passe='$password' AND email='$mail' " ;
			$t=mysqli_query($link,$a)or die ("echec update");


		}
	}
?>
</body>
</html>