<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title> </title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="table.css" type="text/css"/>
<script type="text/javascript" src="jquery-1.12.2.js"></script>
<script type="text/javascript" src="__jquery.tablesorter/jquery.tablesorter.js"></script>
<script>
	$(document).ready(function(){
		$("#prop_table").tablesorter();
		$("#bookings_table").tablesorter();
	});
</script>
</head>
<body>
<?php include_once 'header.php';?>
<h1>My Properties</h1>
<div class=containerFull>
	<table id="prop_table" class="tablesorter">
		<thead>
			<tr><th>Edit</th><th>Address</th><th>Apt</th><th>Postal Code</th><th>Description</th><th>District</th><th>Building Type</th><th>Number of Bedrooms</th><th>Bathrooms</th><th>Kitchen</th><th>Pool</th><th>Laundry</th><th>Distance to Subway (m)</th><th>Pets Allowed?</th><th>Smoking Allowed?</th><th>Balcony</th><th>Internet Included</th></tr>
		</thead>
		<tbody>
		<?php
		$test='';
		$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
		mysql_select_db('qbnb');

		$query = "SELECT propertyID, street_num, street_name, apt_num, postal_code, properties.description, building_type, num_bedrooms, bathrooms, kitchen, pool, laundry, dist_to_subway, pets_allowed, smoking_allowed, balcony, internet_included, districts.name 
			FROM properties JOIN districts ON properties.districtID=districts.districtID
			WHERE properties.supplierID=" . $_SESSION['login_id'] . " AND is_active=1";
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			while($row = mysql_fetch_array($result)) {   //Creates a loop to loop through results
				echo "<tr>";
				echo "<td><a href=\"editProperty_page.php?id=" . $row['propertyID'] . "\">Edit</a></td>";
				echo "<td>" . $row['street_num'] . " " . $row['street_name'] . "</td>";
				echo "<td>" . $row['apt_num'] . "</td>";
				echo "<td>" . $row['postal_code'] . "</td>";
				echo "<td>" . $row['description'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['building_type'] . "</td>";
				echo "<td>" . $row['num_bedrooms'] . "</td>";
				echo "<td>" . $row['bathrooms'] . "</td>";
				echo "<td>" . $row['kitchen'] . "</td>";
				echo "<td>";
				if (is_null($row['pool'])) {}
				elseif ($row['pool'] == 0) { echo "N"; }
				elseif ($row['pool']==1) { echo "Y"; }	
								"</td>";
				echo "<td>" . $row['laundry'] . "</td>";
				echo "<td>" . $row['dist_to_subway'] . "</td>";
				echo "<td>"; 
			 	if (is_null($row['pets_allowed'])) {}
				elseif ($row['pets_allowed'] == 0) { echo "N"; }
				elseif ($row['pets_allowed']==1) { echo "Y"; }	
				echo "</td>";
				echo "<td>";
			 	if (is_null($row['smoking_allowed'])) {}
				elseif ($row['smoking_allowed'] == 0) { echo "N"; }
				elseif ($row['smoking_allowed']==1) { echo "Y"; }	
				echo "</td>";
				echo "<td>";
			 	if (is_null($row['balcony'])) {}
				elseif ($row['balcony'] == 0) { echo "N"; }
				elseif ($row['balcony']==1) { echo "Y"; }	
				echo "</td>";
				echo "<td>";
			 	if (is_null($row['internet_included'])) {}
				elseif ($row['internet_included'] == 0) { echo "N"; }
				elseif ($row['internet_included']==1) { echo "Y"; }	
				echo "</td>";
				echo "</tr>\n";
			}
		}			
		else {
			echo "<tr><td><i>You have no properties.</i></td></tr>";
		}
			/*
			echo "<h1>Bookings on My Properties</h1>";
			$query = "SELECT street_num, street_name, bookingID, users.first_name, users.last_name, start_date, status
			FROM bookings JOIN users ON users.userID=bookings.requesterID
			WHERE bookings.propertyID IN (SELECT propertyID
			FROM properties
			WHERE supplierID=inputUserID)"
			$result = mysql_query($query);

			if (mysql_num_rows($result) > 0) {
			while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
			}
			else {
			echo "<tr><td><i>There are no bookings on your properties.</i></td></tr>";
			}
			 */
		?>
		</tbody>
	</table>
<h1>Bookings on My Properties</h1>
	<table id="bookings_table" class="tablesorter">
		<thead>
			<tr><th>Consumer Name</th><th>Address</th><th>Apt</th><th>Booking Date</th><th>Booking Status</th><th>Actions</th>
		</thead>
		<tbody>
		<?php
		$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
		mysql_select_db('qbnb');

		$query = "SELECT users.first_name, users.last_name, street_num, street_name, apt_num, start_date, bookings.status
			FROM (properties JOIN bookings ON properties.propertyID=bookings.propertyID) JOIN users ON bookings.requesterID=users.userID
			WHERE properties.supplierID=" . $_SESSION['login_id'] . " AND is_active=1";
		$result = mysql_query($query);
		if (0) { //(mysql_num_rows($result) > 0) {
			while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
				echo "<tr>";
				echo "<td>" . $row['first name'] . " " . $row['last_name'] . "</td>";
				echo "<td>" . $row['street_num'] . " " . $row['street_name'] . "</td>";
				echo "<td>" . $row['apt_num'] . "</td>";
				echo "<td>" . $row['start_date'] . "</td>";
				echo "<td>" . $row['status'] . "</td>";
				echo "<td><div class=\"button-centre\"><input type=\"submit\" name=\"Confirm\" value=\"Confirm\"</td>";
				echo "<td>" . $row['building_type'] . "</td>";
				echo "<td>" . $row['num_bedrooms'] . "</td>";
				echo "<td>" . $row['bathrooms'] . "</td>";
				echo "<td>" . $row['kitchen'] . "</td>";
				echo "<td>";
				if (empty($row['pool'])) {}
				elseif ($row['pool'] == 0) { echo "N"; }
				elseif ($row['pool']==1) { echo "Y"; }	
								"</td>";
				echo "<td>" . $row['laundry'] . "</td>";
				echo "<td>" . $row['dist_to_subway'] . "</td>";
				echo "<td>"; 
			 	if (empty($row['pets_allowed'])) {}
				elseif ($row['pets_allowed']==0) { echo "N"; }
				elseif ($row['pets_allowed']==1) { echo "Y"; }	
				echo "</td>";
				echo "<td>";
			 	if (empty($row['smoking_allowed'])) {}
				elseif ($row['smoking_allowed'] == 0) { echo "N"; }
				elseif ($row['smoking_allowed']==1) { echo "Y"; }	
				echo "</td>";
				echo "<td>";
			 	if (empty($row['balcony'])) {}
				elseif ($row['balcony'] == 0) { echo "N"; }
				elseif ($row['balcony']==1) { echo "Y"; }	
				echo "</td>";
				echo "<td>";
			 	if (empty($row['internet_included'])) {}
				elseif ($row['internet_included'] == 0) { echo "N"; }
				elseif ($row['internet_included']==1) { echo "Y"; }	
				echo "</td>";
				echo "</tr>\n";
			}
		}
					
		else {
		echo "<tr><td><i>You have no bookings on your properties.</i></td></tr>";
		}

					/*
					echo "<h1>Bookings on My Properties</h1>";
					$query = "SELECT bookingID, users.first_name, users.last_name, start_date, status
					FROM bookings JOIN users ON users.userID=bookings.requesterID
					WHERE bookings.propertyID IN (SELECT propertyID
					FROM properties
					WHERE supplierID=inputUserID)"
					$result = mysql_query($query);

					if (mysql_num_rows($result) > 0) {
					while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
					}
					else {
					echo "<tr><td><i>There are no bookings on your properties.</i></td></tr>";
					}
					 */
		?>
		</tbody>
	</table>
<div>
</body>
</html>
