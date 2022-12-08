<?php
    include ('./include/connection.php');
    $sql_insert = "INSERT INTO moisture (Temperature, Humidity) VALUES ('".$_GET["Temperature"]."','".$_GET["Humidity"]."')";

    if(mysqli_query($con,$sql_insert))
    {
    echo "Done";
    mysqli_close($con);
    }
    else
    {
    echo "error is ".mysqli_error($con );
    }
    ?>