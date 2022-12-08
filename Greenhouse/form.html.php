<?php ob_start();
try{
    include 'include/connection.php';
    include 'include/title.php';
    $header = 'include/header.php';
    $sidemenu = 'include/sidemenu.php';
    $main_header = 'include/main_header.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>Reset Conditions</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <style type="text/css">
        /* textarea {
            display: block;
            width: 100%;
        } */
        </style>
        <link href="fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/fontawesome.css" rel="stylesheet">
        <link href="fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/brands.css" rel="stylesheet">
        <link href="fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
        <link href="fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/solid.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <link rel="stylesheet" href="style1.css" type="text/css" />
    </head>

    <body>
        <div class="grid">
            <?php require $header; ?>
            <?php require $sidemenu; ?>
            <main class="main" id="main1">
                <?php require $main_header; ?>
                <div class="main-cards">
                    <form action="?" method="post">
                        <div>
                            <label for="joketext">Max Moisture:</label>
                            <!-- <textarea id="moisture" name="moisture"></textarea> -->
                            <input id="moisture" name="moisture" placeholder="Input Value..." />
                        </div>
                        <div>
                            <label for="joketext">Max Light Intensity:</label>
                            <!-- <textarea id="light" name="light" rows="3" cols="40"></textarea> -->
                            <input id="light" name="light" placeholder="Input Value..." />
                        </div>
                        <div>
                            <label for="joketext">Max Temperature (&deg;C):</label>
                            <!-- <textarea id="temp" name="temp" rows="3" cols="40"></textarea> -->
                            <input id="temp" name="temp" placeholder="Input Value..." />
                        </div>
                        <div>
                            <label for="joketext">Humidity</label>
                            <!-- <textarea id="humidity" name="humidity" rows="3" cols="40"></textarea> -->
                            <input id="humidity" name="humidity" placeholder="Input Value..." />
                        </div>
                        <div><input type="submit" value="Add" /></div>
                    </form>
                </div>
            </main>
        </div>    
    </body>

</html>