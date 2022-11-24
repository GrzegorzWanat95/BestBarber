<?php
    session_start();
    require_once("../../scripts/database-context/connectdb.php");

    //connect database
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
  
      //find searching booking term from user input
      $service_query_check = "SELECT * FROM BOOKINGS WHERE id='$id'";
      $result = mysqli_query($connection, $service_query_check);
      $service = mysqli_fetch_assoc($result);
      
      //if result exist
      if($service['id'] == $id)
      {
        //delete record from database
        $query = "DELETE FROM bookings where id='$id'";
        mysqli_query($connection, $query);
        $_SESSION['success'] = "Usunięto rezerwację!";
        header('location: ../user-panel.php');
      }
      else
      {
        header('Location: ../user-panel.php');
      }

        $connection->close();
    }
?>