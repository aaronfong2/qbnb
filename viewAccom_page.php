<?php
include('viewAccom.php');
include('redirect.php');
if (!isset($_GET['id'])){
	include('searchAccoms.php');
	header("Location: searchAccoms.php");	
}
?>
<!DOCTYPE html>
<html>
<head>
<title> </title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="table.css" type="text/css"/>
</head>
<body>
<?php include_once 'header.php';
$test='';
$connection = mysqli_connect("localhost","root","","qbnb");
$query = "SELECT propertyID, street_num, street_name, apt_num, postal_code, properties.description, building_type, num_bedrooms, bathrooms, kitchen, pool, laundry, dist_to_subway, pets_allowed, smoking_allowed, balcony, internet_included, districts.name 
	FROM properties JOIN districts ON properties.districtID=districts.districtID
	WHERE properties.propertyID=" . $_GET['id'] . " AND is_active=1 AND NOT supplierID=" . $_SESSION['login_id'];
$result = mysqli_query($connection,$query);
$prop_exists = mysqli_num_rows($result) > 0;
if ($prop_exists)
	$row = mysqli_fetch_array($result);
?>
<h1>Accommodation Details</h1>
<div class=container>
<?php
if ($prop_exists) {
	$addr_urlenc= urlencode($row['street_num']." ".$row['street_name'].", Toronto, ON, Canada");
	//echo $addr_urlenc;
?>
	<div class="mapContainer">
	<iframe class="gmaps" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCyQS-3kYn6EpMw4xomEiVDN6XRqqD7FBw&q=<?php echo $addr_urlenc?>")></iframe>
	</div>
	<div class="main">
<?php
	echo "<p>Address: <i>" . $row['street_num'] . " " . $row['street_name'] . "</i></p>";
	echo "<p>Apt: <i>" . $row['apt_num'] . "</i></p>";
	echo "<p>Postal Code: <i>" . $row['postal_code'] . "</i></p>";
	echo "<p>Description: <i>" . $row['description'] . "</i></p>";
	echo "<p>District: <i>" . $row['name'] . "</i></p>";
	echo "<p>Building Type: <i>" . $row['building_type'] . "</i></p>";
	echo "<p>Number of Bedrooms: <i>" . $row['num_bedrooms'] . "</i></p>";
	echo "<p>Bathrooms: <i>" . $row['bathrooms'] . "</i></p>";
	echo "<p>Kitchen: <i>" . $row['kitchen'] . "</i></p>";
	echo "<p>Pool: <i>";
	if (is_null($row['pool'])) {}
	elseif ($row['pool'] == 0) { echo "N"; }
	elseif ($row['pool']==1) { echo "Y"; }	
	echo			"</i></p>";
	echo "<p>Laundry: <i>" . $row['laundry'] . "</i></p>";
	echo "<p>Distance to Subway (m): <i>" . $row['dist_to_subway'] . "</i></p>";
	echo "<p>Pets Allowed?: <i>"; 
	if (is_null($row['pets_allowed'])) {}
	elseif ($row['pets_allowed'] == 0) { echo "N"; }
	elseif ($row['pets_allowed']==1) { echo "Y"; }	
	echo "</i></p>";
	echo "<p>Smoking Allowed?: <i>";
	if (is_null($row['smoking_allowed'])) {}
	elseif ($row['smoking_allowed'] == 0) { echo "N"; }
	elseif ($row['smoking_allowed']==1) { echo "Y"; }	
	echo "</i></p>";
	echo "<p>Balcony: <i>";
	if (is_null($row['balcony'])) {}
	elseif ($row['balcony'] == 0) { echo "N"; }
	elseif ($row['balcony']==1) { echo "Y"; }	
	echo "</i></p>";
	echo "<p>Internet Included?: <i>";
	if (is_null($row['internet_included'])) {}
	elseif ($row['internet_included'] == 0) { echo "N"; }
	elseif ($row['internet_included']==1) { echo "Y"; }	
	echo "</i></p>";
	echo "</tr>\n";
?>	
	</div>
	<div class="main">
	<label>Choose Date:</label>
	<form method="post" action="">	
	<input type="date" name="start_date">
	<span class="error"><?php echo $invalidDate;?></span>
	<div class="button-centre">
	<input type="submit" class="submit" name="submit" value="Check Dates"></input> 
	</div>
	</form>
	</div>
<?php		
}
else {
	echo "<div class=\"main\"><p>Property Not Found.</p></div>";
}
?>

</body>
</html>
