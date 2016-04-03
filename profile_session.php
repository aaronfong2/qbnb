<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("qbnb", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select * from users where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);

$_SESSION['login_username'] =$row['username'];
if(!isset($_SESSION['login_username'])){
	mysql_close($connection); // Closing Connection
	header('Location: index.php'); // Redirecting to login page
}
$_SESSION['login_id'] = $row['userID'];
$_SESSION['login_pw'] = $row['password'];
$_SESSION['login_type'] =$row['is_admin'];
$_SESSION['login_firstName'] =$row['first_name'];
$_SESSION['login_lastName'] =$row['last_name'];
$_SESSION['login_email'] =$row['email'];
$_SESSION['login_phoneNum'] =$row['phone_num'];
$_SESSION['login_phoneExt'] =$row['phone_ext'];
$_SESSION['login_gradYr'] =$row['grad_year'];
$_SESSION['login_faculty'] =$row['faculty'];
$_SESSION['login_degree'] =$row['degree'];
$_SESSION['login_isActive'] =$row['is_active'];
?>
