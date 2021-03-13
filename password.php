<?php   
 session_start();       
  ?>
  <?php
  if(isset($_POST['signin'])){

	$_SESSION["Fname"]=$_POST['Fname']; 
	$_SESSION["Lname"]=$_POST['Lname']; 
	$_SESSION["genre"]=$_POST['genre']; 
	unset($_SESSION["inter_re"]);
	/*******************POUR VERIFIER L'age si C'EST PLUS QUE 8ANS***********************/
	$time_limite=(time()-8*(31536000));
	$date_choisi=strtotime($_POST['date']) ;
	if($date_choisi<$time_limite){

	$_SESSION["date"]=$_POST['date']; 
	}
	else{
		$_SESSION['erre']=1;
		header('Location: signin.php');
			exit;

	}
	/***********************************************************************************/
	
  }
 else if(isset($_SESSION["inter_re"])){


 }
  else{
	  header('Location: signin.php ');
	  exit;
  }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ENSAK</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	
    <style type="text/css">

.Suivant{
   
	margin: 9px;

        }
      
     .conteneur{
		width: 440px;
	 }
	 input[type="email"]{
		position: relative;
    BOTTOM: 25PX;
	font-size: 18PX;
	 }
	 .erre_mo{
			position: ABSOLUTE;
    TOP: 4.8EM;
    MARGIN-LEFT: 82PX;
    COLOR: #ff0000;
    FONT-SIZE: 20PX;

		}

	.erre_em{

		position: ABSOLUTE;
    TOP: 4.8EM;
    MARGIN-LEFT: 119PX;
    COLOR: #ff0000;
    FONT-SIZE: 20PX;

	}

	</style>
</head>
<body>
	<img src="img/logo.png" alt="ENSAK" class="logo">
	<div class="conteneur">
	<?php 
	
	if(isset($_SESSION['erre_mo'])){
	  echo '<div class="erre_mo"> Votre Mot de passe est incorrect </div>'; 
	  
	  }
	 else if(isset($_SESSION['erre_em'])){
		echo '<div class="erre_em"> Votre email  est invalide </div>'; 
	   
		}
	 
		

	?>


	<form action="interets.php" method="POST">
        <div class="alert"></div>
        <h4 >Set a password </h4>
		   <div style="margin-top: 80PX;"> 
		 <input type="email" placeholder="Entez email" class="password" maxlength="38" <?php if(isset($_SESSION['erre_em'])||isset($_SESSION['erre_mo'])){ echo 'value="'.$_SESSION["email"].'"'; }?> name="email" required="required">  
		   <input type="password" name="pass" pattern=".{8,26}" maxlength="27" placeholder="Enter password" title="MORE THAN 8 " class="password" <?php if(isset($_SESSION['erre_em'])||isset($_SESSION['erre_mo'])){ echo 'value="'.$_SESSION["pass"].'"'; }?> required="required"> </br> </br> </br>
            <input type="password" name="Confirm_pass" pattern=".{8,26}" maxlength="27" placeholder="Confirm password" title="MORE THAN 8 " <?php if(isset($_SESSION['erre_em'])||isset($_SESSION['erre_mo'])){ echo 'value="'.$_SESSION["pass"].'"'; }?> class="password" required>
</div>

<?php 
			unset( $_SESSION['erre_mo']); 
			unset( $_SESSION["erre_em"]);
			unset($_SESSION["email"]);
			unset($_SESSION["pass"]);
	  		
	        unset($_SESSION["inter_re"]);
	 ?>
<input type="submit" name="Suivant" value="NEXT" class="Suivant">
    </form>

	
</div>
</body>
</html>