<?php   
 session_start();       
  ?>
  
<!DOCTYPE html>
<html>
<head>
	<title>Sign in</title>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<style type="text/css">


		body
		{
			line-height: 30px;
			font-weight: 700;
		}
		.conteneur
		{
			height: 500px;
			width: 500px;
		}
		
		.radio
		{
			position: relative;
			left: -48px;
			display: inline-block;
		}
		.rad
		{
			position: relative;
			left: 55PX;
			
			display: inline-block;
		}
		.h4
		{
			font-size: 25px;
			position: relative;
			left: -150px;
			margin-bottom: 19PX;
			
		}
		.hh4
		{
			margin-top: 11px;
			font-size: 25px;
			position: relative;
			left: -155px;
		}
		.day 
		{
			width: 50px;
			border: 3px #fcfcff solid;
			border-radius: 15px;

		}
		.month
		{
			width: 57px;
			border: 3px #fcfcff solid;
			border-radius: 15px;
			text-align: center;
		}
		.year
		{
			text-align: center;
			width: 100px;
			border: 3px #fcfcff solid;
			border-radius: 15px;
		}

	 
		.date{
			margin: auto;	
			margin-bottom: 10px;
    		height: 40px;
    		border: 3px #fcfcff solid;
    		border-radius: 15px;
    		width: 400px;
    		text-align: center;
			font-size: 18px;
			padding-left: 60PX;
			PADDING-RIGHT: 2PX;
		}
		.gen{
			font-size: 20px;
			vertical-align: middle;
			color: rgb(255, 255, 255);
		}
		.form-check-input{vertical-align: middle;}
		input{
			FONT-WEIGHT: 700;
		}
		.Suivant{
			margin: 29PX;
		}
		.morw{
			margin-left: 10PX;
		}
		.erreur{
			position: ABSOLUTE;
    		TOP: 4EM;
    		MARGIN-LEFT: 134PX;
    		COLOR: #ff0000;
    		FONT-SIZE: 20PX;

		}
	</style>
</head>
<body>
	<img src="img/logo.png" alt="ENSAK" class="logo">
	<div class="conteneur">
	<?php 
	
	if(isset($_SESSION['erre'])){
	  echo '<div class="erreur"> votre date  est incorrect </div>'; 
	 
	
	
      }
	?>
	
	
	
	
	<h4>SIGN IN :</h4>
	
	<form method="POST" action="password.php">
		<input type="text" name="Fname" placeholder="First name" <?php if(isset($_SESSION['erre'])){ echo 'value="'.$_SESSION["Fname"].'"'; }?> class="input" pattern="[A-Za-z]{3,15}" required="required"  title="BETWEEN 3 TO 15 CHAR NO SPECIAL CHAR"> 
		
<input type="text" name="Lname" placeholder="Last-name" <?php if(isset($_SESSION['erre'])){ echo 'value="'.$_SESSION["Lname"].'"'; }?> class="password" pattern="[A-Za-z]{3,15}" required="required" title="BETWEEN 3 TO 15 CHAR NO SPECIAL CHAR"> <br/>
		<h3 class="h4">Birth day :</h3> 
		<input type="date" class="date" name="date"  title="YOU SHOULD HAVE MORE THAN 8 YEARS OLD" required="required">
	



		<h3 class="hh4">Genre :</h3> 
		<div class="morw">
		 <div class="radio"><input type="radio" name="genre" class="form-check-input" value="man" checked="checked"> <span class="gen"> Man</span>  </div>
		<div class="rad"><input type="radio" name="genre" value="wom"  class="form-check-input"> <span class="gen"> Woman</span>  </div>
	</div>
	  <?php unset( $_SESSION['erre']); 
	  		unset( $_SESSION["Lname"]);
	  		unset( $_SESSION["Fname"]);
	 
	 ?>
		<input type="submit" name="signin" value="Next" class="Suivant">
	</form>
</div>
</body>
</html>