<?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        echo '<a class="nav-item text-light nav-link" href="user-panel.php">WITAJ '.strtoupper($_SESSION["user"]).' !</a>
              <a class="nav-item text-light nav-link" href="scripts/logout.php">WYLOGUJ</a>';
    }
    else
    {
        echo '<a class="nav-item text-light nav-link" href="login.php">LOGOWANIE</a>
              <a class="nav-item text-light nav-link" href="register.php">REJESTRACJA</a>';
    }
        echo '<a class="nav-item nav-link" href="about.php">O NAS</a>
              <a class="nav-item nav-link" href="price-list.php">CENNIK</a>
              <a class="nav-item nav-link" href="contact.php">KONTAKT</a>
              <a class="nav-item nav-link" href="reviews.php">OPINIE</a>';

    if (isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == true)
    {
        echo '<a class="nav-item nav-link" href="booking.php">KALENDARZ&nbsp;WIZYT</a>';
    }
    else
    {
        echo '<a class="nav-item nav-link" href="booking.php">UMÓW&nbsp;SIĘ&nbsp;NA&nbsp;WIZYTĘ</a>';
    }
?>