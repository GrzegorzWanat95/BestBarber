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
        $haslo = $_POST['password'];

        $sql = "SELECT * FROM user WHERE login='$login' AND password='$haslo'";

        if ($result = $connection->query($sql))
        {
            $users = $result->num_rows;
            if($users > 0)
            {
                $row = $result->fetch_assoc();
                $_SESSION['user'] = $row['login'];


                $result->free_result();
                header('Location: /user-main.php');
            }
            else
            {
                echo "NO USER OR WRONG PASSWORD";
            }
        }

        $connection->close();
    }
?>