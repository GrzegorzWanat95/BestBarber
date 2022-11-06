<?php

    session_start();
    require_once("connectdb.php");

    $connection = new mysqli($host,$db_user,$db_password,$db_name);
    $errors = array();

    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $content = $_POST['content'];

    if (empty($name)) 
    { 
      array_push($errors, "Musisz podać swój nick!");
    }
    if (empty($rating)) 
    { 
      array_push($errors, "Musisz podać ocenę!");
    }
    if (empty($rating)) 
    { 
      array_push($errors, "Musisz podać treść opinii");
    }
  
    if(count($errors) == 0)
    {
      //Finally, register service if there are no errors in the form
       unset($_SESSION['service-error']);
       $query = "INSERT INTO reviews (name, content, rating)
               VALUES('$name', '$content', '$rating')";
       mysqli_query($connection, $query);
       $_SESSION['success'] = "Dodano opinię!";
       header('location: ../reviews.php');
    }
    else
    {
      $_SESSION['service-error'] = $errors;
      header('Location: ../add-opinion.php');
    }
?>
