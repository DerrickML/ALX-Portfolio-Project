<?php
include('./include/connection.php');
//Max-Temp
$maxt = mysqli_query($con,'SELECT maxtemperature.Temperature FROM maxtemperature ORDER BY ID DESC LIMIT 1');
                                    
// Process record
while($mt1 = mysqli_fetch_array($maxt))
    {
        $MaxTemp = $mt1['Temperature'];
    }

//Real-Time Temp
 $temperature = mysqli_query($con,'SELECT moisture.Temperature FROM moisture ORDER BY ID DESC LIMIT 1');
                                    
    // Process record
    while($r1 = mysqli_fetch_array($temperature))
        {
            $t = $r1['Temperature'];
            if($t >= $MaxTemp){
                echo "<span style=\"color: rgb(202, 7, 7);\">".$t."</span>"."<span class=\"unit\">&deg;C</span>";
            }
            else if($t >=10){
                echo "<span style=\"color: green;\">".$t."</span>"."<span class=\"unit\">&deg;C</span>";
            }
            else
                echo "<span style=\"color: blue;\">".$t."</span>"."<span class=\"unit\">&deg;C</span>";
        }
        // Close the connection
       mysqli_close($con);
 ?>