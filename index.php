<?php 
    include("includes/head.php");
    include("includes/classes/User.php");
    include("includes/classes/Post.php");

    $user_obj = new User($con, $userLoggedIn);


	if(isset($_POST['post'])){
		$post = new Post($con, $userLoggedIn);
		$post->submitPost($_POST['post_text'], 'none');
	}
?>

    <div class="main-container">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="left-sidebar">
                    <div class="user-data">
                        <div class="user-img">
                            <img src="<?php echo $user['profile_pic']; ?>" alt="user profie pic" >
                            <h3 class="mt-3"><?php echo $user_obj->getFirstAndLastName(); ?></h3>
                        </div>
                        <div class="posts">
                            <h4>Posts</h4>
                            <span><?php echo $user['num_posts']; ?></span>
                        </div>
                        <div class="likes">
                            <h4>Likes</h4>
                            <span><?php echo $user['num_likes']; ?></span>
                        </div>
                        <div class="view-profile">
                            <a href="#">View Profile</a>
                        </div>
                    </div>
                    <div class="popular">
                        <h4>Popular</h4>
                    </div>
                </div>
            </div>
            <div class="col-9 user-content mx-auto">
                <div class="row upload mb-2">
                    <div class="row pt-3 mx-auto">
                        <div class="col-md-3 col-sm-12 p-1"><img class="post-user-image" src="<?php echo $user['profile_pic']; ?>" alt="user profie pic" ></div>
                        <div class="col">
                            <form class="post_form" action="index.php" method="POST">
                                <textarea class="w-100" name="post_text" id="post_text" placeholder="What's on your mind?"></textarea>
                                <input type="file" accept="image/*">
                                <button type="submit" name="post" id="post_button" class="btn btn-danger">POST</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row user-post">
                    <?php $post = new Post($con, $userLoggedIn);
                    $post->loadPostsFriends(); ?>
                </div>
            </div>
        </div>
    </div>

    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap JS + Pooper-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>