<?php
    if (!isset($_SESSION)) { session_start(); }
    $_SESSION = array(); 
    session_destroy(); //session destroying
    header("Location: ../../home/index.php"); // come back to home page
    exit();
?>