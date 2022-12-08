<?php
    include ('./include/connection.php');
    $sql_insert = "INSERT INTO temperaturetable (Temperature) VALUES ('".$_GET["Temperature"]."') LIMIT 10";

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