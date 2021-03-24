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

                    <div class="posts_area"></div>

                    <img id="loading" src="assets/images/icons/loading.gif">

                </div>

                <script>
                var userLoggedIn = '<?php echo $userLoggedIn; ?>';

                $(document).ready(function() {

                    $('#loading').show();

                    //Original ajax request for loading first posts
                    $.ajax({
                        url: "includes/handlers/ajax_load_posts.php",
                        type: "POST",
                        data: "page=1&userLoggedIn=" + userLoggedIn,
                        cache: false,

                        success: function(data) {
                            $('#loading').hide();
                            $('.posts_area').html(data);
                        }
                    });

                    $(window).scroll(function(){
                        var height = $('.posts_area').height(); //div containing posts
                        var scroll_top = $(this).scrollTop();
                        var page = $('.posts_area').find('.nextPage').val();
                        var noMorePosts = $('.posts_area').find('.noMorePosts').val();
                        
                        if((document.body.scrollHeight == document.documentElement.scrollTop + window.innerHeight) && noMorePosts == 'false'){
                            $('#loading').show();

                             var ajaxReq = $.ajax({
                                url: "includes/handlers/ajax_load_posts.php",
                                type: "POST",
                                data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
                                cache: false,

                                success: function(response) {
                                    $('.posts_area').find('.nextPage').remove(); //remove current .nextpage
                                    $('.posts_area').find('.noMorePosts').remove(); //remove current .nextpage

                                    $('#loading').hide();
                                    $('.posts_area').append(response);
                                }
                            });
                            
                        } //End if

                        return false;

                    }); //End (window).scroll(function())
                });

                </script>

            </div>
        </div>
    </div>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap JS + Pooper-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>