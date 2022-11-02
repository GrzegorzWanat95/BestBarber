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
    <div class="subpage__content">
        <div class="content__frame">
            <h1 class="header">
                CENNIK
            </h1>
            <div class="holder">
             <div class="half__side">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Rodzaj usługi</th>
                        <th scope="col">Cena</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">Strzyżenie brody nożyczkami</th>
                        <td>50</td>
                        </tr>
                        <tr>
                        <th scope="row">Strzyżenie brody nożyczkami / brzytwą</th>
                        <td>65</td>
                        </tr>
                        <tr>
                        <th scope="row">Strzyżenie włosów + brody</th>
                        <td>95</td>
                        </tr>
                        <tr>
                        <th scope="row">Strzyżenie włosów + golenie karku brzytwą</th>
                        <td>55</td>
                        </tr>
                        <tr>
                        <th scope="row">Golenie pełne głowy brzytwą</th>
                        <td>55</td>
                        </tr>
                        <tr>
                        <th scope="row">Golenie pełne głowy brzytwą + strzyżenie z goleniem brody</th>
                        <td>110</td>
                        </tr>
                        <tr>
                        <th scope="row">Golenie pełne brody brzytwą</th>
                        <td>50</td>
                        </tr>



                    </tbody>
                </table>
             </div>
             <div class="half__side">
             <img class="price" src="../img/priceList.png"  alt="Service image">
                    <!-- <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Rodzaj usługi</th>
                        <th scope="col">Cena</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">Strzyżenie brody nożyczkami</th>
                        <td>50</td>
                        </tr>
                        <tr>
                        <th scope="row">Strzyżenie brody nożyczkami / brzytwą</th>
                        <td>65</td>
                        </tr>
                        <tr>
                        <th scope="row">Strzyżenie włosów + brody</th>
                        <td>95</td>
                        </tr>
                        <tr>
                        <th scope="row">Strzyżenie włosów + golenie karku brzytwą</th>
                        <td>55</td>
                        </tr>
                        <tr>
                        <th scope="row">Golenie pełne głowy brzytwą</th>
                        <td>55</td>
                        </tr>
                        <tr>
                        <th scope="row">Golenie pełne głowy brzytwą + strzyżenie z goleniem brody</th>
                        <td>110</td>
                        </tr>
                        <tr>
                        <th scope="row">Golenie pełne brody brzytwą</th>
                        <td>50</td>
                        </tr>
                        <tr>
                        <th scope="row">Konturowanie brody</th>
                        <td>50</td>
                        </tr>


                    </tbody>
                </table> -->
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