<?php
session_start();
$connection = mysqli_connect("localhost", "root", "","qbnb");
$query = "SELECT start_date FROM bookings WHERE (status='confirmed' OR status='requested') AND propertyID=".$_GET['id'];
$result = mysqli_query($connection,$query);

$freeDate=TRUE;
$invalidDate='';

if (isset($_POST['submit'])) {
	$row=mysqli_fetch_array($result);
	if ($_POST['start_date'] <= date("Y-m-d")) {
		$freeDate=FALSE;
		$invalidDate="Start date must be in the future.";
	}
	while ($row=mysqli_fetch_array($result)) {
		if (date('Y-m-d',strtotime($_POST['start_date'] . " + 7 days"))>$row['start_date'] && date('Y-m-d',strtotime($_POST['start_date'] . " - 7 days"))<$row['start_date']) {
			$freeDate=FALSE;
			$invalidDate='That date overlaps with another booking on this property.';
		}
	}
	if ($freeDate) {
		$_SESSION['Requested_Date']=$_POST['start_date'];
		$invalidDate=$_POST['start_date'];
	}
}
mysqli_close($connection); // Closing Connection

if(isset($_POST['submit']) && $freeDate==TRUE && 0){
	include('confirmAccom.php');
	header("Location: confirmAccom.php?id=" . $_GET['id']);
}
?>
