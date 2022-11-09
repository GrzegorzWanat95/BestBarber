<?php
    session_start();
    require_once("connectdb.php");

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
  
      // form validation
      $service_query_check = "SELECT * FROM BOOKINGS WHERE id='$id'";
      $result = mysqli_query($connection, $service_query_check);
      $service = mysqli_fetch_assoc($result);
      
      if($service['id'] == $id)
      {
        $query = "DELETE FROM bookings where id='$id'";
        mysqli_query($connection, $query);
        $_SESSION['success'] = "Usunięto rezerwację!";
        header('location: ../booking.php');
      }
      else
      {
        header('Location: ../booking.php');
      }

        $connection->close();
    }
?>