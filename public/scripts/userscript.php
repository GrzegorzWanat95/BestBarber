<?php
    session_start();
    require_once("connectdb.php");
    //connect to database
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    //connection error
    if ($connection->connect_error) {
        die("Błąd połączenia z bazą danych: " . $connection->connect_error);
    }
    // make a query to price-list 
    $username =  $_SESSION['user'];
    $sql = "SELECT * FROM user WHERE login='$username' LIMIT 1";
    $result = $connection->query($sql);
    $user = mysqli_fetch_assoc($result);
    
    if (!$result) {
        die("Wystąpił błąd podczas wykonywania zapytania: " . $connection->error);
    }

    //database connection close;
    $connection->close();
?>
