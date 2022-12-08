<?php
    include ('./include/connection.php');
    $sql_insert = "INSERT INTO members (fname, lname) VALUES ('".$_GET["fname"]."','".$_GET["lname"]."') LIMIT 10";

    if(mysqli_query($con,$sql_insert))
    {
    echo "Done";
    mysqli_close($con);
    }
    else
    {
    echo "error is ".mysqli_error($con );
    }