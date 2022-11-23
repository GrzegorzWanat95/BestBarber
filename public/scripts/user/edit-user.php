<?php

    session_start();
    require_once("connectdb.php");

    $connection = new mysqli($host,$db_user,$db_password,$db_name);
    $errors = array();
    //get data for placeholder
    $id=$_POST['id'];
    $name = $_POST['login'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
 
    // form validation
    $user_check_query = "SELECT * FROM user WHERE login='$name' OR email='$email' LIMIT 1";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['login'] === $name) {
          array_push($errors, "Użytkownik o podanej nazwie już istnieje!");
        }

        if ($user['email'] === $email) {
          array_push($errors, "Podany email jest już w bazie!");
        }
    }

    if (empty($name)) 
    { 
      array_push($errors, "Musisz podać login użytkownika!");
    }
    if (empty($email)) 
    { 
      array_push($errors, "Email jest wymagany");
    }
    if (empty($password_1)) 
    { 
      array_push($errors, "Hasło jest wymagane");
    }
    if ($password_1 != $password_2) 
    {
      array_push($errors, "Hasła nie są ze sobą zgodne");
    }
  
    if(count($errors) == 0)
    {
      //Finally, register user if there are no errors in the form
       unset($_SESSION['register-error']);
       $password = md5($password_1);//encrypt the password before saving in the database

       $query = "UPDATE user SET login = '$name', email = '$email', password = '$password' WHERE id='$id'";
       mysqli_query($connection, $query);
       $_SESSION['login'] = $name;
       $_SESSION['success'] = "Zmieniono dane konta!";
       header('location: logout.php');
    }
    else
    {
      $_SESSION['register-error'] = $errors;
      header('Location: ../data-change.php');
    }
    $connection->close();           
?>
