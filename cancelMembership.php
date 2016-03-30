<?php

$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("qbnb", $connection);
session_start();

$login_id = $_SESSION['login_id'];


//Bookings they made:
//Set to cancelled.
$sql_3=mysql_query("UPDATE bookings SET STATUS = 'cancelled' WHERE bookings.requesterID=".$login_id.")", $connection);

//Add to cancelled table with reason as 'Requester membership cancelled'
$sql_4=mysql_query("SELECT bookings.bookingID AS id FROM bookings WHERE bookings.requesterID=".$login_id);
while($i=mysql_fetch_assoc($sql_4)){
    mysql_query("INSERT INTO `cancelled_bookings` (`bookingID`, `reason`) VALUES (".$i['id'].", 'Requester membership cancelled')",$connection);
    //echo "Added ".$i['id']." to cancelled_bookings";
}

//Bookings on their properties:
//Set to cancelled.
$sql_2=mysql_query("UPDATE bookings SET STATUS = 'cancelled' WHERE propertyID IN( SELECT propertyID FROM properties WHERE properties.supplierID =".$login_id.")", $connection);

//Add to cancelled table with reason as 'Supplier membership cancelled'
$sql_1=mysql_query("SELECT bookings.bookingID AS id FROM properties, bookings WHERE properties.supplierID =".$login_id." AND bookings.propertyID = properties.propertyID");
while($i=mysql_fetch_assoc($sql_1)){
    mysql_query("INSERT INTO `cancelled_bookings` (`bookingID`, `reason`) VALUES (".$i['id'].", 'Supplier membership cancelled')",$connection);
    //echo "Added ".$i['id']." to cancelled_bookings";
}

//Set all properties to inactive
$sql_3=mysql_query("UPDATE properties SET is_active = '0' WHERE properties.supplierID =".$login_id, $connection);


//Set user to inactive
$ses_sql=mysql_query("UPDATE `users` SET `is_active` = '0' WHERE `users`.`userID` =".$login_id, $connection);
//$row = mysql_fetch_assoc($ses_sql);

mysql_close($connection); // Closing Connection

//Redirect to logout
header("Location: logout.php");

?>