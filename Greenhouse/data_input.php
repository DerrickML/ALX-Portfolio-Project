<?php
    include ('./include/connection.php');
    $sql_insert = "INSERT INTO moisture (Temperature, moisture, Humidity, LightIntensity, BulbState, WaterPump, Fan) VALUES ('".$_GET["Temperature"]."', '".$_GET["moisture"]."','".$_GET["Humidity"]."','".$_GET["LightIntensity"]."', '".$_GET["BulbState"]."', '".$_GET["WaterPump"]."', '".$_GET["Fan"]."')";

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