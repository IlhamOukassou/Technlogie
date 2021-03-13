<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  position: relative;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #6EC6C6;
  height: 60px;
}
.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}
.img
{
  position: relative;
  left:150px;
  top: -8px;
}
.img:hover
{
  background-color: #6EC6C6;
}
</style>
</head>
<body>

<div class="topnav">
   <img src="img/logo.png" width="200px" class="img">
  <div class="search-container">
    <form action="Search.php" method="POST">
      <input type="text" placeholder="Search a profil.." name="search">
      <button type="submit" name="chercher"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<?php include('menu.html') ?>
<?php
if(isset($_POST['chercher']))
  {
    $search=$_POST['search'];
    include('connexion.php');
    $req="SELECT * FROM `user` WHERE nom='$search' OR prenom='$search'";
    $res=mysqli_query($link,$req) or die("echec");
    if (mysqli_num_rows($res)==0) {
      echo "n'existe pas";
    }
    else{
      echo "existe";
    }
  }
?>
</body>
</html>