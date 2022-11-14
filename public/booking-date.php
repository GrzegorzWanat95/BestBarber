<?php
session_start();
require('scripts/time-range.php');
require('scripts/check-date.php');
if(array_key_exists('date', $_POST))
{
    $timestamp=($_POST['date']);
    $_SESSION['date'] = $_POST['date'];
}
else
{
    $timestamp = $_SESSION['date'];
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BestBarber</title>
    <link rel="stylesheet" href="styles/app.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstra Datepicker CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div class="menu__top">
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <div class="left__menu">
                        <a href="index.php"><img class="logo" src="../img/logo2biel.png" alt="BestBarber logo"></a>
                        <a class="nav-item nav-link" href="about.php">O NAS</a>
                        <a class="nav-item nav-link" href="price-list.php">CENNIK</a>
                        <a class="nav-item nav-link" href="contact.php">KONTAKT</a>
                        <a class="nav-item nav-link" href="reviews.php">OPINIE</a>
                        <?php
                        if (isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == true) { ?>
                            <a class="nav-item nav-link" href="reviews.php">KALENDARZ&nbsp;WIZYT</a>
                        <?php
                        } else { ?>
                            <a class="nav-item nav-link" href="booking.php">UMÓW&nbsp;SIĘ&nbsp;NA&nbsp;WIZYTĘ</a>
                        <?php } ?>
                    </div>
                    <div class="right__menu">
                        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
                            <a class="nav-item text-light nav-link" href="user-panel.php"><?php echo "WITAJ&nbsp;" . strtoupper($_SESSION['user']) . "!" ?></a>
                            <a class="nav-item text-light nav-link" href="scripts/logout.php">WYLOGUJ</a>
                        <?php } else { ?>
                            <a class="nav-item text-light nav-link" href="login.php">LOGOWANIE</a>
                            <a class="nav-item text-light nav-link" href="register.php">REJESTRACJA</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- mobile version -->
    <div class="menu__top__mobile">
        <div class="menu__container">
            <a href="index.php"><img class="logo" src="../img/logo2biel.png" alt="BestBarber logo"></a>
            <nav class="navbar navbar-dark m-4">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="menu__collapse">
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
                        <a class="nav-item text-light nav-link" href="user-panel.php"><?php echo "WITAJ&nbsp;" . strtoupper($_SESSION['user']) . "!" ?></a>
                        <a class="nav-item text-light nav-link" href="scripts/logout.php">WYLOGUJ</a>
                    <?php } else { ?>
                        <a class="nav-item text-light nav-link" href="login.php">LOGOWANIE</a>
                        <a class="nav-item text-light nav-link" href="register.php">REJESTRACJA</a>
                    <?php } ?>
                    <a class="nav-item nav-link" href="about.php">O NAS</a>
                    <a class="nav-item nav-link" href="price-list.php">CENNIK</a>
                    <a class="nav-item nav-link" href="contact.php">KONTAKT</a>
                    <a class="nav-item nav-link" href="reviews.php">OPINIE</a>
                    <?php
                    if (isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == true) { ?>
                        <a class="nav-item nav-link" href="reviews.php">KALENDARZ&nbsp;WIZYT</a>
                    <?php
                    } else { ?>
                        <a class="nav-item nav-link" href="booking.php">UMÓW&nbsp;SIĘ&nbsp;NA&nbsp;WIZYTĘ</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="subpage__content">
        <div class="content__frame">
            <h1 class="header">
                <?php
                if (isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == true) { ?>
                    ZBLIŻAJĄCE&nbsp;SIĘ&nbsp;WIZYTY
                <?php
                } else { ?>
                    REZERWACJE
                <?php } ?>
            </h1>
            <div class="holder">
                <div class="half__side">
                    <?php
                    if (isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == true) { ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Data</th>
                                    <th>Godzina</th>
                                    <th>Usługa</th>
                                    <th>Usuń</th>
                                    <th>Edycja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // print all data from price-list.php
                                while ($row = $result_bookings->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['hour']; ?></td>
                                        <td><?php echo $row['service']; ?></td>
                                        <!-- if (isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == true) {  -->
                                        <td>
                                            <?php echo "<a href=scripts/delete-booking.php?id=" . $row['id'] . ">🗑</a>"; ?>
                                        </td>
                                        <td>
                                            <?php echo "<a href=edit-booking.php?id=" . $row['id'] . ">🖉</a>"; ?>
                                        </td>

                                    <?php } ?>
                                    </tr>
                            </tbody>
                        </table>
                    <?php
                    } else { ?>
                        <h5 class="calendar__title">Wolne terminy dla daty: <?php echo ($timestamp) ?></h5>
                        <div class="calendar__holder">
                            <div class="settings__fields">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Godzina</th>
                                            <th>Usługa</th>
                                            <th>Zarezerwuj</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // print all data from price-list.php and delete rows which are occupied
                                        $iterator = 0;
                                        foreach ($hours as $term)
                                        {
                                            if($term == 0)
                                            {
                                                ?>
                                                    <tr class="inactive">
                                                        <td class="quarter inactive"><?php echo $timestamp; ?></td>
                                                        <td class="quarter inactive"><?php echo $hours_pattern[$iterator]; ?></td>
                                                        <td class="quarter inactive">-</td>
                                                        <td class="quarter inactive">-</td>
                                                    </tr>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <tr>
                                                    <form method="post" action="./scripts/add-booking.php">
                                                        <td class="quarter"><?php echo $timestamp; ?></td>
                                                        <td class="quarter"><?php echo $hours_pattern[$iterator]; ?></td>
                                                        <td class="quarter">
                                                            <input type="hidden" id="date" name="date" value="<?php echo $timestamp; ?>" />
                                                            <input type="hidden" id="hour" name="hour" value="<?php echo $hours_pattern[$iterator]; ?>" />
                                                            <select class="no-border" name="service" required>
                                                                <option disabled selected>Wybierz usługę</option>;
                                                                <?php while ($rows = mysqli_fetch_array($service)) { ?>
                                                                    <option class="option__field" value="<?php echo $rows['description']; ?>"><?php echo $rows['description']; ?></option>;
                                                                <?php
                                                                }
                                                                ?>
                                                            </select><br>
                                                        </td>
                                                        <td class="quarter"><button class="no-border" type="submit" name="book"><?php echo "Zarezerwuj"; ?></button></td>
                                                    </form>
                                                <?php
                                            }
                                            $iterator = $iterator + 1;
                                        }
                                    }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php if (isset($_SESSION['login-error'])) echo $_SESSION['login-error'] ?>
                            </div>
                            <a link href="booking.php">
                                <div class="button__field__xxl">
                                    <p1 class="button__text__table p-1">Powrót</p1>
                                </div>
                            </a>
                        </div>
                    <?php
                    ?>
                </div>
                <div class="half__side">
                    <img class="price" src="../img/14.png" alt="Zdjęcie narzędzi fryzjerskich">
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <img class="logo__footer" src="../img/logo1biel.png" alt="BestBarber logo">
        <div class="footer__text">
            Copyright©2022 BestBarber
        </div>
    </div>
    <script>
        const picker = document.getElementById('date');
        picker.addEventListener('input', function(e) {
            var day = new Date(this.value).getUTCDay();
            if ([6, 0].includes(day)) {
                e.preventDefault();
                this.value = '';
                alert('W weekendy jesteśmy zamknięci');
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>