<?php 
    include("includes/head.php");
    include("includes/classes/User.php");
    include("includes/classes/Post.php");


	// if(isset($_POST['post'])){
	// 	$post = new Post($con, $userLoggedIn);
	// 	$post->submitPost($_POST['post_text'], 'none');
	// }
?>

    <div class="main-container">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="left-sidebar">
                    <div class="user-data">
                        <div class="user-img">
                            <img src="<?php echo $user['profile_pic']; ?>" alt="user profie pic" >
                            <h3 class="mt-3"><?php echo $user['first_name'] ." " . $user['last_name']; ?></h3>
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
                            <form>
                                <input class="post-text w-100" maxlength="120" type="text" placeholder="What's on your mind?">
                            </form>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-md-8 col-sm-12"><input type="file" accept="image/*"></div>
                        <div class="col my-2"><button type="button" class="btn btn-danger">POST</button></div>
                    </div>
                </div>
                <div class="row user-post">
                    Abhishek
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