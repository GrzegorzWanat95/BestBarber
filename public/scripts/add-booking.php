<?php

    session_start();
    require_once("connectdb.php");

    $connection = new mysqli($host,$db_user,$db_password,$db_name);
    $errors = array();
    //get data for placeholder
    $date = $_POST['date'];
    $hour = $_POST['hour'];
    $service_name = $_POST['service'];
  
    if(count($errors) == 0)
    {
      //Finally, register service if there are no errors in the form
       unset($_SESSION['service-error']);
       $query = "INSERT INTO bookings (date, hour, service)
       VALUES('$date', '$hour', '$service_name')";
       mysqli_query($connection, $query);
       $_SESSION['success'] = "Zarezerwowano termin!";
       header('location: ../booking.php');
    }
    else
    {
      $_SESSION['edit-service-error'] = $errors;
      header('Location: ../booking.php');
    }
    $connection->close();        
?>
