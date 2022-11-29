<?php
#adding view and editing booking data as administrator
require_once("../../scripts/database-context/connectdb.php");
    $username = $_SESSION['user'];
    //database connection
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    //PL charset
    mysqli_set_charset($connection, "utf8mb4");
    $query = "SELECT * FROM bookings ORDER BY date ASC, hour DESC";
        //fetch all booking terms to array
        if ($result = $connection->query($query))
        {
            while ($row = $result->fetch_assoc())
            {
                $id = $row["id"];
                $date = $row["date"];
                $hour = $row["hour"];
                $service = $row["service"];
                $username1 = $row["username"];
                
                //display data in booking panel in administrator mode
                echo
                '<tr>
                    <td>'.$date.'</td>
                    <td>'.$hour.'</td>
                    <td>'.$service.'</td>
                    <td>'.$username1.'</td>
                    <td>'."<a href=../../scripts/booking/delete.php?id=" . $row['id'] . ">🗑</a>".'</td>
                    <td>'."<a href=edit.php?id=" . $row['id'] . ">🖉</a>".'</td>
                </tr>';
            }
            $result->free();
        }
        else
        {
            echo '<tr> Brak wizyt </tr>';
        }
?>