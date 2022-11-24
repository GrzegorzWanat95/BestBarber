<?php
    session_start();
    require_once("../../scripts/database-context/connectdb.php");

    //connect database
    $connection = new mysqli($host,$db_user,$db_password,$db_name);
    $errors = array();

    //get data for placeholder
    $id = $_POST["id"];
    $date = $_POST['date'];
    $hour = $_POST['hour'];
    $service_name = $_POST['service'];
  
    //find all existing services 
    $service_query_check = "SELECT * FROM services WHERE id='$id'";
    $result = mysqli_query($connection, $service_query_check);
    $service_quey = mysqli_fetch_assoc($result);

    // form validation
    if ($service_quey) { // if service exists
        if ($service_query['date'] === $date and $service_query['hour']==$hour ) {
          array_push($errors, "Usługa o podanej nazwie już istnieje!");
        }
    }
  
    if(count($errors) == 0)
    {
      //Finally, update data in database
       unset($_SESSION['service-error']);
       $query = "UPDATE bookings SET date = '$date', hour = '$hour', service='$service_name' WHERE id='$id'";
       mysqli_query($connection, $query);
       $_SESSION['success'] = "Edytowano rezerwację!";
       header('location: ../../view/booking/index.php');
    }
    else
    {
      $_SESSION['edit-service-error'] = $errors;
      header('Location: ../edit.php');
    }
    $connection->close();           
?>
