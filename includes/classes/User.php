<?php
class User {
    private $user;
    private $con;

    public function __construct($con, $user) {
        $this->con = $con;
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email='$user'");
		$this->user = mysqli_fetch_array($user_details_query);
    }

    public function getEmail() {
        return $this->user['email'];
    }

    public function getNumPosts() {
		$email = $this->user['email'];
		$query = mysqli_query($this->con, "SELECT num_posts FROM users WHERE email='$email'");
		$row = mysqli_fetch_array($query);
		return $row['num_posts'];
	}

    public function getFirstAndLastName() {
		$email = $this->user['email'];
		$query = mysqli_query($this->con, "SELECT first_name, last_name FROM users WHERE email='$email'");
		$row = mysqli_fetch_array($query);
		return $row['first_name'] . " " . $row['last_name'];
	}

    public function isClosed() {
		$email = $this->user['email'];
		$query = mysqli_query($this->con, "SELECT user_closed FROM users WHERE email='$email'");
		$row = mysqli_fetch_array($query);

		if($row['user_closed'] == 'yes')
			return true;
		else 
			return false;
	}

	public function isFriend($user_to_check) {
		$userComma = "," . $user_to_check . ",";

		if(strstr($this->user['friend_array'], $userComma) || $user_to_check == $this->user['email'])
			return true;
		else
			return false;
	}

}

?>