<?php
    require_once("connectdb.php");
    //connect to database
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    //connection error
    if ($connection->connect_error) {
        die("Błąd połączenia z bazą danych: " . $connection->connect_error);
    }
    // make a query to price-list
    $sql = "SELECT * FROM services";
    $result = $connection->query($sql);

    if (!$result) {
        die("Wystąpił błąd podczas wykonywania zapytania: " . $connection->error);
    }

    echo '<table class="table">
        <thead>
            <tr>
                <th>Rodzaj usługi</th>
                <th>Cena</th>';
                if (isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == true)
                {
                  echo '<th>Opcje</th>
                    <th>Edycja</th>';
                }
    echo    '</tr>
        </thead>
        <tbody>';
    while ($row = $result->fetch_assoc())
    {
        echo '
        <tr>
            <td>'.$row['description'].'</td>
            <td>'.$row['price'] . '&nbsp;zł'.'</td>';
            if (isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == true)
            {
            echo '
            <td>
                <a href=/scripts/delete-service.php?id="' . $row['id'] . '">🗑</a>
            </td>
            <td>
                <a href=edit-service.php?id="' . $row['id'] . '">🖉</a>
            </td>';
            }
    }
    echo '</tr>
        </tbody>
    </table>';

    if (isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == true)
    {
        echo '<a link href="add-service.php">
            <div class="button__field__xxl">
                <p1 class="button__text__table p-1">Dodaj usługę</p1>
            </div>
        </a>';
    }

    //database connection close;
    $connection->close();
?>