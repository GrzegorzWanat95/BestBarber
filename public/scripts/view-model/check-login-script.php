<?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        echo '<a class="nav-item text-light nav-link" href="user-panel.php">WITAJ '.strtoupper($_SESSION["user"]).' !</a>';
        echo '<a class="nav-item text-light nav-link" href="scripts/logout.php">WYLOGUJ</a>';
    }
    else
    {
        echo '<a class="nav-item menu-login text-light nav-link" href="login.php">LOGOWANIE</a>';
        echo '<a class="nav-item menu-login text-light nav-link" href="register.php">REJESTRACJA</a>';
    }
?>