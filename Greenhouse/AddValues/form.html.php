<?php ob_start();
    include './include/connection.php';
    $header = './include/header.php';
    $sidemenu = './include/sidemenu.php';
    $main_header = './include/main_header.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Reset Conditions</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- <style type="text/css">
        textarea {
            display: block;
            width: 100%;
        }
        </style> -->
    <link rel="stylesheet" href="bootstrap-4.5.1/bootstrap-4.5.1/dist/jsbootstrap.min.css" crossorigin="anonymous">
    <link href="https://alx.rec22test.site/Greenhouse/fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/fontawesome.css"
        rel="stylesheet">
    <link href="https://alx.rec22test.site/Greenhouse/fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/brands.css"
        rel="stylesheet">
    <link href="https://alx.rec22test.site/Greenhouse/fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/all.css"
        rel="stylesheet">
    <link href="https://alx.rec22test.site/Greenhouse/fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/solid.css"
        rel="stylesheet">
    <script type="text/javascript" src="https://alx.rec22test.site/Greenhouse/js/jquery-3.4.1.min.js"></script>
    <script src="https://alx.rec22test.site/Greenhouse/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://alx.rec22test.site/Greenhouse/js/Chart.min.js"></script>
    <link rel="stylesheet" href="/Greenhouse/style1.css" type="text/css" />
    <link rel="stylesheet" href="form.html.css" type="text/css" />
</head>

<body>
    <div class="grid">
        <?php require $header; ?>
        <?php require $sidemenu; ?>
        <script src="https://alx.rec22test.site/Greenhouse/js/refresh.js"></script>
        <main class="main" id="main1">
            <?php require $main_header; ?>
            <div class="main-cards">
                <div class="card">
                    <form action="?" method="post">
                        <!-- <div class="inputs">
                                <h3>Moisture</h3>
                                <label for="joketext">Max:</label>
                                <p><input id="moisture" name="moisture" placeholder="Input Value..." /></p>
                                <label for="joketext">Min:</label>
                                <p><input id="moisture2" name="moisture2" placeholder="Input Value..." /></p>
                            </div>
                            <div>
                                <label for="joketext">Max Light Intensity:</label>
                                <p><input id="light" name="light" placeholder="Input Value..." /></p>
                            </div>
                            <div>
                                <label for="joketext">Max Temperature (&deg;C):</label>
                                <p><input id="temp" name="temp" placeholder="Input Value..." /></p>
                            </div>
                            <div>
                                <label for="joketext">Humidity</label>
                                <p><input id="humidity" name="humidity" placeholder="Input Value..." /></p>
                            </div> -->
                        <div class="inputs">
                            <h3>Moisture</h3>
                            <div class="in">
                                <label for="joketext">Max:</label>
                                <span><input id="moisture" name="moisture" placeholder="Input Value..." /></span>
                            </div>

                            <div class="in">
                                <label for="joketext">Min:</label>
                                <span><input class="in2" id="moisture2" name="moisture2" placeholder="Input Value..." /></span>
                            </div>
                        </div>
                        <hr>
                        <div class="inputs">
                            <h3>Light</h3>
                            <div class="in">
                                <label for="joketext">Max:</label>
                                <span><input id="light" name="light" placeholder="Input Value..." /></span>
                            </div>
                            <div class="in">
                                <label for="joketext">Min:</label>
                                <span><input class="in2" id="light2" name="light2" placeholder="Input Value..." /></span>
                            </div>
                        </div>
                        <hr>
                        <div class="inputs">
                            <h3>Temperature(&deg;C)</h3>
                            <div class="in">
                                <label for="joketext">Max:</label>
                                <span><input id="temp" name="temp" placeholder="Input Value..." /></span>
                            </div>
                            <div class="in">
                                <label for="joketext">Min:</label>
                                <span><input class="in2" id="temp2" name="temp2" placeholder="Input Value..." /></span>
                            </div>
                        </div>
                        <hr>
                        <div class="inputs">
                            <h3>Humidity</h3>
                            <div class="in">
                                <label for="joketext">Max</label>
                                <span><input id="humidity" name="humidity" placeholder="Input Value..." /></span>
                            </div>
                            <div class="in">
                                <label for="joketext">Min</label>
                                <span><input class="in2" id="humidity2" name="humidity2" placeholder="Input Value..." /></span>
                            </div>
                        </div>
                        <hr>
                        <div><input type="submit" name="submit" value="Submit" /></div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>