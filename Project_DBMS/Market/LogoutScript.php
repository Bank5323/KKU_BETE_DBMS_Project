<?php
    session_start();
    session_destroy();
    header('Location:Homepage_Market.php');

?>