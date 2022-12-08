
<?php
include('./include/connection.php');
 $BulbState = mysqli_query($con,'SELECT * FROM moisture ORDER BY ID DESC LIMIT 1');
                                    
    // Process record
    while($r1 = mysqli_fetch_array($BulbState))
        {
            echo $r1['BulbState'];
        }
        // Close the connection
       mysqli_close($con);
 ?>