<?php
    session_start();
    session_unset();
    session_destroy();
    ob_start();
    header("location:logout.php");
    ob_end_flush(); 
    include('logout.php');
    exit();
?>