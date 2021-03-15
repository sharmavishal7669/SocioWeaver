<?php

//Declaring variables to prevent errors
$fname = ""; //First name
$lname = ""; //Last name
$email = ""; //email
$password = ""; //password
$password2 = ""; //password 2
$date = ""; //Sign up date 
$error_array = array(); //Holds error messages

if(isset($_POST['signUpButton'])){

	//Registration form values

	//First name
	$fname = strip_tags($_POST['regFirstName']); //Remove html tags
	$fname = str_replace(' ', '', $fname); //remove spaces
	$fname = ucfirst(strtolower($fname)); //Uppercase first letter
	$_SESSION['regFirstName'] = $fname; //Stores first name into session variable

	//Last name
	$lname = strip_tags($_POST['regLastName']); //Remove html tags
	$lname = str_replace(' ', '', $lname); //remove spaces
	$lname = ucfirst(strtolower($lname)); //Uppercase first letter
	$_SESSION['regLastName'] = $lname; //Stores last name into session variable

	//email
	$email = strip_tags($_POST['regEmail']); //Remove html tags
	$email = str_replace(' ', '', $email); //remove spaces
	$_SESSION['regEmail'] = $email; //Stores email into session variable

	//Password
	$password = strip_tags($_POST['regPassword']); //Remove html tags
	$password2 = strip_tags($_POST['regPassword2']); //Remove html tags

	$date = date("Y-m-d"); //Current date

	//Check if email is in valid format 
	if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

		$email = filter_var($email, FILTER_VALIDATE_EMAIL);

		//Check if email already exists 
		$email_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");

		//Count the number of rows returned
		$num_rows = mysqli_num_rows($email_check);

		if($num_rows > 0) {
			array_push($error_array, "Email already in use<br>");
		}

	}
	else {
		array_push($error_array, "Invalid email format<br>");
	}


	if(strlen($fname) > 25 || strlen($fname) < 2) {
		array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
	}

	if(strlen($lname) > 25 || strlen($lname) < 2) {
		array_push($error_array,  "Your last name must be between 2 and 25 characters<br>");
	}

	if($password != $password2) {
		array_push($error_array,  "Your passwords do not match<br>");
	}
	else {
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($error_array, "Your password can only contain english characters or numbers<br>");
		}
	}

	if(strlen($password) > 30 || strlen($password) < 5) {
		array_push($error_array, "Your password must be between 5 and 30 characters<br>");
	}


	if(empty($error_array)) {
		$password = md5($password); //Encrypt password before sending to database

		//Profile picture assignment
		$rand = rand(1, 2); //Random number between 1 and 2

		if($rand == 1)
			$profile_pic = "assets/images/profile_pics/defaults/1.svg";
		else if($rand == 2)
			$profile_pic = "assets/images/profile_pics/defaults/2.svg";


		$query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$email', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

		array_push($error_array, "<p style='color: #e75348;'>You're all set! Go ahead and login!</p><br>");
		//Clear session variables 
		$_SESSION['regFirstName'] = "";
		$_SESSION['regLastName'] = "";
		$_SESSION['regEmail'] = "";
	}
}


?>