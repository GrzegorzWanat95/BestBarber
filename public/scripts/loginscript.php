<?php

    session_start();
    require_once("connectdb.php");

    $connection = new mysqli($host,$db_user,$db_password,$db_name);

    if(!$connection)
    {
        error_reporting(0);
        echo "error";
    }
    else
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE login='$login' AND password='$password'";

        if ($result = $connection->query($sql))
        {
            $users = $result->num_rows;
            if($users > 0)
            {
                $row = $result->fetch_assoc();
                $_SESSION['user'] = $row['login'];
                $_SESSION['loggedin'] = "";

                $result->free_result();
                header('Location: /index.php');
            }
            else
            {
                header('Location: ../login-error.php');
            }
        }

        $connection->close();
    }
?>