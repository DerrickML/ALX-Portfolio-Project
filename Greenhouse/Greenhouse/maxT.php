<?php
include('./include/connection.php');
 $temperature = mysqli_query($con,'SELECT Temperature FROM maxtemperature ORDER BY ID DESC LIMIT 1');
                                    
    // Process record
    while($r1 = mysqli_fetch_array($temperature))
        {
            echo "-".$r1['Temperature']."<span class=\"x fas fa-angle-up\"</span>";
        }
        // Close the connection
       mysqli_close($con);
 ?>