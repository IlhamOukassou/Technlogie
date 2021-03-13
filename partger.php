<?php session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Share</title>
	<link rel="stylesheet" type="text/css" href="Login.php">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		.body
		{
			background-color: white;
			margin-left: 300px;
		}
		.post
		{
			border:2px grey solid;
			width: 500px;
			text-align: center;
		}
		.user
		{
			color: #1E91D6;
			font-weight: bold;
		}
		.time
		{
			font-size: 12px;
		}
	</style>
</head>
<?php include('Search.php'); ?>
<body >
	<?php $time=time();?>
	<div class="body">
		<?php
		if (isset($_POST['Share'])) {
		
		$post=$_SESSION['post'];
		
		$id=$_SESSION['id_user'];
		include ('connexion.php');
		$nom="SELECT nom,prenom FROM user WHERE id_user='$id'";
		$prenom=mysqli_query($link,$nom);
		while ($p=mysqli_fetch_assoc($prenom)) {
			$nm=$p['nom'];
			$pr=$p['prenom'];
		}
		$req="INSERT INTO posts(post,id_user)VALUES ($post,$id)";
		$rs=mysqli_query($link,$req);
		$rt="SELECT id_post FROM `posts` WHERE 1";
		$st=mysqli_query($link,$rt)or die ("echec id");
		$i=0;
		while ($il=mysqli_fetch_assoc($st)) {
			$i++;
		}
		$t="SELECT date_post FROM posts WHERE id_post=$i";
		$y=mysqli_query($link,$t);
		while ($p=mysqli_fetch_assoc($y)) {
			$time=$p['date_post'];
		}
	?>
		<div ><span class="user"><?php echo $pr.$nm; ?></span> shared a post </div>
		<div class="time"><?php echo $time; ?></div>

		<div class="post">
		 <?php echo $post;  } ?>
		</div>
	</div>
	
</body>
</html>