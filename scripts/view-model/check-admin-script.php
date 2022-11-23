<?php
    //render view for admin/non admin user
    if (isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == true)
    {
        echo '<a class="nav-item nav-link" href="booking.php">KALENDARZ&nbsp;WIZYT</a>';
    }
    else
    {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
        {
            echo '<a class="nav-item nav-link" href="booking.php">UMÓW&nbsp;SIĘ&nbsp;NA&nbsp;WIZYTĘ</a>';
        }
        else
        {
            echo '<a class="nav-item nav-link" href="login.php">UMÓW&nbsp;SIĘ&nbsp;NA&nbsp;WIZYTĘ</a>';
        }
    }
?>