<?php
//-----------------------------GUARD AGAINST SQLInjection------------------------------------------------
    if (get_magic_quotes_gpc())
    {
        function stripslashes_deep($value)
        {
            $value = is_array($value) ?
            array_map('stripslashes_deep', $value) :
            stripslashes($value);
            return $value;
        }
        $_POST = array_map('stripslashes_deep', $_POST);
        $_GET = array_map('stripslashes_deep', $_GET);
        $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
        $_REQUEST = array_map('stripslashes_deep', $_REQUEST);
    }
    //-----------------------------1.1 DATA CAPTURE FROM THE [mTempForm.php]------------------------------------------------
if (isset($_GET['addTempValue']))
{
    include 'mTempForm.php';
    exit();
}
//-----------------------------1.1 DATA CAPTURE FROM THE [mLightForm.php]------------------------------------------------
// if (isset($_GET['addLightValue']))
// {
//     include 'mLightForm.php';
//     exit();
// }

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
//--------------------------------1.1 ADDING DATA TO TEMP TABLE------------------------------------------------
if (isset($_POST['Mtemp']))
{
    $Mtemp = mysqli_real_escape_string($link, $_POST['Mtemp']);
    $sql = 'INSERT INTO maxtemperature SET Temperature = "' . $Mtemp . '"';
    
    if (!mysqli_query($link, $sql))
        {
            $error = 'Error adding submitted value(s) in Temperature Table: ' . mysqli_error($link);
            include 'error.html.php';
            exit();
        }
    // header('Location: http://localhost/Greenhouse/'); //...........Redirects back
    exit();
}
//--------------------------------1.1 ADDING DATA TO Light TABLE------------------------------------------------
if (isset($_POST['Mlight']))
{
    $Mlight = mysqli_real_escape_string($link, $_POST['Mlight']);
    $sql = 'INSERT INTO maxlight SET LightIntensity = "' . $Mlight . '"';
    
    if (!mysqli_query($link, $sql))
        {
            $error = 'Error adding submitted value(s) in Light Table: ' . mysqli_error($link);
            include 'error.html.php';
            exit();
        }
    header('Location: http://localhost/Greenhouse/'); //...........Redirects back
    exit();
}
//............All The Code Below Will only run if instead [header('Location: http://localhost/Greenhouse/AddValues/Tindex.php');] above is executed
//-----------------------------RETRIEVING FROM TEMP TABLE------------------------------------------------
    $result = mysqli_query($link, 'SELECT Temperature FROM maxtemperature ORDER BY ID DESC LIMIT 1');
    if (!$result)
    {
        $error = 'Error fetching values: ' . mysqli_error($link);
        include 'error.html.php';
        exit();
    }

    while ($row = mysqli_fetch_array($result))
    {
        $Mtemp[] = $row['Temperature'];
    }
    include 'tvalues.html.php';

//-------------------------------------------------------------------------------------------------
// if (isset($_GET['addLightValue']))
// {
//     include 'mLightForm.php';
//     exit();

    $result = mysqli_query($link, 'SELECT LightIntensity FROM maxlight ORDER BY ID DESC LIMIT 1');
   if (!$result)
  {
    $error = 'Error fetching values: ' . mysqli_error($link);
    include 'error.html.php';
    exit();
  }

  while ($row = mysqli_fetch_array($result))
 {
    $Mlight[] = $row['LightIntensity'];
 }
    include 'lvalues.html.php';
// }
//............................................................................................
?>