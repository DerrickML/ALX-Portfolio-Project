
<?php
include('./include/connection.php');
//Max-Light Intensity
$maxLight = mysqli_query($con,'SELECT maxlight.LightIntensity FROM maxlight ORDER BY ID DESC LIMIT 1');
                                    
    // Process record
    while($r1 = mysqli_fetch_array($maxLight))
        {
            $ml=$r1['LightIntensity'];
        }
//Light Intensity at real time
 $light = mysqli_query($con,'SELECT moisture.LightIntensity FROM moisture ORDER BY ID DESC LIMIT 1');
                                    
    // Process record
    while($r1 = mysqli_fetch_array($light))
        {
            //
            $m = $r1['LightIntensity'];
            if($m >= $ml){
                echo "<span style=\"color: rgb(202, 7, 7);\">".$m."</span>"."<span class=\"unit\">LUX</span>";
            }
            else if($m >=10){
                echo "<span style=\"color: green;\">".$m."</span>"."<span class=\"unit\">LUX</span>";
            }
            else
                echo "<span style=\"color: blue;\">".$m."</span>"."<span class=\"unit\">LUX</span>";
            //
        }
        // Close the connection
       mysqli_close($con);
 ?>