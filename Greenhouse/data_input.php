<?php
    include ('./include/connection.php');
    $sql_insert = "INSERT INTO moisture (moisture, LightIntensity, Temperature, Humidity, BulbState, Fan, WaterPump) VALUES ('".$_GET["moisture"]."', '".$_GET["LightIntensity"]."','".$_GET["Temperature"]."','".$_GET["Humidity"]."', '".$_GET["BulbState"]."', '".$_GET["Fan"]."', '".$_GET["WaterPump"]."') LIMIT 10";

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