<?php session_start();
 
    include("profile_include/profile.include.php");
	include('connexion.php');
	$id=$_SESSION['id_user'];
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="Login.php">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <script src="https://kit.fontawesome.com/7112e55585.js" crossorigin="anonymous"></script>


</head>
<style type="text/css">
	.post
	{
		display: inline-block;
		margin-left: 300px;
		border:2px grey solid;
		margin-top: 20px;
		width: 500px;

		text-align: center;
	}
	.nom
	{
		margin-left: 300px;
	}
	b
	{
		font-weight: bold;
		color: #1E91D6;
	}
	.abon
	{
		position: relative;
		left: 1000px;
		top: -400px;
		border: 1px grey solid;
		display: inline-block;
		width: 170px;
		height: 100px;
		text-align: center;
	}
	.iamg
	{
		display: inline-block;
		position: relative;
		left: -15px;
		top: -5px;
		
	}
	.abonner
	{
		background-color: #6ec6c6ff;
		border:none;
		margin-bottom: 15px;
		margin-top: 15px;
		position: relative;
		
	}
	.share
	{
		position: relative;
		right: -600px;
	}
	.col-md-3
	{
		float: right;
		position: relative;
		top: -400px;
		text-align: center;
	}
	.up 
	{
		border:none;
		margin-left: 50px;
		background-color: #6EC6C6;
		height: 30px;
	}
	.down
	{
		border:none;
		margin-left: 50px;
		background-color: #09BC8A;
		color: white;
		height: 30px;
	}
	.card-footer
	{
		display: inline-block;
		margin-left: 300px;
		
		margin-top: 20px;
		width: 500px;
	}
</style>
<body>
	
	<div>
		<?php 
		include('Search.php');
	$req="SELECT id_follower FROM followers WHERE id_user='$id'"; //Selectionner les abonnees de l'utilisateur
	$res=mysqli_query($link,$req)or die('echec followers');
	while ($v=mysqli_fetch_assoc($res)) {
		
		$fo=$v['id_follower'];
		$p= "SELECT id_post,post FROM posts WHERE id_user='$fo' ORDER BY date_post DESC LIMIT 4"; //Selectionner les postes de chaque follow
		$h=mysqli_query($link,$p)or die ('echec post');
		
		while ($po=mysqli_fetch_assoc($h)) { 
			$pot=$po['post'];
			$ih=$po['id_post'];
			$nom="SELECT nom,prenom FROM `user` WHERE id_user=$fo";
		$util=mysqli_query($link,$nom);
			while ($utilisateur=mysqli_fetch_assoc($util)) { ?>
				<div class="nom"> Posted by <?php echo "<b>".$utilisateur['prenom'].$utilisateur['nom']."</b>"; ?></div>  <?php
			}
			
			?>
			<span class="post"><?php echo $pot; ?> <br></span>
			<div Class="card-footer">
                                                        <i <?php if (userLiked($ih)): ?>
                                                            class="fa fa-thumbs-up like-btn"
                                                        <?php else: ?>
                                                            class="fa fa-thumbs-o-up like-btn"
                                                        <?php endif ?>
                                                            data-id="<?php echo $ih; ?>"
                                                        ></i> Like
                                                         <span class="likes"><?php echo getLikes($ih); ?></span>

                                                        <i <?php if (userDisliked($ih)): ?>
                                                            class="fa fa-thumbs-down dislike-btn"
                                                        <?php else: ?>
                                                            class="fa fa-thumbs-o-down dislike-btn"
                                                        <?php endif ?>
                                                        data-id="<?php echo $ih;?>"
                                                        ></i> Dislike
                                                        <span class="dislikes"><?php echo getDislikes($ih); ?></span>
                        
                        <a href="post.php" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                        
                    </div>
			<form method="post" action="home.php">
				<input type="submit" name="Share" class="share" value="Share">
			</form> <?php
				if (isset($_POST['Share'])) {
				$_SESSION['post']=$pot;
			}
		}
	}
	echo $_SESSION['post'];
	$requete="SELECT id_user FROM followers WHERE id_follow='$id'";
	$resultat=mysqli_query($link,$requete)or die ('ft');
	while ($value=mysqli_fetch_assoc($resultat)) {
		$f=$value['id_user'];
	$m= "SELECT id_post,post FROM posts WHERE id_user='$f' ORDER BY date_post DESC LIMIT 4";
	$n=mysqli_query($link,$m);
	while ($b=mysqli_fetch_assoc($n)) { 
			$t=$b['post'];
			$rw=$b['id_post'];
			$nom="SELECT nom,prenom FROM `user` WHERE id_user=$f";
			$util=mysqli_query($link,$nom);
			while ($utilisateur=mysqli_fetch_assoc($util)) { ?>
				<div class="nom"> Posted by <?php echo "<b>".$utilisateur['prenom']." ".$utilisateur['nom']."</b>"; ?></div>  <?php
			}
			
			?>

			<span class="post"><?php echo $t; ?> <br></span>
				<div Class="card-footer">
                                                        <i <?php if (userLiked($rw)): ?>
                                                            class="fa fa-thumbs-up like-btn"
                                                        <?php else: ?>
                                                            class="fa fa-thumbs-o-up like-btn"
                                                        <?php endif ?>
                                                            data-id="<?php echo $rw; ?>"
                                                        ></i> Like
                                                         <span class="likes"><?php echo getLikes($rw); ?></span>

                                                        <i <?php if (userDisliked($rw)): ?>
                                                            class="fa fa-thumbs-down dislike-btn"
                                                        <?php else: ?>
                                                            class="fa fa-thumbs-o-down dislike-btn"
                                                        <?php endif ?>
                                                        data-id="<?php echo $rw;?>"
                                                        ></i> Dislike
                                                        <span class="dislikes"><?php echo getDislikes($rw); ?></span>
                        
                        <a href="post.php" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                        
                    </div>
			  <?php
		
		}
	}
	
	
	
	$query_users = "SELECT user2.nom,user2.prenom,user2.photo,user2.id_user FROM user AS user1, user AS user2 WHERE user1.intersts=user2.intersts AND user1.id_user='$id' AND user2.id_user<>'$id'";
$result_user = mysqli_query($link,$query_users);


// get follows
function get_follows($link,$id,$id_follower){
  $query_follow = "SELECT user.id_user FROM followers JOIN user on followers.id_follower = user.id_user AND followers.id_user = $id";
  $result_follow = mysqli_query($link,$query_follow);
  $following = array();
  $i =0;
  while($row_follower = mysqli_fetch_assoc($result_follow)){
    $following[$i] = $row_follower["id_user"];
    $i++;
  }
  if(in_array($id_follower,$following)){
    return true;
  }else{
    return false;
  }
}


if(isset($_POST['act'])){
    $act = $_POST['act'];
    $id_user_list =  $_POST['id_user'];
    switch($act){
      case "follow" : 
          $query = "INSERT INTO followers (id_user, id_follower) VALUES ($id,$id_user_list)";
          break;
      case "Unfollow" : 
          $query = "DELETE FROM followers WHERE id_user = $id AND id_follower = $id_user_list  " ;
          break;
    }
    mysqli_query($link,$query) or die("query failed");
    





}?>
	<div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                       <div class="users">
                       <?php   if(mysqli_num_rows($result_user)>0){
                        while($row = mysqli_fetch_assoc($result_user) ){
                                ?> 

                         <div class="row" >
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="<?php echo $row['photo'] ;?>" alt="">
                                </div>
                                <div class ="col-md-8"> <h6> <?php echo $row['prenom'].$row['nom']; ?> </h6> </div>
                                <?php ?>
                                <div class="col-md-4">
                                <input type="submit" formmethod="post" name="follow" 
                                    <?php if(get_follows($link,$id_user,$row['id_user'])==true) :?>
                                        class="down follow"  value ="following" 
                                    <?php else :   ?>
                                        class="up follow"   value ="follow"
                                    <?php endif ?>
                                    data-content="<?php echo $row['id_user']?>"
                                    >
                                
                                </div>
                            </div> <br> <br>
                            
                            
                            <?php 
                                            }
                                    }
                            ?>

                           
                             
                       </div>
                    </div>
                    
                </div>
            </div>
    <script src="script.js"></script>
	

</body>
</html>