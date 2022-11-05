<?php
    session_start();
    require_once("connectdb.php");

    $connection = new mysqli($host,$db_user,$db_password,$db_name);
    $id = $_GET["id"];

    $errors = array();

    if(count($errors) == 0)
    {
      //Finally, register service if there are no errors in the form
       unset($_SESSION['service-error']);
       $query = "DELETE FROM services where id=$id";
       mysqli_query($connection, $query);
       $_SESSION['success'] = "Usunięto usługę!";
       header('location: ../price-list.php');
    }
    else
    {
      $_SESSION['service-error'] = $errors;
      header('Location: ../price-list.php');
    }
?>