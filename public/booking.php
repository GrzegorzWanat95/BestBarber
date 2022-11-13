<?php
session_start();
require('booking-script.php');
require('scripts/time-range.php');


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
                REZERWACJE
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
                        <form method="post" action="booking-script.php">
                            <div>
                                <div class="nativeDateTimePicker">
                                    <input type="date" id="date" name="date" required />
                                </div>
                                <select name="hour" required>
                                    <option value="" disabled selected>Wybierz godzinę</option><br>
                                    <?php foreach ($times as $key => $val) { ?>
                                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                                    <?php } ?>
                                </select><br>
                                <select name="service" required>
                                    <option disabled selected>Wybierz usługę</option>;
                                    <?php while ($rows = mysqli_fetch_array($result)) { ?>
                                        <option value="<?php echo $rows['description']; ?>"><?php echo $rows['description']; ?></option>;
                                    <?php
                                    }
                                    ?>
                                </select><br>
                                <button type="submit" name="book">Zarezerwuj</button>
                                <div class="settings__fields">
                                    <?php if (isset($_SESSION['booking-error'])) {
                                        foreach ($_SESSION['booking-error'] as $error) {
                                            echo $error;
                                            break;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>
                    <?php
                    } ?>
                    <?php
                    if (isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == true) { ?>
                        <a link href="add-service.php">
                            <div class="button__field__xxl">
                                <p1 class="button__text__table p-1">Dodaj usługę</p1>
                            </div>
                        </a>
                    <?php } ?>
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