<?php 
    session_start();
    $_SESSION['message']="";
    if(isset($_POST['NextPass'])){
        if($_POST['pass']==$_POST['Confirm_pass']){
            $_SESSION['password']=$_POST['pass'];
            ?>
            <script> window.location = "SigninImg.php"; </script>
            <?php
        }
        
    }
    


?>
<!DOCTYPE html>
<html>
<head>
	<title>ENSAK</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<img src="img/logo.png" alt="ENSAK" class="logo">
	<div class="conteneur">
	<form action="SignImg.inc.php" method="POST" enctype="multipart/form-data" >
        <h4 >Select a Profil Picture </h4>
    <div class="PhotoDeProfil">
        <img src="img/image.jpg" alt="PhotoUser" id="photo">
        <input type="file" name="pdp" id="file" accept="image/*" required> <!--pdp = photo de profil  -->
        <label for="file" id="UploadBtn">Upload photo</label>
    </div>
    <input type="submit" value="Next" name="nextimg" id="NextForPhoto">
    </form>

	
</div>
</body>
</html>
