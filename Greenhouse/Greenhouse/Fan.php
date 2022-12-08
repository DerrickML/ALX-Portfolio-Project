<?php
include('./include/connection.php');
 $light = mysqli_query($con,'SELECT * FROM moisture ORDER BY ID DESC LIMIT 1');
                                    
    // Process record
    while($r1 = mysqli_fetch_array($light))
        {
            echo $r1['Fan'];
        }
        // Close the connection
        mysqli_close($con);
 ?>