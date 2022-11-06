<?php

    session_start();
    require_once("connectdb.php");

    $connection = new mysqli($host,$db_user,$db_password,$db_name);
    $errors = array();

    $id = $_GET["id"];

    // form validation
    $service_query_check = "SELECT * FROM services WHERE id='$id' LIMIT 1";
    $result = mysqli_query($connection, $service_query_check);
    $service = mysqli_fetch_assoc($result);

    $_SESSION['name'] = $service['description'];
    $_SESSION['price'] = $service['price'];    
?>
