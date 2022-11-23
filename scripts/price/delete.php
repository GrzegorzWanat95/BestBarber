<?php
    session_start();
    require_once("connectdb.php");

    //database connection
    $connection = new mysqli($host,$db_user,$db_password,$db_name);
    if(!$connection)
    {
        error_reporting(0);
        echo "Błąd połączenia z bazą danych!";
    }
    else
    {
      $id = $_GET["id"];

      $errors = array();

      //find all services from database
      $service_query_check = "SELECT * FROM services WHERE id='$id' LIMIT 1";
      $result = mysqli_query($connection, $service_query_check);
      $service = mysqli_fetch_assoc($result);
      
      if($service['id'] == $id)
      {
        //delete service from database
        $query = "DELETE FROM services where id=$id";
        mysqli_query($connection, $query);
        $_SESSION['success'] = "Usunięto usługę!";
        header('location: ../price-list.php');
      }
      else
      {
        header('Location: ../price-list.php');
      }

        $connection->close();
    }
?>