<?php 
    session_start();
    
    if(isset($_POST['next'])){
        $_SESSION["signimg"]=1;
        /*****************VOIR SI IL A CHOISI AU MOIN UNE*******************/
        if(isset($_POST["INTERSET"])){
            
            $_SESSION["inter"]=$_POST["INTERSET"];
         
        }
        else {
            $_SESSION['erre_inter']=1;
            header('Location: interets.php ');
        exit;
        }
    }
    else if(isset($_SESSION["erre_pho"])){
        

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
  <style tpe="text/css">
 

.Suivant{
    margin:60PX;
        }
      
        .erre_pho{
            position: ABSOLUTE;
    TOP: 4.8EM;
    MARGIN-LEFT: -88PX;
    COLOR: #ff0000;
    FONT-SIZE: 20PX;
        }
		
  </style> 
</head>
<body>
	<img src="img/logo.png" alt="ENSAK" class="logo">
	<div class="conteneur">
   <?php if(isset($_SESSION['erre_pho'])){
	  echo '<div class="erre_pho"> Votre fichier n\'est pas une image ou la taille est tres grande 3Mo au max</div>'; 
	  unset($_SESSION["erre_pho"]);
      }
      ?>
	<form action="description.php" method="POST" enctype="multipart/form-data" >
        <h4 >Select a Profil Picture </h4>
    <div class="PhotoDeProfil">
        <input type="file" name="pdp" id="file" accept="image/*" > <!--pdp = photo de profil  -->
        <label for="file"><img src="img/image.jpg" alt="PhotoUser" id="photo"></label>
        <label for="file" id="UploadBtn">Upload photo</label>
    </div>
    <input type="submit" value="Next" name="nextimg" class="Suivant">
    </form>

    <?php 
			unset( $_SESSION["signimg"]); 
			
	  		
	 ?>
	
</div>
</body>
</html>
