<?php
session_start();
include('redirect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include 'header.php';?>
    <h1>Are you sure? </h1>
    <p class="centre">You have 30 days to contact the administrator to undo this action.</p>
	<div class="button-centre">
		<input class="submit" name="submit" value="Yes" onClick="Javascript:window.location.href = 'cancelMembership.php';">
    </div>
	<div class="button-centre">
        <input class="submit" name="submit" value="No" onClick="Javascript:window.location.href = 'profile_page.php';">
	</div>

	

</body>
</html>
