<?php
    session_start();
    require_once("connectdb.php");

    $connection = new mysqli($host,$db_user,$db_password,$db_name);
    $errors = array();

    if(!$connection)
    {
        error_reporting(0);
        echo "Błąd połączenia z bazą danych";
    }
    else
    {
      //get data for placeholder
      $date = $_POST['date'];
      $hour = $_POST['hour'];
      $service_name = $_POST['service'];
      $username =  $_SESSION['user'];

      if(empty($service_name))
      {
        array_push($errors, "Musisz wybrać rodzaj usługi!");
      }

      if(count($errors) == 0)
      {
        //Finally, register service if there are no errors in the form
        unset($_SESSION['service-error']);
        $query = "INSERT INTO bookings (date, hour, service, username)
        VALUES('$date', '$hour', '$service_name', '$username')";
        mysqli_query($connection, $query);
        $_SESSION['success'] = "Zarezerwowano termin!";
        header('location: ../add-reservation.php');
      }
      else
      {
        $_SESSION['edit-service-error'] = $errors;
        header('Location: ../booking-date.php');
      }
      $connection->close();
    }
?>
