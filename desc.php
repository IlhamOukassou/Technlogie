<?php session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change your description</title>
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
		<h2>Change your description:</h2>
<form action="desc.php" method="POST" class="form">
  <div class="form-group">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Enter your description:</label>
    <textarea onkeyup="textCounter(this,'counter',160);" required="required" autocapitalize="word" autocomplete="on" autocorrect="on" maxlength="160" name="description" spellcheck="true" dir="auto" class="form-control" id="exampleFormControlTextarea1" minlength="20"  rows="3" value="description" >
</textarea>
<script>
function textCounter(field,field2,maxlimit)
{
 var countfield = document.getElementById(field2);
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}
</script>
            


  </div>
  <div class="form-group form-check">
  </div>
  <button type="submit" class="btn btn-primary" name="button">Submit</button>
</form>
</div>
<?php
	
		$des=$_POST['description'];
		include('connexion.php');
		$mail=$_SESSION['email'];
		$req="SELECT mot_de_passe FROM user WHERE email='$mail'";
		$res=mysqli_query($link,$req)or die ("echec select");
		if ($_POST['password']!=$res) { ?>
			<div class="erreur"> Le mot de passe ou l'email est incorrect </div>
		<?php 
			$a="UPDATE user SET description='$des' WHERE email='$mail'; " ;
			$t=mysqli_query($link,$a)or die ("echec update");


		}
	
?>
</body>
</html>