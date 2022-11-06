<?php

    session_start();
    require_once("connectdb.php");

    $connection = new mysqli($host,$db_user,$db_password,$db_name);
    $errors = array();

    $name = $_SESSION['user'];
    $rating = $_POST['rating'];
    $content = $_POST['content'];

    if(!$connection)
    {
        error_reporting(0);
        echo "Błąd połączenia z bazą danych";
    }
    else
    {
      $user_check_query = "SELECT name FROM reviews WHERE name='$name' LIMIT 1";
      $result = mysqli_query($connection, $user_check_query);
      $user = mysqli_fetch_assoc($result);
  
      if ($user['name'] === $name) {
        array_push($errors, "Użytkownik o podanej nazwie dodał już opinię!");
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
         unset($_SESSION['add-review-error']);
         $query = "INSERT INTO reviews (name, content, rating)
                 VALUES('$name', '$content', '$rating')";
         mysqli_query($connection, $query);
         $_SESSION['success'] = "Dodano opinię!";
         header('location: ../reviews.php');
      }
      else
      {
        $_SESSION['add-review-error'] = $errors;
        header('Location: ../add-opinion.php');
      }
    }
