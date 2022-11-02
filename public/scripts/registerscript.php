<?php

    session_start();
    require_once("connectdb.php");

    if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false)
    {
        header('Location: ../register.php');
        exit();
    }

    $connection = new mysqli($host,$db_user,$db_password,$db_name);
    $errors = array();
    $username = $_POST['login'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];


    /*if (isset($_POST['reg_user'])) {
        // receive all input values from the form in register.php
        $username = mysqli_real_escape_string($connection, $_POST['login']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

        // form validation
        // by adding (array_push()) corresponding error into $errors array
        if (empty($username)) { array_push($errors, "Nazwa użytkownika jest wymagana"); }
        if (empty($email)) { array_push($errors, "Email jest wymagany"); }
        if (empty($password_1)) { array_push($errors, "Hasło jest wymagane"); }
        if ($password_1 != $password_2) {
          array_push($errors, "Hasła nie są ze sobą zgodne");
        }
    }

    $user_check_query = "SELECT * FROM user WHERE login='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['login'] === $username) {
          array_push($errors, "Użytkownik o podanej nazwie już istnieje!");
        }

        if ($user['email'] === $email) {
          array_push($errors, "Podany email jest już w bazie!");
        }
    }*/

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO user (login, email, password)
                VALUES('$username', '$email', '$password')";
        mysqli_query($connection, $query);
        $_SESSION['login'] = $username;
        $_SESSION['success'] = "Zalogowano!";
        header('location: ../index.php');
    }
?>
