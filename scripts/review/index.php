<?php
    require_once("connectdb.php");
    //connect to database
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    //connection error
    if ($connection->connect_error) {
        die("Błąd połączenia z bazą danych: " . $connection->connect_error);
    }
    // make a query to price-list 
    $sql = "SELECT * FROM reviews";
    $result = $connection->query($sql);
    $countRatingSql = "SELECT AVG(rating) FROM reviews";
    $avg = $connection->query($countRatingSql );
    $_SESSION['avg'] = $avg->fetch_assoc();
    
    if (!$result) {
        die("Wystąpił błąd podczas wykonywania zapytania: " . $connection->error);
    }

    //database connection close;
    $connection->close();
?>
