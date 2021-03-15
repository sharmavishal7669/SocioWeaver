<?php  
    require 'config/config.php';

    if (isset($_SESSION['loginEmail'])) {
        $userLoggedIn = $_SESSION['loginEmail'];
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
    }
    else {
        header("Location: register.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to socioweave</title>

    <!-- Bootstrap 4 cdn-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!--Fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
	
    <link rel="stylesheet" href="css/indexstyle.css">

</head>
<body>
    <?php include 'includes/navbar.php'; ?>