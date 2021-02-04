<?php session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change your picture</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
	.conteneur
	{

		margin-top: 40px;
		height: 500px;
	}
	#photo
	{
		position: relative;
		left: -1px;
		top: -9px;
	}
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
	<form action="picture.php" method="POST" enctype="multipart/form-data" >
        <h3>Change your Profil Picture </h4>
        	<div class="form-group">
    <label for="exampleInputEmail1">Enter your password:</label>
    <input class="input" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="password">
  </div>
    <div class="PhotoDeProfil">
        <img src="img/image.jpg" alt="PhotoUser" id="photo">
        <input type="file" name="pdp" id="file" accept="image/*" required="required"> <!--pdp = photo de profil  -->
        <label for="file" id="UploadBtn">Upload photo</label>
    </div>
    <input type="submit" value="Submit" name="button" id="NextForPhoto">
    </form>
<?php
	
	if(isset($_POST['button'])){
		include('connexion.php');
		$mail=$_SESSION['email'];
		$req="SELECT mot_de_passe FROM user WHERE email='$mail' ";
		$res=mysqli_query($link,$req)or die ("echec select");
		if ($_POST['password']!=$res) { ?>
			<div class="erreur"> Le mot de passe  est incorrect </div>
		<?php
	//ON VOIS SI IL A CHOISI UN FICHIER ET QUE ON A PAS D ERREUR  
	if(isset($_FILES['pdp']) and $_FILES['pdp']['error']==0)
	{
		$dossier= 'img/';
        $temp_name=$_FILES['pdp']['tmp_name'];
        //VOIR SI LE FICHIR EST UPLODER 
		if(!is_uploaded_file($temp_name))
		{
            $_SESSION['erre_pho']=1;
            echo " Upload failed";
        }
         //VOIR SI LE FICHIR  UPLODER A UNE TAILLE NORMALE  1MO     
		if ($_FILES['pdp']['size'] >= 3000000){
            $_SESSION['erre_pho']=1;
            echo "Your picture is over size";
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
            echo "Your picture should have onother extension ";
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
	
    $_SESSION['ph_name']=$ph_name;
	$red="UPDATE user SET photo='$ph_name' WHERE email=$mail";
	$result=mysqli_query($link,$red)or die ("echec update");
}
}


?>
</body>
</html>