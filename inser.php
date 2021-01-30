<?php
session_start();

if(isset($_POST['Suivant'])){
    
        $_SESSION["description"]=$_POST['description'];    

}

else{
    header('Location: signin.php ');
    exit;
}








?>

<?php
    include("include/connexion.php");
    $Lname=$_SESSION['Lname'];
    $Fname=$_SESSION['Fname'];
    $date=$_SESSION['date'];
    $pass=$_SESSION['pass'];
    $phot_name=$_SESSION['ph_name'];
    $desc=trim($_SESSION['description']);
    $email=$_SESSION['email'];
    $inter=implode ("-", $_SESSION['inter']) ;
    $genre=$_SESSION["genre"];
    
    




    $reque="INSERT INTO `user`(`nom`, `prenom`, `date_de_naissance`, `mot_de_passe`, `photo`, `description`, `email`, `intersts`, `genre`) VALUES ('$Lname','$Fname','$date','$pass','$phot_name','$desc','$email','$inter','$genre')";
    $result = mysqli_query($link,$reque) or die("query failed");

?>