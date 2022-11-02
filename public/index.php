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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="menu__top">
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <div class="left__menu">
                        <a href="index.php"><img class="logo" src="../img/logo2biel.png" alt="BestBarber logo"></a>
                        <a class="nav-item nav-link" href="about.php">O NAS</a>
                        <a class="nav-item nav-link" href="price-list.php">CENNIK</a>
                        <a class="nav-item nav-link" href="contact.php">KONTAKT</a>
                        <a class="nav-item nav-link" href="#">OPINIE</a>
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
    <div class="main__content">
        <div class="left__content">
        </div>
        <div class="right__content">
            <div class="main__text">
                <div class="img__field">
                    <img class="img-fluid middle_image" src="/../img/logo1biel.png" alt="BestBarber logo1biel">
                </div>
                <div class="text__field">
                    <p1 class="text">
                        Cenimy tradycyjną elegancję, profesjonalizm i styl. <br>Serdecznie zapraszamy do odwiedzenia
                        naszego salonu.
                    </p1>
                </div>
                <a link href="#" class="button__container mt-5">
                    <div class="button__field">
                        <p1 class="button__text p-1">UMÓW SIĘ NA WIZYTĘ</p1>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>