<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="register.php">SocioWeave</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarContent">
        <form class="form-inline">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </form>
        <ul class="navbar-nav">
            
            <li class="nav-item active">
                <a class="nav-link" href="register.php">
                    <div class="nav-icon"><i class="fas fa-home"></i></div>
                Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <div class="nav-icon"><i class="fas fa-envelope"></i></div>
                Messages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <div class="nav-icon"><i class="fas fa-bell"></i></div>
                Notifications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <div class="nav-icon"><i class="fas fa-user-friends"></i></div>
                Friends</a>
            </li>

           
        </ul>
        
    </div>
<ul class="navbar-nav">
<li class="nav-item dropdown">
                <div class="btn-group dropleft">
                    <button class="dropbtn" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div style="position:relative;"> <div class="nav-icon"><i class="fas fa-user"></i></div>
                        <?php echo $user['first_name']; ?> </div>
                    </button>
                    <div class="dropdown-menu">
                        
                        <a class="dropdown-item" href="#">View Profile</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Settings</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Account setting</a>
                        <a class="dropdown-item" href="#">Privacy</a>
                        <a class="dropdown-item" href="#">FAQs</a>
                        <a class="dropdown-item" href="#">Terms & Conditions</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center logout-link " href="includes/handlers/logout.php"><h6 class="dropdown-header logout-tab" >Logout</h6></a>
                    </div>
                </div>

            </li>
</ul>
    
</nav>

<script>
    $(document).ready(function(){
        $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
                $(this).toggleClass('open');        
            },
            function() {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
                $(this).toggleClass('open');       
            }
        );
    });
</script>