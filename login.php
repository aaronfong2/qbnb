<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
	$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("qbnb", $connection);

// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from users where password='$password' AND username='$username'", $connection);
$user = mysql_fetch_assoc($query);
$rows = mysql_num_rows($query);
if ($rows == 1 && $user['is_active']==1) {
	$_SESSION['login_user']=$username; // Initializing Session
	header("location: homepage.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
?>