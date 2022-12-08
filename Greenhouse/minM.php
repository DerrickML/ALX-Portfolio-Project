<?php
include('./include/connection.php');
 $minM = mysqli_query($con,'SELECT moisture FROM minmoisture ORDER BY ID DESC LIMIT 1');
                                    
    // Process record
    while($r1 = mysqli_fetch_array($minM))
        {
            echo $r1['moisture'];
        }
        // Close the connection
       mysqli_close($con);
 ?>