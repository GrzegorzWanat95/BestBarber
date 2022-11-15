<?php
    require_once("connectdb.php");
    $username = $_SESSION['user'];
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    $query = "SELECT * FROM bookings ORDER BY date ASC, hour DESC";
        if ($result = $connection->query($query))
        {
            while ($row = $result->fetch_assoc())
            {
                $id = $row["id"];
                $date = $row["date"];
                $hour = $row["hour"];
                $service = $row["service"];
                $username1 = $row["username"];

                echo
                '<tr>
                    <td>'.$id.'</td>
                    <td>'.$date.'</td>
                    <td>'.$hour.'</td>
                    <td>'.$service.'</td>
                    <td>'.$username1.'</td>
                    <td>'."<a href=scripts/delete-booking.php?id=" . $row['id'] . ">🗑</a>".'</td>
                    <td>'."<a href=edit-booking.php?id=" . $row['id'] . ">🖉</a>".'</td>
                </tr>';
            }
            $result->free();
        }
        else
        {
            echo '<tr> Brak wizyt </tr>';
        }
?>