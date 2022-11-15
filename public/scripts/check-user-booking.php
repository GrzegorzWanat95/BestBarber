<?php
    require_once("connectdb.php");
    $username = $_SESSION['user'];
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    $query = "SELECT * FROM bookings WHERE username='$username' ORDER BY date ASC, hour DESC";
        if ($result = $connection->query($query))
        {
            while ($row = $result->fetch_assoc())
            {
                $id = $row["id"];
                $date = $row["date"];
                $hour = $row["hour"];
                $service = $row["service"];

                echo
                '<tr>
                    <td>'.$date.'</td>
                    <td>'.$hour.'</td>
                    <td>'.$service.'</td>
                    <td>'."<a href=scripts/delete-booking.php?id=" . $row['id'] . ">Odwołaj wizytę 🗑</a>".'</td>
                </tr>';
            }
            $result->free();
        }
        else
        {
            echo '<tr> Brak wizyt </tr>';
        }
?>