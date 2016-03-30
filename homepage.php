<?php
include('profile_session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include 'header.php'; ?>
    <div id="homepage">
    <b id="welcome">Welcome : <i><?php echo $_SESSION['login_username']; ?></i></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
</div>
</body>
</html>