<?php
include('./include/connection.php');
 $minH = mysqli_query($con,'SELECT Humidity FROM minhumidity ORDER BY ID DESC LIMIT 1');
                                    
    // Process record
    while($r1 = mysqli_fetch_array($minH))
        {
            echo $r1['Humidity'];
        }
        // Close the connection
       mysqli_close($con);
 ?>