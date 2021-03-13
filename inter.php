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
		</style>
</head>
<body>
	<?php include('Search.php') ?>
	<div class="conteneur">
		<h2>Change your interests:</h2>
<form action="password.php" method="POST" class="form">
  <div class="form-group">
    <label for="exampleInputEmail1">Enter your password:</label>
    <input class="input" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="password">
  </div>
 ?>



		<form method="POST" action="SigninImg.php">
			<label>Select your intrests :</label> <br>
			
			
				
			<div class="btn-group" data-toggle="buttons">
				<div class="click">
				<label class="btn btn-primary">
				  <input type="checkbox" name="INTERSET[]" value="mat" autocomplete="off"> Maths
				</label>
			</div>
			<div class="click">
				<label class="btn btn-primary">
				  <input type="checkbox" name="INTERSET[]" value="spo" autocomplete="off" > Sports
				</label>
			</div>
			<div class="click">
				<label class="btn btn-primary">
				  <input type="checkbox" name="INTERSET[]" value="art" autocomplete="off"> Art
				</label>
			</div>

			<div class="click">
				<label class="btn btn-primary">
				  <input type="checkbox" name="INTERSET[]" value="pc" autocomplete="off"> physique
				</label>
			</div>


			<div class="click" >
				<label class="btn btn-primary">
				  <input type="checkbox" name="INTERSET[]" value="cs" autocomplete="off">   Computer science 
				</label>
			</div>


			

			  </div>
  <div class="form-group form-check">
  </div>
  <button type="submit" class="btn btn-primary" name="button">Submit</button>
</form>
</div>

</body>
</html>