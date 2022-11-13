<?php

require_once("connectdb.php");

$connection = new mysqli($host,$db_user,$db_password,$db_name);
$service_upload_query = "SELECT description from services";
$result = mysqli_query($connection, $service_upload_query);
$errors = array();
$sql = "SELECT * FROM services";
$booking_upload_query = "SELECT * from bookings";
$result_bookings = mysqli_query($connection, $booking_upload_query);

$connection->close();
?>
