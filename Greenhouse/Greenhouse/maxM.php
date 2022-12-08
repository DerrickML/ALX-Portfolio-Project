<?php
include('./include/connection.php');
 $moist = mysqli_query($con,'SELECT moisture FROM maxmoisture ORDER BY ID DESC LIMIT 1');
                                    
    // Process record
    while($r1 = mysqli_fetch_array($moist))
        {
            echo "-".$r1['moisture']."<span class=\"x fas fa-angle-up\"</span>";
        }
        // Close the connection
       mysqli_close($con);
 ?>