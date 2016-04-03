<?php
session_start();
include('redirect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include_once 'header.php';?>
    <div id="profile">
        <div class="container">
            <h1>Your Profile</h1>
            <div class="main">
                <p>Username : <i><?php echo $_SESSION['login_username']; ?></i></p>
                <p>User Type : <i><?php echo $_SESSION['login_type']; ?></i></p>
                <p>First Name : <i><?php echo $_SESSION['login_firstName']; ?></i></p>
                <p>Last Name : <i><?php echo $_SESSION['login_lastName']; ?></i></p>
                <p>Email : <i><?php echo $_SESSION['login_email']; ?></i></p>
                <p>Phone Number : <i><?php echo $_SESSION['login_phoneNum']; ?></i>   Ext : <i><?php echo $_SESSION['login_phoneExt']; ?></i></p>
                <p>Year of Graduation : <i><?php echo $_SESSION['login_gradYr']; ?></i></p>
                <p>Faculty : <i><?php echo $_SESSION['login_faculty']; ?></i></p>
                <p>Degree : <i><?php echo $_SESSION['login_degree']; ?></i></p>

            </div>
			<div class="button-centre">
				<input class="submit" name="submit" value="Edit Profile" onClick="Javascript:window.location.href = 'editProfile_page.php';">
            </div>
			<div class="button-centre">
                <input class="submit" name="submit" value="Cancel Membership" onClick="Javascript:window.location.href = 'cancelMembership_page.php';">
			</div>
        </div>
    </div>
</body>
</html>
