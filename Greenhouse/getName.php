<?php
include('./include/connection.php');
 $temperature = mysqli_query($con,'SELECT fname, lname FROM members ORDER BY ID DESC LIMIT 1');

    // Process record
    while($r1 = mysqli_fetch_array($temperature))
        {
            // echo $r1['fname']." ".$r1['lname']."!";
            echo ' '.htmlspecialchars($r1['fname'], ENT_QUOTES, 'UTF-8').' '.
                 htmlspecialchars($r1['lname'], ENT_QUOTES, 'UTF-8').'!';
        }
        // Close the connection
       mysqli_close($con);
     //   header('Location: https://alx.rec22test.site/Greenhouse/index.php');
       exit();
 ?>