<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">SocioWeave</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarContent">
        <form class="form-inline">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </form>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#" style="font-weight:600;">
                    <div class="nav-icon"><i class="fas fa-user"></i></div>
                <?php echo $user['first_name']; ?></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">
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
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <div class="nav-icon"><i class="fas fa-cog"></i></div>
                Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="includes/handlers/logout.php">
                    <div class="nav-icon"><i class="fas fa-sign-out-alt"></i></div>
                Logout</a>
            </li>
        </ul>
    </div>
</nav>