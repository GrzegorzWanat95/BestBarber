<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BestBarber</title>
    <link rel="stylesheet" href="styles/app.css">
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
                    </div>
                    <div class="right__menu">
                        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
                            <a class="nav-item text-light nav-link" href="#"><?php echo strtoupper("WITAJ ".$_SESSION['user']."!") ?></a>
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
                    <a class="nav-item nav-link" href="about.php">O NAS</a>
                    <a class="nav-item nav-link" href="price-list.php">CENNIK</a>
                    <a class="nav-item nav-link" href="contact.php">KONTAKT</a>
                    <a class="nav-item nav-link" href="#">OPINIE</a>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
                        <a class="nav-item text-light nav-link" href="#"><?php echo strtoupper("WITAJ " . $_SESSION['user'] . "!") ?></a>
                        <a class="nav-item text-light nav-link" href="scripts/logout.php">WYLOGUJ</a>
                    <?php } else { ?>
                        <a class="nav-item text-light nav-link" href="login.php">LOGOWANIE</a>
                        <a class="nav-item text-light nav-link" href="register.php">REJESTRACJA</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="subpage__content">
        <div class="content__frame">
            <h1 class="header">
                O NAS
            </h1>
            <div class="subpage__text">
                BestBarber to tradycyjny salon barberski w centrum Poznania. Każdego dnia nasz zespół profesjonalnych fryzjerów
                dokłada wszelkich starań, by zadbać o&nbsp;satysfakcję klientów. Poza usługami strzyżenia włosów i&nbsp;brody z&nbsp;przyjemnością
                pomożemy w&nbsp;dobraniu odpowiednich kosmetyków oraz przygotujemy spersonalizowany plan pielęgnącji.
            </div>
            <div class="carousel__section">
                <div class="carousel__field">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 carousele__img" src="../img/7.png" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../img/8.png" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../img/9.png" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../img/10.png" alt="Fourth slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Poprzedni</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Następny</span>
                        </a>
                    </div>
                </div>
                <div class="carousel__field">
                    <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 carousele__img" src="../img/12.png" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../img/13.png" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../img/14.png" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../img/11.png" alt="Fourth slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Poprzedni</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Następny</span>
                        </a>
                    </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>