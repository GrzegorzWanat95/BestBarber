<?php
    //render menu for admin/non admin user
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        echo '<a class="nav-item text-light nav-link" href="../../view/user/index.php">WITAJ '.strtoupper($_SESSION["user"]).' !</a>
              <a class="nav-item text-light nav-link" href="../user/logout.php">WYLOGUJ</a>';
    }
    else
    {
        echo '<a class="nav-item text-light nav-link" href="../../view/user/login.php">LOGOWANIE</a>
              <a class="nav-item text-light nav-link" href="../../view/user/register.php">REJESTRACJA</a>';
    }
        echo '<a class="nav-item nav-link" href="../../view/home/about.php">O NAS</a>
              <a class="nav-item nav-link" href="../../view/price/index.php">CENNIK</a>
              <a class="nav-item nav-link" href="../../view/home/contact.php">KONTAKT</a>
              <a class="nav-item nav-link" href="../../view/review/index.php">OPINIE</a>';

    if (isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == true)
    {
        echo '<a class="nav-item nav-link" href="../../view/booking/index.php">KALENDARZ&nbsp;WIZYT</a>';
    }
    else
    {
        echo '<a class="nav-item nav-link" href="../../view/booking/index.php">UMÓW&nbsp;SIĘ&nbsp;NA&nbsp;WIZYTĘ</a>';
    }
?>