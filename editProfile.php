<?php
session_start();
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("qbnb", $connection);

$login_id = $_SESSION['login_id'];

$passwordError=''; // Variable To Store Error Message
$usernameError='';
$emailError='';
$error=0;

if (isset($_POST['submit'])) {

	//password
	if (!empty($_POST['oldPW']) || !empty($_POST['newPW']) || !empty($_POST['repeatNewPW'])){ 
		if (!empty($_POST['oldPW']) && !empty($_POST['newPW']) && !empty($_POST['repeatNewPW'])) {
			if ($_POST['oldPW']==$_SESSION['login_pw']){
				if($_POST['newPW']==$_POST['repeatNewPW']){

					mysql_query("UPDATE users SET password = '".$_POST['newPW']."' WHERE users.userID =".$login_id, $connection);
				}else{
					$passwordError = "The your new passwords do not match";
					$error=1;
				}

			}else{
				$passwordError = "The old password is incorrect";
				$error=1;
			}
		}else{
			$passwordError = "You must fill in all 3 fields to change your password";
			$error=1;
		}
	}

	//email
	if (!empty($_POST['email'])){

		//Check that the email is not already used
		$query = mysql_query("select * from users where users.email='".$_POST['email']."'", $connection);
		$rows = mysql_num_rows($query);

		if($rows==0){
			mysql_query("UPDATE users SET email = '".$_POST['email']."' WHERE users.userID =".$login_id, $connection);
		}else{
			$emailError = "Email is already registered";
			$error=1;
		}
			
	}
	//username
	if (!empty($_POST['username'])){

		//Check that the username is not already used
		$query = mysql_query("select * from users where users.username='".$_POST['username']."'", $connection);
		$rows = mysql_num_rows($query);

		if($rows==0){
			mysql_query("UPDATE users SET username = '".$_POST['username']."' WHERE users.userID =".$login_id, $connection);
		}else{
			$usernameError = "Username is already registered";
			$error=1;
		}
	}

	//first name
	if (!empty($_POST['firstName'])){
		mysql_query("UPDATE users SET first_name = '".$_POST['firstName']."' WHERE users.userID =".$login_id, $connection);
	}

	//last name
	if (!empty($_POST['lastName'])){
		mysql_query("UPDATE users SET last_name = '".$_POST['lastName']."' WHERE users.userID =".$login_id, $connection);
	}
	//Phone number
	if (!empty($_POST['phoneNum'])){
		mysql_query("UPDATE users SET phone_num = '".$_POST['phoneNum']."' WHERE users.userID =".$login_id, $connection);	
	}

	//Phone ext
	if (!empty($_POST['phoneExt'])){
		mysql_query("UPDATE users SET phone_ext = '".$_POST['phoneExt']."' WHERE users.userID =".$login_id, $connection);
	}

	//Year of Graduation
	if (!empty($_POST['gradYr'])){
		mysql_query("UPDATE users SET grad_year = '".$_POST['gradYr']."' WHERE users.userID =".$login_id, $connection);
	}
	//Faculty
	if (!empty($_POST['faculty'])){
		mysql_query("UPDATE users SET faculty = '".$_POST['faculty']."' WHERE users.userID =".$login_id, $connection);
	}
	//Degree
	if (!empty($_POST['degree'])){
		mysql_query("UPDATE users SET degree = '".$_POST['degree']."' WHERE users.userID =".$login_id, $connection);
	}

}

mysql_close($connection); // Closing Connection

if(isset($_POST['submit']) && $error==0){
	
	include('profile_session.php');
	header("Location: profile_page.php");
}
?>