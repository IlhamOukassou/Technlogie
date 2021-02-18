<?php 
    session_start();
    include("profile_include/profile.inc.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/7112e55585.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="profil2.css">
    <title>Profil page</title>
</head>
<body>
    
        
<nav class="navbar navbar-light bg-white">
        <a href="#" class="navbar-brand"><img src="img/loogo.png" alt="" class="brand"></a>
        <form class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="button-addon2">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </nav>


    <div class="container-fluid gedf-wrapper">
        <div class="row">
             <!-- Sidebar -->
            <nav id="sidebar">
              
            

                <ul class="list-unstyled components">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Notifications</a>
                    </li>
                    <li>
                        <a href="#" >Profile </a>
                    </li>
                    <li>
                        <a href="#">Setting</a>
                    </li>
                    <li>
                        <a href="#">Deconnexion</a>
                    </li>
                    <li>
                        <a href="#">About us</a>
                    </li>
                </ul>
            </nav>

            <div class="col-md-6 gedf-main">

                <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <form action="" method="post">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make
                                        a publication</a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                    <div class="form-group">
                                        <label class="sr-only" for="message">post</label>
                                        <textarea name="TextPost" class="form-control" id="message" rows="3" placeholder="What are you thinking?"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-toolbar justify-content-between">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary" name="share">share</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Post /////-->
<br>
                <!--- \\\\\\\Post-->
                <?php 
                    if(mysqli_num_rows($result2)>0){
                        while($row = mysqli_fetch_assoc($result2)){
                            if($row['id_user']== 2){
                                ?> 
                <div class="card gedf-card">
                
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="<?php echo $row['photo'] ;?>" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0"><?php echo $row['nom_utilisateur'];?></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="post.php">
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>10 min ago</div>
                        <a class="card-link" href="#">
                           
                        </a>

                        <p class="card-text">
                        <?php echo $row['post'];?>
                        </p>
                    </div>
                    </a>
                    <div class="card-footer">
                                                        <i <?php if (userLiked($row['id_post'])): ?>
                                                            class="fa fa-thumbs-up like-btn"
                                                        <?php else: ?>
                                                            class="fa fa-thumbs-o-up like-btn"
                                                        <?php endif ?>
                                                            data-id="<?php echo $row['id_post']; ?>"
                                                        ></i> Like
                                                         <span class="likes"><?php echo getLikes($row['id_post']); ?></span>

                                                        <i <?php if (userDisliked($row['id_post'])): ?>
                                                            class="fa fa-thumbs-down dislike-btn"
                                                        <?php else: ?>
                                                            class="fa fa-thumbs-o-down dislike-btn"
                                                        <?php endif ?>
                                                        data-id="<?php echo $row['id_post'];?>"
                                                        ></i> Dislike
                                                        <span class="dislikes"><?php echo getDislikes($row['id_post']); ?></span>
                        
                        <a href="post.php" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                        
                    </div>
                    
                </div>
                <?php 
                                            }
                                    }
                            }else{
                                echo "No posts yet !!";
                            } ?> 
                <!-- Post /////-->


               


               



            </div>
            
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="image-profil"><img src="img/image.jpg" alt="" class="profilImg"> </div>
                        <div class="h5"><?php echo $row3['nom_utilisateur'] ?></div>
                        <div class="h7"><?php echo $row3['description'] ?></div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="h6 text-muted">Followers</div>
                            <div class="h5">5.2342</div>
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted">Following</div>
                            <div class="h5">6758</div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>


