<?php

    session_start();
    require_once("connectdb.php");

    //database connection
    $connection = new mysqli($host,$db_user,$db_password,$db_name);
    $errors = array();

    //get data for placeholder
    $id = $_POST["id"];
    $description = $_POST['description'];
    $price = $_POST['price'];

    //find all services from database
    $service_query_check = "SELECT * FROM services WHERE id='$id' LIMIT 1";
    $result = mysqli_query($connection, $service_query_check);
    $service = mysqli_fetch_assoc($result);

    // form validation
    if (empty($description))
    {
      array_push($errors, "Musisz podać nazwę usługi!");
    }
    if (empty($price))
    {
      array_push($errors, "Musisz podać cenę usługi!");
    }

    if($service['id'] == $id)
    {

    }
    else
    {
      array_push($errors, "Nie znaleziono takiej usługi!");
    }

    if(count($errors) == 0)
    {
      //Finally, update service data
       unset($_SESSION['service-error']);
       $query = "UPDATE services SET description = '$description', price = '$price' WHERE id='$id'";
       mysqli_query($connection, $query);
       $_SESSION['success'] = "Edytowano usługę!";
       header('location: ../price-list.php');
    }
    else
    {
      $_SESSION['edit-service-error'] = $errors;
      header('Location: ../edit-service.php');
    }
    $connection->close();
?>
