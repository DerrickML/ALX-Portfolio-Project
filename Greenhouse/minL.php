<?php
include('./include/connection.php');
 $minLight = mysqli_query($con,'SELECT LightIntensity FROM minlight ORDER BY ID DESC LIMIT 1');
                                    
    // Process record
    while($r1 = mysqli_fetch_array($minLight))
        {
            echo $r1['LightIntensity'];
        }
        // Close the connection
       mysqli_close($con);
 ?>