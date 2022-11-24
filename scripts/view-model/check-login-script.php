<?php
    //render view for admin/non admin user
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        echo '<a class="nav-item text-light nav-link" href="../../view/user/index.php">WITAJ '.strtoupper($_SESSION["user"]).' !</a>';
        echo '<a class="nav-item text-light nav-link" href="../user/logout.php">WYLOGUJ</a>';
    }
    else
    {
        echo '<a class="nav-item menu-login text-light nav-link" href="../../view/user/login.php">LOGOWANIE</a>';
        echo '<a class="nav-item menu-login text-light nav-link" href="../../view/user/register.php">REJESTRACJA</a>';
    }
?>