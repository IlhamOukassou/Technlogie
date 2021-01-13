<?php 
    //include("SignImg.inc.php");
    session_start();
    include("include/connexion.php");
    $_SESSION['MsgForImg']="";
    if(isset($_POST['nextimg'])){
        $img_path = mysqli_real_escape_string($link,'ImageProfil/'.$_FILES['pdp']['name']);
        
        //verfie que type est image
        if(preg_match("!image!",$_FILES['pdp']['type'])){
            //copier l'image dans le dossier ImageProfil
            if(copy($_FILES['pdp']['tmp_name'],$img_path)){
               

                $query = "INSERT INTO `user`(
                                            `mot_de_passe`,
                                            `photo`
                                            ) VALUES (
                                            ".$_SESSION['password'].",
                                            '$img_path'
                                            
                                            )";
                
                $result = mysqli_query($link,$query) or die("query failed");
                if($result){
                    $_SESSION['MsgForImg']="Image uploaded click next";
                   
                }


            }else{
                $_SESSION['MsgForImg']="File upload failed";
            }
        }else{
            $_SESSION['MsgForImg']="Image must be JPG ,PNG or GIF";
        }
    }


   

?>