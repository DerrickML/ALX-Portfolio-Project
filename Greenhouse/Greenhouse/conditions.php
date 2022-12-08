<?php
include ('./include/connection.php');

       //VALUES FROM MAX CONDITION TABLES
    $query1 = mysqli_query($con,'SELECT Moisture FROM maxmoisture ORDER BY ID DESC LIMIT 1');
                                    
       // Process record
    while($r2 = mysqli_fetch_array($query1))
        {
            echo $r2['Moisture'];
            echo ",";
        }

    $query2 = mysqli_query($con,'SELECT LightIntensity FROM maxlight ORDER BY ID DESC LIMIT 1');
                                    
       // Process record
    while($r3 = mysqli_fetch_array($query2))
        {
            echo $r3['LightIntensity'];
            echo ",";
        }
    
    $query3 = mysqli_query($con,'SELECT Temperature FROM maxtemperature ORDER BY ID DESC LIMIT 1');
                                    
       // Process record
    while($r4 = mysqli_fetch_array($query3))
        {
            echo $r4['Temperature'];
            echo ",";
        }

    $query4 = mysqli_query($con,'SELECT Humidity FROM maxhumidity ORDER BY ID DESC LIMIT 1');
                                    
        // Process record
    while($r5 = mysqli_fetch_array($query4))
        {
            echo $r5['Humidity'];
        }
    
    // Close the connection
    mysqli_close($con);
 ?>