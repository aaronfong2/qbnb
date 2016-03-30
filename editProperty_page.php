<?php
include('editProperty.php');
if (!isset($_GET['id'])) {
	include('my_properties.php');
	header("Location: my_properties.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Edit Property</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>

<?php include 'header.php';?>
<?php
		if (mysql_num_rows($result) != 1) {
		echo "PropertyID " . $_GET['id'] . " not found.";
		echo "<br><a href=my_properties.php>Return to My Properties</a>";
	}
	else {
		$row = mysql_fetch_array($result);
?>
<div class="container">
	<h2>Edit Profile</h2>
	<p class="centre"> Only complete fields you wish to change</p>

		<form method="post" action="">
			<div class="main">
                			
				<label>Street Number :</label>
				<input class="input" type="text" name="street_num" value="" placeholder= <?php echo $row['street_num'] ?>>

				<label>Street Name :</label>
				<input class="input" type="text" name="street_name" value="" placeholder= <?php echo $row['street_name'] ?>>

				<label>Apartment Number :</label>
				<input class="input" type="text" name="apt_num" value="" placeholder= <?php echo $row['apt_num'] ?>>
				<!--<span class="error"><?php echo $nameError;?></span>-->

				<label>Postal Code :</label>
				<input class="input" type="text" name="postal_code" value="" placeholder= <?php echo $row['postal_code'] ?>>
				<!--<span class="error"><?php echo $nameError;?></span>-->

				<label>Description :</label>
				<!--<input class="input" type="text" name="short_description" value="" placeholder= <?php echo $row['description'] ?>>-->
				<textarea name="description" placeholder= <?php echo $row['description'] ?>></textarea>
				<!--<span class="error"><?php echo $phoneError;?></span>-->

				<label>District :</label>
				<input class="input" type="text" name="district" value="" placeholder= <?php echo $row['name'] ?>>
				<!--<span class="error"><?php echo $phoneExtError;?></span>-->

				<label>Building Type :</label>
				<input class="input" type="text" name="building_type" value="" placeholder= <?php echo $row['building_type'] ?>>
				<!--<span class="error"><?php echo $gradYrError;?></span>-->

				<label>Number of Bedrooms :</label>
				<br>
				<input class="input" type="number" name="num_bedrooms" value="" min="0" step="1" placeholder= <?php echo $row['num_bedrooms'] ?>>
				<!--<span class="error"><?php echo $facultyError;?></span>-->
				<br>
				<label>Bathrooms :</label>
				<input class="input" type="text" name="bathrooms" value="" placeholder= <?php echo $row['bathrooms'] ?>>
<br>
				<!--<span class="error"><?php echo $nameError;?></span>-->

				<label>Kitchen :</label>
				<input class="input" type="text" name="kitchen" value="" placeholder= <?php echo $row['kitchen'] ?>>
				<!--<span class="error"><?php echo $nameError;?></span>-->

				<label>Pool? :</label>
				<input class="input" type="text" name="pool" value="" placeholder=
					<?php if (is_null($row['pool'])) {}
					elseif ($row['pool'] == 0) { echo "N"; }
					elseif ($row['pool']==1) { echo "Y"; }?>
				>

				<label>Laundry :</label>
				<input class="input" type="text" name="laundry" value="" placeholder= <?php echo $row['laundry'] ?>>

				<label>Distance to Subway (m):</label>
				<br>
				<input class="input" type="number" min="0" step="1" name="dist_to_subway" value="" placeholder= <?php echo $row['dist_to_subway'] ?>>
				<br>

				<label>Pets Allowed? :</label>
				<input class="input" type="text" name="pets_allowed" value="" placeholder= 
					<?php if (is_null($row['pets_allowed'])) {}
					elseif ($row['pets_allowed'] == 0) { echo "N"; }
					elseif ($row['pets_allowed']==1) { echo "Y"; }?>
				>

				<!--<span class="error"><?php echo $nameError;?></span>-->

				<label>Smoking Allowed? :</label>
				<input class="input" type="text" name="smoking_allowed" value="" placeholder=
					<?php if (is_null($row['smoking_allowed'])) {}
					elseif ($row['smoking_allowed'] == 0) { echo "N"; }
					elseif ($row['smoking_allowed']==1) { echo "Y"; }?>
				>
				<!--<span class="error"><?php echo $nameError;?></span>-->

				<label>Balcony? :</label>
				<input class="input" type="text" name="balcony" value="" placeholder=
					<?php if (is_null($row['balcony'])) {}
					elseif ($row['balcony'] == 0) { echo "N"; }
					elseif ($row['balcony']==1) { echo "Y"; }?>
				>
				<!--<span class="error"><?php echo $nameError;?></span>-->
				
				<label>Internet included? :</label>
				<input class="input" type="text" name="internet_included" value="" placeholder=
					<?php if (is_null($row['internet_included'])) {}
					elseif ($row['internet_included'] == 0) { echo "N"; }
					elseif ($row['internet_included']==1) { echo "Y"; }?>
				>
				<!--<span class="error"><?php echo $nameError;?></span>-->
			</div>
			
			<div class="button-centre">
				<input class="submit" type="submit" name="submit" value="Submit">
				<span class="error"><?php echo $editError;?>
				<!--<span class="success"><?php echo $successMessage;?></span>-->
			</div>
		</form>

</div>
<?php
	} // end else from above
?>
</body>
</html>
