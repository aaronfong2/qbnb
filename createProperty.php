<?php
session_start();
$connection = mysqli_connect("localhost", "root", "","qbnb");
$query = "SELECT * from districts";
$result_districts = mysqli_query($connection,$query);

$login_id = $_SESSION['login_id'];

$editError=''; // Variable To Store Error Message
$usernameError='';
$emailError='';
$error=0;
$boolTrans=0;

if (isset($_POST['submit'])) {
	if (!empty($_POST['street_num'])){
		mysql_query("UPDATE properties SET street_num = ".$_POST['street_num']." WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'] , $connection);
		$editError = $editError . mysql_error();
	}

	if (!empty($_POST['street_name'])){
		mysql_query("UPDATE properties SET street_num = '".$_POST['street_name']."' WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
		$editError = $editError . mysql_error();
	}
	if (!empty($_POST['apt_num'])){
		mysql_query("UPDATE properties SET apt_num = '".$_POST['apt_num']."' WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
		$editError = $editError . mysql_error();
	}
	if (!empty($_POST['postal_code'])){
		mysql_query("UPDATE properties SET postal_code = '".$_POST['postal_code']."' WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
		$editError = $editError . mysql_error();
	}
	if (!empty($_POST['description'])){
		mysql_query("UPDATE properties SET description = '".$_POST['description']."' WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
		$editError = $editError . mysql_error();
	}
	if (!empty($_POST['district'])){
		mysql_query("UPDATE properties SET district = '".$_POST['district']."' WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
		$editError = $editError . mysql_error();
	}
	if (!empty($_POST['building_type'])){
		mysql_query("UPDATE properties SET building_type = '".$_POST['building_type']."' WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
		$editError = $editError . mysql_error();
	}
	if (!empty($_POST['num_bedrooms'])){
		mysql_query("UPDATE properties SET num_bedrooms = '".$_POST['num_bedrooms']."' WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
		$editError = $editError . mysql_error();
	}
	if (!empty($_POST['bathrooms'])){
		mysql_query("UPDATE properties SET bathrooms = '".$_POST['bathrooms']."' WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
		$editError = $editError . mysql_error();
	}
	if (!empty($_POST['kitchen'])){
		mysql_query("UPDATE properties SET kitchen = '".$_POST['kitchen']."' WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
		$editError = $editError . mysql_error();
	}

	if (!empty($_POST['pool'])){
		$boolTrans = -1;
		if (strcasecmp(substr($_POST['pool'],0,1),"Y")==0) { $boolTrans=1; }
		elseif (strcasecmp(substr($_POST['pool'],0,1),"N")==0) { $boolTrans=0; }
		if ($boolTrans != -1) {
			mysql_query("UPDATE properties SET pool = '".$boolTrans."' WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
			$editError = $editError . mysql_error();
		}
	}

	if (!empty($_POST['laundry'])){
		mysql_query("UPDATE properties SET laundry = '".$_POST['laundry']."' WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
		$editError = $editError . mysql_error();
	}

	if (!empty($_POST['dist_to_subway'])){
		mysql_query("UPDATE properties SET dist_to_subway = ".$_POST['dist_to_subway']." WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
		$editError = $editError . mysql_error();
	}

	if (!empty($_POST['pets_allowed'])){
		//echo strcasecmp(substr($_POST['pets_allowed'],0,1),"Y");
		$boolTrans = -1;
		if (strcasecmp(substr($_POST['pets_allowed'],0,1),"Y")==0) { $boolTrans=1; }
		elseif (strcasecmp(substr($_POST['pets_allowed'],0,1),"N")==0) { $boolTrans=0; }
		if ($boolTrans != -1) {
			mysql_query("UPDATE properties SET pets_allowed = ".$boolTrans." WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
			$editError = $editError . mysql_error();
		}
	}
	if (!empty($_POST['smoking_allowed'])){
		$boolTrans = -1;
		if (strcasecmp(substr($_POST['smoking_allowed'],0,1),"Y")==0) { $boolTrans=1; }
		elseif (strcasecmp(substr($_POST['smoking_allowed'],0,1),"N")==0) { $boolTrans=0; }
		if ($boolTrans != -1) {
			mysql_query("UPDATE properties SET smoking_allowed = '".$boolTrans."' WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
			$editError = $editError . mysql_error();
		}
	}
	if (!empty($_POST['balcony'])){
		$boolTrans = -1;
		if (strcasecmp(substr($_POST['balcony'],0,1),"Y")==0) { $boolTrans=1; }
		elseif (strcasecmp(substr($_POST['balcony'],0,1),"N")==0) { $boolTrans=0; }
		if ($boolTrans != -1) {
			mysql_query("UPDATE properties SET balcony = '".$boolTrans."' WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
			$editError = $editError . mysql_error();
		}
	}
	if (!empty($_POST['internet_included'])){
		$boolTrans = -1;
		if (strcasecmp(substr($_POST['balcony'],0,1),"Y")==0) { $boolTrans=1; }
		elseif (strcasecmp(substr($_POST['balcony'],0,1),"N")==0) { $boolTrans=0; }
		if ($boolTrans != -1) {
			mysql_query("UPDATE properties SET internet_included = ".$boolTrans." WHERE supplierID =".$login_id . " AND propertyID =" . $_GET['id'], $connection);
			$editError = $editError . mysql_error();
		}
	}
}
/*

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
	if (!empty($_POST['street_num'])){

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
	$editError=mysql_error();
}
*/

mysql_close($connection); // Closing Connection

if(isset($_POST['submit']) && empty($editError)){
	
	include('my_properties.php');
	header("Location: my_properties.php");
}
?>

