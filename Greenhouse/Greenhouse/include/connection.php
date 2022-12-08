<?php
    $username = "wlgykctu_agro";
    $pass = "@ALXGrow1.";
    $host = "localhost";
    $db_name = "wlgykctu_alx";
    $con = mysqli_connect ($host, $username, $pass);
    $db = mysqli_select_db ( $con, $db_name );