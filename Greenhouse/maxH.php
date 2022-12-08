<?php
include('./include/connection.php');
 $hum = mysqli_query($con,'SELECT Humidity FROM maxhumidity ORDER BY ID DESC LIMIT 1');
                                    
    // Process record
    while($r1 = mysqli_fetch_array($hum))
        {
            echo "-".$r1['Humidity']."<span class=\"x fas fa-angle-up\"></span>";
        }
        // Close the connection
       mysqli_close($con);
 ?>