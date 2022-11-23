<?php
    session_start();
    require_once("connectdb.php");

    $connection = new mysqli($host,$db_user,$db_password,$db_name);
    $errors = array();

    $id = $_GET["id"];

    // form validation
    $booking_query_check = "SELECT * FROM bookings WHERE id='$id' ";
    $result = mysqli_query($connection, $booking_query_check);
    $booking = mysqli_fetch_assoc($result);
    $_SESSION['date'] = $booking['date'];
    $_SESSION['hour'] = $booking['hour'];
    $_SESSION['service'] = $booking['service'];

    //get service description for booking change by admin
    $service_upload_query = "SELECT description from services";
    $result_service = mysqli_query($connection, $service_upload_query);

    $connection->close();
?>
