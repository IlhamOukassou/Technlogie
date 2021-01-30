<?php
session_start();


//ON VOIS SI IL VIENT DE LA PAGE PHOTO
if(isset($_POST['nextimg'])){
	
	//ON VOIS SI IL A CHOISI UN FICHIER ET QUE ON A PAS D ERREUR  
	if(isset($_FILES['pdp']) and $_FILES['pdp']['error']==0)
	{
		$dossier= 'img/';
        $temp_name=$_FILES['pdp']['tmp_name'];
        //VOIR SI LE FICHIR EST UPLODER 
		if(!is_uploaded_file($temp_name))
		{
            $_SESSION['erre_pho']=1;
            

            header('Location: SigninImg.php ');
                exit;
        }
         //VOIR SI LE FICHIR  UPLODER A UNE TAILLE NORMALE  1MO     
		if ($_FILES['pdp']['size'] >= 3000000){
            $_SESSION['erre_pho']=1;
            

        header('Location: SigninImg.php ');
            exit;
        }
        //VERIFIER SI L EXTENTION EST PERMITS OU PAS
        $infosfichier = pathinfo($_FILES['pdp']['name']);
        
		$extension_upload = $infosfichier['extension'];
		
		$extension_upload = strtolower($extension_upload);
		$extensions_autorisees = array('png','jpeg','jpg');
		if (!in_array($extension_upload, $extensions_autorisees))
		{
            $_SESSION['erre_pho']=1;
            header('Location: SigninImg.php ');
            exit();
		}
        $nom_photo= $_SESSION['Lname'].strtotime($_SESSION["date"]).".".$extension_upload;
        
        // ON VOIS SI LE CHANGEMENT D EMPLACEMENT A BIEN PASSER
		if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
            $_SESSION['erre_pho']=1;
            
            header('Location: SigninImg.php ');
        }
        
        $ph_name=$nom_photo;
    }
    
    //SI IL N A PAS CHOISI UN FICHIER
	else{
		$ph_name="image.jpg";
	}
    //LE NOM FINAL A STOKER DANS LA BD
    $_SESSION['ph_name']=$ph_name;
	
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">	

    <link rel="stylesheet" type="text/css" href="style.css">

    <style type="text/css" >
		.form-group{
            border: solid #f5e5e5  1px;
            border-radius: 10px;
            background-color:#ffffff ;
            padding: 5px;
           
        }

       .conteneur{
           height: 470px;
           padding-top: 55px;
           width: 470px;
       }

        .biographie{
            color: rgb(85, 120, 236);
            margin-top: 10px;
            font-weight: 700;
            POSITION: RELATIVE;
            RIGHT: 6.4EM;
        }
        .form-control{
            border: 0.1px solid #f7efefc9;
            background-color:#fffffff1 ;

            height: 158PX;
            resize: none;
            overflow: auto;
            font-weight: 700;
            margin-top: 15px;
            margin-bottom: 40px;
            
        }
        
        .Suivant{
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
     cursor: pointer;
        }
      
        .Suivant:hover{
            background-color: rgb(105, 132, 221);
        }
     
        .describe{
           margin-bottom: 25px;
            font-size: 20px;
            
        }
        .p1{
            font-weight: 900;
            color: rgb(250, 250, 250);
            FONT-FAMILY: POLICE1;
    LETTER-SPACING: 1PX;
    FONT-SIZE: 30PX;
    MARGIN-BOTTOM: 27PX;
        }
        p{
            color: rgb(255 ,255, 252);
        }
        #counter{
            position: relative;
            left: 6.6em;
     font-family: system-ui;
    background: white;
    border: 0.1px solid #f7efefc9;
    color: #5a80ee;
    padding-left: 30PX;
    font-weight: 600;
}
    
        
    </style>
    
</head>
<body>
	<img src="img/logo.png" alt="ENSAK" class="logo">
	<div class="conteneur">
	
        <div class="describe">
            <p class="p1">Describe Yoursel<span style=" POSITION: RELATIVE; BOTTOM: 2PX; MARGIN-LEFT: 0.04EM;">f</span></p>
                <p>What makes you special . Express yourself:</p>
        </div>
	
	<form method="POST" action="inser.php">

        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="biographie">Votre biographie</label>
            <input disabled   maxlength="3" size="3" value="160" id="counter">
<textarea onkeyup="textCounter(this,'counter',160);" required="required" autocapitalize="word" autocomplete="on" autocorrect="on" maxlength="160" name="description" spellcheck="true" dir="auto" class="form-control" id="exampleFormControlTextarea1" minlength="20"  rows="3" >
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

		<input type="submit" name="Suivant" value="NEXT" class="Suivant">
	</form>
	


</body>
</html>

