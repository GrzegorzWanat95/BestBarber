<?php
        require_once("connectdb.php");
        //connect to database
        $connection = new mysqli($host, $db_user, $db_password, $db_name);
        $id = $_POST["id"];
        $description = $_POST['description'];
        $price = $_POST['price'];

        echo($description);
        echo($price);
        echo($id);
        //connection error
        if ($connection->connect_error) {
            die("Błąd połączenia z bazą danych: " . $connection->connect_error);
        }
        else
        {  
          $errors = array();
      
          // form validation
          $service_query_check = "SELECT * FROM services WHERE id='$id' LIMIT 1";
          $result = mysqli_query($connection, $service_query_check);
          $service = mysqli_fetch_assoc($result);
          
          if($service['id'] == $id)
          {
            $query = "UPDATE services SET description = '$description', price = '$price' WHERE id='$id'";
            mysqli_query($connection, $query);
            $_SESSION['success'] = "Edytowano usługę!";
            header('location: ../price-list.php');
          }
          else
          {
            header('Location: ../price-list.php');
          }
    
            $connection->close();      

        } 
?>
