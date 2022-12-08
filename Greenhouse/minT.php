<?php
include('./include/connection.php');
 $minT = mysqli_query($con,'SELECT Temperature FROM mintemperature ORDER BY ID DESC LIMIT 1');
                                    
    // Process record
    while($r1 = mysqli_fetch_array($minT))
        {
            echo $r1['Temperature'];
        }
        // Close the connection
       mysqli_close($con);
 ?>