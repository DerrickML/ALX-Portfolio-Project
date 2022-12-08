<?php
//-----------------------------GUARD AGAINST SQLInjection------------------------------------------------
    // if (get_magic_quotes_gpc())
    // {
    //     function stripslashes_deep($value)
    //     {
    //         $value = is_array($value) ?
    //         array_map('stripslashes_deep', $value) :
    //         stripslashes($value);
    //         return $value;
    //     }
    //     $_POST = array_map('stripslashes_deep', $_POST);
    //     $_GET = array_map('stripslashes_deep', $_GET);
    //     $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
    //     $_REQUEST = array_map('stripslashes_deep', $_REQUEST);
    // }
//......................................................................................

//-----------------------------1.0 DATA CAPTURE FROM THE [form.html.php]------------------------------------------------
    if (isset($_GET['addValue']))
    {
        include 'form.html.php';
        exit();
    }
//.....................................................................................
//-----------------------------CONNNECTION TO SERVER--------------------------------------------------
    $link = mysqli_connect('localhost', 'root', '');
    if (!$link)
    {
        $error = 'Unable to connect to the database server.';
        include 'error.html.php';
        exit();
    }

    if (!mysqli_set_charset($link, 'utf8'))
    {
        $output = 'Unable to set database connection encoding.';
        include 'output.html.php';
        exit();
    }
//.........................................................................................
    
//-----------------------------CONNECTION TO DATABASE------------------------------------------------
    if (!mysqli_select_db($link, 'greenhouse'))
    {
        $error = 'Unable to locate the greenhouse database.';
        include 'error.html.php';
        exit();
    }
//........................................................................................

//--------------------------------ADDING DATA TO TABLE 0------------------------------------------------
    if (isset($_POST['moisture'],$_POST['moisture2'],$_POST['light'],$_POST['light2'],$_POST['temp'],$_POST['temp2'],$_POST['humidity'],$_POST['humidity2']))
    // if (isset($_POST['subimt']))
    {
        $moisture = mysqli_real_escape_string($link, $_POST['moisture']);
        $minmoisture = mysqli_real_escape_string($link, $_POST['moisture2']);
        if($moisture<=$minmoisture){
            if(!$moisture=='' && !$minmoisture==''){
                // $value = 'Set Max-Moisture = '.$moisture. ' <p>Set Min-Moisture = ' .$minmoisture.'</p>';
                $error = 'Error! Maximum moisture value must be greater than the Minimum moisture value: ' . mysqli_error($link);
                include 'error.html.php';
                exit();
            }
            elseif ($moisture=='' && !$minmoisture=='') 
            {
                $max1 = mysqli_query($link, 'SELECT Moisture FROM maxmoisture ORDER BY ID DESC LIMIT 1');
                if (!$max1)
                {
                    $error = 'Error fetching Max moisture value: ' . mysqli_error($link);
                    include 'error.html.php';
                    exit();
                }

                while ($row = mysqli_fetch_array($max1))
                {
                    $moisture = $row['Moisture'];
                }

                if ($moisture <= $minmoisture) {
                    $setvals = '<p>MaxVal =' .$moisture. ', MinVal = ' .$minmoisture. '</p>';
                    $error = 'Error! Maximum moisture value must be greater than the Minimum moisture value: ' .$setvals .'<p>'. mysqli_error($link). '</p>';
                    include 'error.html.php';
                    exit();
                }

            }
        }
        
        $light = mysqli_real_escape_string($link, $_POST['light']);
        $minlight = mysqli_real_escape_string($link, $_POST['light2']);
        if($light<=$minlight){
            if(!$light=='' && !$minlight==''){
                $error = 'Error! Maximum light value must be greater than the Minimum light value: ' . mysqli_error($link);
                include 'error.html.php';
                exit();
            }
            elseif ($light=='' && !$minlight=='') 
            {
                $max1 = mysqli_query($link, 'SELECT LightIntensity FROM maxlight ORDER BY ID DESC LIMIT 1');
                if (!$max1)
                {
                    $error = 'Error fetching Max Light value: ' . mysqli_error($link);
                    include 'error.html.php';
                    exit();
                }

                while ($row = mysqli_fetch_array($max1))
                {
                    $light = $row['LightIntensity'];
                }

                if ($light <= $minlight) {
                    $setvals = '<p>MaxVal =' .$light. ', MinVal = ' .$minlight. '</p>';
                    $error = 'Error! Maximum Light value must be greater than the Minimum Light value: ' .$setvals .'<p>'. mysqli_error($link). '</p>';
                    include 'error.html.php';
                    exit();
                }

            }
        }

        $temp = mysqli_real_escape_string($link, $_POST['temp']);
        $mintemp = mysqli_real_escape_string($link, $_POST['temp2']);
        if($temp<=$mintemp){
            if(!$temp=='' && !$mintemp==''){
                $error = 'Error! Maximum temperature value must be greater than the Minimum temperature value: ' . mysqli_error($link);
                include 'error.html.php';
                exit();
            }
            elseif ($temp=='' && !$mintemp=='') 
            {
                $max1 = mysqli_query($link, 'SELECT Temperature FROM maxtemperature ORDER BY ID DESC LIMIT 1');
                if (!$max1)
                {
                    $error = 'Error fetching Max Temperature value: ' . mysqli_error($link);
                    include 'error.html.php';
                    exit();
                }

                while ($row = mysqli_fetch_array($max1))
                {
                    $temp = $row['Temperature'];
                }

                if ($temp <= $mintemp) {
                    $setvals = '<p>MaxVal =' .$temp. ', MinVal = ' .$mintemp. '</p>';
                    $error = 'Error! Maximum Temperature value must be greater than the Minimum Temperature value: ' .$setvals .'<p>'. mysqli_error($link). '</p>';
                    include 'error.html.php';
                    exit();
                }

            }
        }

        $humidity = mysqli_real_escape_string($link, $_POST['humidity']);
        $minhumidity = mysqli_real_escape_string($link, $_POST['humidity2']);
        if($humidity<$minhumidity){
            if(!$humidity=='' && !$minhumidity==''){
                $error = 'Error! Maximum humidity value must be greater than the Minimum humidity value: ' . mysqli_error($link);
                include 'error.html.php';
                exit();
            }
            elseif ($humidity=='' && !$minhumidity=='') 
            {
                $max1 = mysqli_query($link, 'SELECT Humidity FROM maxhumidity ORDER BY ID DESC LIMIT 1');
                if (!$max1)
                {
                    $error = 'Error fetching Max Humidity value: ' . mysqli_error($link);
                    include 'error.html.php';
                    exit();
                }

                while ($row = mysqli_fetch_array($max1))
                {
                    $humidity = $row['Humidity'];
                }

                if ($humidity <= $minhumidity) {
                    $setvals = '<p>MaxVal =' .$humidity. ', MinVal = ' .$minhumidity. '</p>';
                    $error = 'Error! Maximum Humidity value must be greater than the Minimum Humidity value: ' .$setvals .'<p>'. mysqli_error($link). '</p>';
                    include 'error.html.php';
                    exit();
                }

            }
        }

        $sql0 = 'INSERT INTO setconditions SET
                moisture="' . $moisture . '",
                LightIntensity="' . $light . '",
                Temperature="' . $temp . '",
                Humidity="' . $humidity . '"';
        $query0 = mysqli_query($link, $sql0);  
        if (!$query0)
        {
            $error = 'Error adding submitted values: ' . mysqli_error($link);
            include 'error.html.php';
            exit();
        }

        if($light==''){}
        else{
            //CLEAR TABLE
            $Del1 = 'DELETE FROM maxlight';
            $Delquery1 = mysqli_query($link, $Del1);
            //UPDATE TABLE WITH NEW VALUE
            $sql1 = 'INSERT INTO maxlight SET LightIntensity="' . $light . '"';
            $query1 = mysqli_query($link, $sql1);

            if (!$query1 || !$Delquery1)
            {
                $error = 'Error adding submitted value: ' . mysqli_error($link);
                include 'error.html.php';
                exit();
            }
        }

        if($temp==''){}
        else{
            //CLEAR TABLE
            $Del2 = 'DELETE FROM maxtemperature';
            $Delquery2 = mysqli_query($link, $Del2);
            //UPDATE TABLE WITH NEW VALUE
            $sql2 = 'INSERT INTO maxtemperature SET
                    Temperature="' . $temp . '"';
            $query2 = mysqli_query($link, $sql2);

            if (!$query2 || !$Delquery2)
            {
                $error = 'Error adding submitted value: ' . mysqli_error($link);
                include 'error.html.php';
                exit();
            }
        }

        if($moisture==''){}
        else{
            //CLEAR TABLE
            $Del3 = 'DELETE FROM maxmoisture';
            $Delquery3 = mysqli_query($link, $Del3);
            //UPDATE TABLE WITH NEW VALUE
            $sql3 = 'INSERT INTO maxmoisture SET
                    Moisture="' . $moisture . '"';
            $query3 = mysqli_query($link, $sql3);

            if (!$query3 || !$Delquery3)
            {
                $error = 'Error adding submitted value: ' . mysqli_error($link);
                include 'error.html.php';
                exit();
            }
        }

        if($humidity==''){}
        else{
            //CLEAR TABLE
            $Del4 = 'DELETE FROM maxhumidity';
            $Delquery4 = mysqli_query($link, $Del4);
            //UPDATE TABLE WITH NEW VALUE
            $sql4 = 'INSERT INTO maxhumidity SET
                    Humidity="' . $humidity . '"';
            $query4 = mysqli_query($link, $sql4);

            if (!$query4 || !$Delquery4)
            {
                $error = 'Error adding submitted value: ' . mysqli_error($link);
                include 'error.html.php';
                exit();
            }
        }

        //----------------Minimum set values submission-------------------
        if($minmoisture==''){}
        else{
            //CLEAR TABLE
            $del1 = 'DELETE FROM minmoisture';
            $delquery1 = mysqli_query($link, $del1);
            //UPDATE TABLE WITH NEW VALUE
            $minsql1='INSERT INTO minmoisture SET moisture="' . $minmoisture . '"';
            $minquery1=mysqli_query($link, $minsql1);
            if(!$minquery1 || !$delquery1)
            {
                $error = 'Error submitting: ' . mysqli_error($link);
                include 'error.hmtl.php';
                exit();
            }
        }

        if($minlight==''){}
        else{
            //CLEAR TABLE
            $del2 = 'DELETE FROM minlight';
            $delquery2 = mysqli_query($link, $del2);
            //UPDATE TABLE WITH NEW VALUE
            $minsql2='INSERT INTO minlight SET LightIntensity="' . $minlight . '"';
            $minquery2=mysqli_query($link, $minsql2);
            if(!$minquery2 || !$delquery2)
            {
                $error = 'Error submitting: ' . mysqli_error($link);
                include 'error.hmtl.php';
                exit();
            }
        }

        if($minhumidity==''){}
        else{
            //CLEAR TABLE
            $del3 = 'DELETE FROM minhumidity';
            $delquery3 = mysqli_query($link, $del3);
            // if(!$delquery3)
            // {
            //     $error = 'Failed to update: ' . mysqli_error($link);
            //     include 'error.html.php';
            //     exit();
            // }

            //UPDATE TABLE WITH NEW VALUE
            $minsql3='INSERT INTO minhumidity SET Humidity="' . $minhumidity . '"';
            $minquery3=mysqli_query($link, $minsql3);
            if(!$minquery3 || !$delquery3)
            {
                $error = 'Error submitting Min Humidity value: ' . mysqli_error($link);
                include 'error.html.php';
                exit();
            }
        }

        if($mintemp==''){}
        else{
            //CLEAR TABLE
            $del4 = 'DELETE FROM mintemperature';
            $delquery4 = mysqli_query($link, $del4);
            //UPDATE TABLE WITH NEW VALUE
            $minsql4='INSERT INTO mintemperature SET Temperature="' . $mintemp . '"';
            
            $minquery4=mysqli_query($link, $minsql4);
            if(!$minquery4 || !$delquery4)
            {
                $error = 'Error submitting Min Temp value: ' . mysqli_error($link);
                include 'error.hmtl.php';
                exit();
            }
        }

        header('Location: http://localhost/Greenhouse/'); //Redirects to http://localhost/Greenhouse/index.php
        // header('Location: .'); //...........Redirects back
        // exit();
    }
//-----------------------------RETRIEVING FROM TABLE------------------------------------------------
//............Will only run if [header('Location: .');] is executed
    // $result = mysqli_query($link, 'SELECT moisture, LightIntensity, Temperature, Humidity FROM setconditions ORDER BY ID DESC LIMIT 1');
    // if (!$result)
    // {
    //     $error = 'Error fetching values: ' . mysqli_error($link);
    //     include 'error.html.php';
    //     exit();
    // }

    // while ($row = mysqli_fetch_array($result))
    // {
    //     $moisture[] = $row['moisture'];
    //     $light[] = $row['LightIntensity'];
    //     $temp[] = $row['Temperature'];
    //     $humidity[] = $row['Humidity'];
    // }
    // include 'values.html.php';
//............................................................................................
?>