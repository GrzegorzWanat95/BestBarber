<?php
    require_once("connectdb.php");

    $connection = new mysqli($host,$db_user,$db_password,$db_name);
    $errors = array();

    $timestamp = $_POST['date'];
    
    $service_query_check = "SELECT * FROM services";
    $service = mysqli_query($connection, $service_query_check);
    #$service = mysqli_fetch_assoc($result);

    $date = $_SESSION['date'];
    // form validation
    $sql = "SELECT * FROM bookings WHERE date='$date'";
    $result = $connection->query($sql);
    $hours = array('8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'); 

    $connection->close();           
?>
