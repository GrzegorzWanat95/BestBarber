<?php

    session_start();
    require_once("connectdb.php");

    if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
    {
        header('Location: ../login.php');
        exit();
    }

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
                $_SESSION['loggedin'] = true;

                $row = $result->fetch_assoc();
                $_SESSION['user'] = $row['login'];


                $result->free_result();
                unset($_SESSION['login-error']);
                header('Location: /index.php');
            }
            else
            {
                $_SESSION['login-error'] = "Błędny login lub hasło!";
                header('Location: ../login.php');
            }
        }

        $connection->close();
    }
?>