<?php
    require_once("connectdb.php");
    $username = $_SESSION['user'];
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    $query = "SELECT * FROM bookings WHERE username='$username' ORDER BY date ASC, hour DESC";
    $today = date('Y-m-d', time());

        if ($result = $connection->query($query))
        {
            $iterator = 0;
            while ($row = $result->fetch_assoc())
            {
                $id = $row["id"];
                $date = $row["date"];
                $hour = $row["hour"];
                $service = $row["service"];
                $iterator ++;

                if($date >= $today)
                {
                    echo
                    '<tr>
                        <td>'.$date.'</td>
                        <td>'.$hour.'</td>
                        <td>'.$service.'</td>
                        <td>'."<a href=scripts/delete-booking.php?id=" . $row['id'] . ">Odwołaj wizytę 🗑</a>".'</td>
                    </tr>';
                }
                else
                {

                }
            }
            $result->free();
            if($iterator == 0)
            {
                echo
                '<tr>
                    <td>'. "Brak zbliżającyh się wizyt" .'</td>
                </tr>';
            }
        }
        else
        {
            echo
            '<tr>
                <td>'. "Brak umówionych wizyt" .'</td>
            </tr>';
        }
?>