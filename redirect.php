<?php
if (!isset($_SESSION))
	session_start();

if (!isset($_SESSION['login_id']))
	header("Location: index.php");

?>
