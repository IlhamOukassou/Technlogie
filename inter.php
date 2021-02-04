<?php session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change your interests</title>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">	
	<link rel="stylesheet" type="text/css" href="style.css">

	<style type="text/css" >
body{
			color: black;
			line-height: 30px;
			font-size: 20px;

		}

*, ::after, ::before {
    box-sizing: initial;
}

label {
    color: white;
    position: relative;
    left: -90px;
    TOP: -12PX;
    font-size: 25px;
    font-weight: bold;
	MARGIN-BOTTOM: 7PX;
}

.btn-check{
			color: beige;
		}


input:checked{
			background-color: antiquewhite;
		}
		
.submit
		{
			margin-left: 200px;
			margin-top: 80px;
			width: 100px;
			border-radius: 15px;
			height: 30px;
			border: 2px white;
			box-shadow: 1px 1px 3px white;
			color: white;
			font-family: 'Candara Light';
			font-weight: bold;
			font-size: 20px;
			background-color: white;
			color: black;
			cursor: pointer;
		}
.btn-group, .btn-group-vertical {
    position: relative;
    display: inline-block;
    vertical-align: middle;
}

.btn-primary {
    color: #3b545d;
    font-weight: 700;
    background-color: #f9f9f9;
    border-color: #f9f9f9;
	width: 240PX;
    HEIGHT: 22PX;
    MARGIN-BOTTOM: 15PX;
    MARGIN-TOP: 12PX;
    POSITION: RELATIVE;
    LEFT: 1PX;
	PADDING-RIGHT: 30PX;
	border-radius: 10PX;
}



.submit{
            width: 170px;
	margin: 17px;
	border-radius: 20px;
	height: 35px;
	background-color: rgb(85, 120, 236);
	border: 2px white;
	box-shadow: 0px 0px 7px white;
	color: #FFFFFF;
	font-family: 'Candara Light';
	font-weight: bold;
	font-size: 20px;
	margin-top: 1PX;
        }
		.conteneur{
			padding-top: 50px;
			padding-bottom: 10PX;
			height: 600px;
		}
		.erre_inter{
			position: ABSOLUTE;
    TOP: 4EM;
    MARGIN-LEFT: 69PX;
    COLOR: #ff0000;
    FONT-SIZE: 20PX;
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
	
		<img src="img/logo.png" alt="ENSAK" class="logo" width="70%">
		<div class="conteneur">
					<h2>Change your interests:</h2>
<form action="inter.php" method="POST" class="form">
  <div class="form-group">
    <label for="exampleInputEmail1">Enter your password:</label>
    <input class="input" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="password">
  </div>
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
			  		<input type="submit" name="next" value="Next" class="submit">		
		</form>
	</div>
			  <?php 
			  if (isset($_POST['next'])) {
			  $mail=$_SESSION['email'];
			include('connexion.php');
	  		$req="SELECT mot_de_passe FROM user WHERE email='$mail'";
	  		$res=mysqli_query($link,$req);
	  		if ($_POST['password']!=$res) { ?>
			<div class="erreur"> Le mot de passe ou l'email est incorrect </div>
		<?php }
		else{
			$_SESSION['interest']=$_POST['INTERSET'];
			$inter=$_SESSION['interest'];
			$a="UPDATE  user SET intersts='$inter' WHERE email='$mail'; " ;
			$t=mysqli_query($link,$a)or die ("echec update");


		}
	}
	 		?>

	
	
	</body>
</html>
