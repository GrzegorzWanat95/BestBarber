<?php

    session_start();
    require_once("connectdb.php");

    $username = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $connection = new mysqli($host,$db_user,$db_password,$db_name);    
    
    $password = md5($password);//encrypt the password before saving in the database
    
    $query = "INSERT INTO user (login, password, email) 
              VALUES('$username', '$password', '$email')";
    mysqli_query($connection, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: ../index.php');
?>
