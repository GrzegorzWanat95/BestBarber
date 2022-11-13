<?php
    require_once("connectdb.php");

    $connection = new mysqli($host,$db_user,$db_password,$db_name);
    $errors = array();

    $date = $_SESSION['date'];
    // form validation
    $sql = "SELECT * FROM bookings WHERE date='$date'";
    $result = $connection->query($sql);

    #$_SESSION['date'] = $booking['date'];
    #$_SESSION['hour'] = $booking['hour'];
    #$_SESSION['service'] = $booking['service'];
    
    #$service_upload_query = "SELECT description from services";
    #$result_service = mysqli_query($connection, $service_upload_query);

    $connection->close();           
?>
