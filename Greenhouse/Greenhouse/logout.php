<?php
// This logs the user out of the system
    session_start();
    session_destroy();
    header('Location: index.php');
?>