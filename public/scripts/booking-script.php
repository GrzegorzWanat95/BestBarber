<?php

require_once("connectdb.php");

$connection = new mysqli($host,$db_user,$db_password,$db_name);
$service_upload_query = "SELECT description from services";
$result = mysqli_query($connection, $service_upload_query);
$errors = array();


if(isset($_POST['date']) ) 
{
  $date = $_POST['date'];
  $booking_upload_query = "SELECT * from bookings where date='$date'";
  $result_bookings = mysqli_query($connection, $booking_upload_query);
  header('Location: ../booking.php');
}
else
{
  $sql = "SELECT * FROM services";
  #$booking_upload_query = "SELECT * from bookings";
  #$result_bookings = $connection->query($sql);
  $booking_upload_query = "SELECT * from bookings";
  $result_bookings = mysqli_query($connection, $booking_upload_query);
}


/*if(isset($_POST['book']) ) {
    $date = $_POST['date'];
    $hour=$_POST['hour'];
    $service=$_POST['service'];
    $booked_query="SELECT * from bookings where date='$date'and hour='$hour'";
    $result_booked = mysqli_query($connection, $booked_query);
    $booked = mysqli_fetch_array($result_booked);
    if (!empty($booked)) 
    { 
      array_push($errors, "Data jest zajeta");
    }
    if(count($errors) == 0)
    {
      $book_query="INSERT INTO bookings (date,hour,service) VALUES('$date','$hour','$service')";
      $result_book = mysqli_query($connection, $book_query);
    }
    else
    {
      $_SESSION['booking-error'] = $errors;
      header('Location: booking.php');
    }
   
}*/
$connection->close();



















?>
