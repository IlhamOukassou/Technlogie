<?php   
    //  include the connection file 
    include("include/connexion.php");
    // Insert post in database of the user x 
    $id_user = 2;
    if(isset($_POST['share'])){
        $Text = $_POST['TextPost'] ;
        /* insert the post's text in db with condition id_user=user */
        if($Text != ""){
          $query1 = "INSERT INTO `posts`(`post`,`id_user`)
          VALUES ('$Text',(SELECT id_user FROM user WHERE id_user=2))";
          $result = mysqli_query($link,$query1) or die(mysqli_error($link));
          if($result){
            // do something  
          }
        }else{
          echo "Empty post !";
        }
        
}
/* SHOW posts of the user x */ 
$query2 = "SELECT post , nom_utilisateur ,id_post,photo , posts.id_user FROM posts 
        JOIN user ON posts.id_user = user.id_user
        ORDER BY id_post DESC 
        
";
$result2 = mysqli_query($link,$query2);

/* select information of the user */ 
$query3 = "SELECT `nom`, `prenom`, `photo`, `description`, `nom_utilisateur` FROM `user` WHERE id_user = $id_user";
$result3 = mysqli_query($link,$query3);
$row3 = mysqli_fetch_assoc($result3);
/* like button script */ 
/* if the user click the like button */
if(isset($_POST['action'])){
  $id_post = $_POST['id_post'];
  $action = $_POST['action'];
  switch ($action) {
  	case 'like' :
         $sql="INSERT INTO rating_info (id_user, id_post, rating_action) 
         	   VALUES ($id_user, $id_post, 'like') 
              ON DUPLICATE KEY UPDATE rating_action='like'";
        
         break;
  	case 'dislike':
          $sql="INSERT INTO rating_info (id_user, id_post, rating_action) 
               VALUES ($id_user, $id_post, 'dislike') 
              ON DUPLICATE KEY UPDATE rating_action='dislike' ";
          
         break;
  	case 'unlike':
	      $sql="DELETE FROM rating_info WHERE id_user=$id_user AND id_post=$id_post";
	      break;
  	case 'undislike':
      	  $sql="DELETE FROM rating_info WHERE id_user=$id_user AND id_post=$id_post";
      break;
  	default:
  		break;
  }
  mysqli_query($link,$sql) or die(mysqli_error($link));


  echo getRating($id_post);
  exit(0);

}
// Check if user already likes post or not
// Get total number of likes for a particular post
function getLikes($id_post)
{
  global $link;
  $sql = "SELECT COUNT(*) FROM rating_info 
        WHERE id_post = $id_post AND rating_action='like'";
  $rs = mysqli_query($link, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id_post)
{
  global $link;
  $sql = "SELECT COUNT(*) FROM rating_info 
        WHERE id_post = $id_post AND rating_action='dislike'";
  $rs = mysqli_query($link, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of likes and dislikes for a particular post
function getRating($id_post)
{
  global $link;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM rating_info WHERE id_post = $id_post AND rating_action='like'";
  $dislikes_query = "SELECT COUNT(*) FROM rating_info 
            WHERE id_post = $id_post AND rating_action='dislike'";
  $likes_rs = mysqli_query($link, $likes_query);
  $dislikes_rs = mysqli_query($link, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
    'likes' => $likes[0],
    'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}

// Check if user already likes post or not
function userLiked($id_post)
{
  global $link;
  global $id_user;
  $sql = "SELECT * FROM rating_info WHERE id_user=$id_user
        AND id_post=$id_post AND rating_action='like'";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
    return true;
  }else{
    return false;
  }
}

// Check if user already dislikes post or not
function userDisliked($id_post)
{
  global $link;
  global $id_user;
  $sql = "SELECT * FROM rating_info WHERE id_user = $id_user
        AND id_post=$id_post AND rating_action='dislike'";
  $result = mysqli_query($link, $sql);  
  if (mysqli_num_rows($result) > 0) {
    return true;
  }else{
    return false;
  }
}
// users list
$query_users = "SELECT * FROM user WHERE id_user != $id_user";

$result_user = mysqli_query($link,$query_users);


// get follows
function get_follows($link,$id_user,$id_follower){
  $query_follow = "SELECT user.id_user FROM followers JOIN user on followers.id_follower = user.id_user AND followers.id_user = $id_user";
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
          $query = "INSERT INTO followers (id_user, id_follower) VALUES ($id_user,$id_user_list)";
          break;
      case "Unfollow" : 
          $query = "DELETE FROM followers WHERE id_user = $id_user AND id_follower = $id_user_list  " ;
          break;
    }
    mysqli_query($link,$query) or die("query failed");
    





}









