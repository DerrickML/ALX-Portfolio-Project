<?php
include('./include/connection.php');
//Max-Humidity
$mh = mysqli_query($con,'SELECT maxhumidity.Humidity FROM maxhumidity ORDER BY ID DESC LIMIT 1');
                                    
// Process record
while($h1 = mysqli_fetch_array($mh))
    {
        $maxH = $h1['Humidity'];
    }
//Humidity reading at real time
 $humidity = mysqli_query($con,'SELECT moisture.Humidity FROM moisture ORDER BY ID DESC LIMIT 1');
                                    
    // Process record
    while($h2 = mysqli_fetch_array($humidity))
        {
            //
            $hum = $h2['Humidity'];
            if($hum >= $maxH){
                echo "<span style=\"color: rgb(202, 7, 7);\">".$hum."</span>"."<span class=\"unit\">%</span>";
            }
            else if($hum >=10){
                echo "<span style=\"color: green;\">".$hum."</span>"."<span class=\"unit\">%</span>";
            }
            else
                echo "<span style=\"color: blue;\">".$hum."</span>"."<span class=\"unit\">%</span>";
            //
        }
        // Close the connection
       mysqli_close($con);
 ?>