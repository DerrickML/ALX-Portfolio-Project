<?php
include('./include/connection.php');
 $maxLight = mysqli_query($con,'SELECT LightIntensity FROM maxlight ORDER BY ID DESC LIMIT 1');
                                    
    // Process record
    while($r1 = mysqli_fetch_array($maxLight))
        {
            echo "-".$r1['LightIntensity']."<span class=\"x fas fa-angle-up\"</span>";
        }
        // Close the connection
       mysqli_close($con);
 ?>