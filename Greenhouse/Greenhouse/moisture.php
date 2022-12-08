<?php
include('./include/connection.php');
//Max-moisture set
$M = mysqli_query($con,'SELECT maxmoisture.moisture FROM maxmoisture ORDER BY maxmoisture.ID DESC LIMIT 1');
                                    
    // Process record
    while($m1 = mysqli_fetch_array($M))
        {
            $maxM = $m1['moisture'];
        }
//Moisture readings at real time
 $moisture = mysqli_query($con,'SELECT moisture.moisture FROM moisture ORDER BY moisture.ID DESC LIMIT 1');
                                    
    // Process record
    while($m2 = mysqli_fetch_array($moisture))
        {
            //
            $moist = $m2['moisture'];
            if($moist >= $maxM){
                echo "<span style=\"color: rgb(202, 7, 7);\">".$moist."</span>"."<span class=\"unit\">%</span>";
            }
            else if($moist >=10){
                echo "<span style=\"color: green;\">".$moist."</span>"."<span class=\"unit\">%</span>";
            }
            else
                echo "<span style=\"color: blue;\">".$moist."</span>"."<span class=\"unit\">%</span>";
            //
        }
        // Close the connection
       mysqli_close($con);
 ?>