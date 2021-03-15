<?php 
    include 'config/config.php';
    include 'includes/form_handlers/register_handler.php';
    include 'includes/form_handlers/login_handler.php';
    if(isset($_SESSION['loginEmail']))
    {
        header("Location: index.php");
        exit;
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
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- External css-->
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>

    <div class="main-container">
        <div class="row">
            <div class="left col-sm-12 col-md-6">
                <h2 class="login-heading">SocioWeave</h2>
                <p class="login-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <img class="login-image" src="assets/images/cm-main-img.png" alt="gadgets-image">
            </div>
            <div class="right col">
                <div class="form-toggle-btn">
                    <button class = "btn b1">Sign up</button>
                    <button class = "btn b2 active">Sign in</button>
                </div>

                <div class="signin-container">
                    <div class="login-form">
                        <h3 class="sign-in-text">Sign in</h3>
                        <hr class="login-hr">
                        <form action="register.php" method="POST">
                            <div><input class="form-input" type="text" placeholder="Email Address" name="loginEmail" required
                                value="<?php 
                                        if(isset($_SESSION['loginEmail'])) {
                                            echo $_SESSION['loginEmail'];
                                        } 
                                        ?>">
                            </div>
                            
                            <div><input class="form-input" type="password" placeholder="Password" name="loginPassword"></div>
                            
                            <div class=""><input type="checkbox" name="rememberMe" ><span> Remember me</span> <a class="forgot-password-link" href="">Forgot password</a></div>

                            <?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "Email or password was incorrect<br>"; ?>
                            
                            <input type="submit" value="Sign in" name="signInButton" class="btn sign-in-button">
                        </form>
                    </div>
                    <div class="other-login-options">
                        <p class="social-accounts-heading">LOGIN VIA SOCIAL ACCOUNT</p>
                        <button type="button" class="btn social-connect-button" style="background-color: #3b5998;"><i class='fab fa-facebook-f'></i>&nbsp;&nbsp;Login Via Facebook</button>
                        <button type="button" class="btn social-connect-button" style="background-color: #db4a39;"><i class="fab fa-google"></i>&nbsp;&nbsp;Login Via Google</button>
                    </div>
                </div>

                <div class="signup-container">
                    <div class="login-form">
                        <h3 class="sign-in-text">Sign up</h3>
                        <hr class="login-hr">
                        <form action="register.php" method="POST">
                            <div><input class="form-input" type="text" placeholder="First name" name="regFirstName" required
                                value="<?php 
                                        if(isset($_SESSION['regFirstName'])) {
                                            echo $_SESSION['regFirstName'];
                                        } 
                                        ?>">
                            </div>

                            <?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>
    
                            <div><input class="form-input" type="text" placeholder="Last name" name="regLastName" required
                                value="<?php 
                                        if(isset($_SESSION['regLastName'])) {
                                            echo $_SESSION['regLastName'];
                                        } 
                                        ?>">
                            </div>

                            <?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>
    
                            <div><input class="form-input" type="email" placeholder="Email" name="regEmail" required
                                value="<?php 
                                        if(isset($_SESSION['regEmail'])) {
                                            echo $_SESSION['regEmail'];
                                        } 
                                        ?>">
                            </div>

                            <?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
					            else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";?>
                            
                            <div><input class="form-input" type="password" placeholder="Password" name="regPassword" required></div>
    
                            <div><input class="form-input" type="password" placeholder="Confirm Password" name="regPassword2" required></div>

                            <?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>"; 
					            else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
					            else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>"; ?>
                            
                            <div class=""><input type="checkbox" name="termsAndConditions" ><span> Yes, I understand and agree to the socioweave Terms & Conditions.</span></div>
                            
                            <input type="submit" value="Get Started" name="signUpButton" class="btn sign-up-button"><br>

                            <?php if(in_array("<p style='color: #e75348;'>You're all set! Go ahead and login!</p><br>", $error_array)) echo "<div style='color: #e75348;margin-top:50px;'>You're all set! Go ahead and login!</div><br>"; ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>


    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    

    <!-- External JS-->
    <script src="javascript/script.js"></script>

    <?php  

    if(isset($_POST['signUpButton'])) {
        echo '
        <script>
        $(document).ready(function(){
                $(".signin-container").hide();
                $(".signup-container").show();
                onSignUp();
        });
        </script>

        ';
    }

    ?>

</body>
</html>