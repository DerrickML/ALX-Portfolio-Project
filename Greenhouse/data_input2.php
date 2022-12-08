<?php
    include ('./include/connection.php');
    $sql_insert = "INSERT INTO setconditions (moisture, LightIntensity, Temperature, Humidity) VALUES ('".$_GET["moisture"]."', '".$_GET["LightIntensity"]."','".$_GET["Temperature"]."','".$_GET["Humidity"]."') LIMIT 10";

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