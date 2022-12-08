<?php ob_start();
try{
    include './include/paginationConnection.php';
    include './include/connection.php';
    include './include/title.php';
    $header = './include/header.php';
    $sidemenu = './include/sidemenu.php';
    $main_header = './include/main_header.php';
    // $Results_Table = './include/Results_Table.php';
    $PaginationTable = 'PaginationTable.php';
    $footer = './include/footer.php';
?>

<!-- <!DOCTYPE html> -->
<!-- <Meta HTTP-EQUIV="Refresh" Content="2; URL=https://alx.rec22test.site/Greenhouse/index.php"> -->
<html>
<?php
        $url=$_SERVER['REQUEST_URI'];
        // header("Refresh: 120; URL=$url"); 
?>

<head>
    <title>GH-AMS<?php if (isset($title)) {echo "&#8212;{$title}";} ?></title>
    <meta charset="utf-8">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link href="fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/brands.css" rel="stylesheet">
    <link href="fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
    <link href="fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/solid.css" rel="stylesheet">
    
    <!-- <script src="js/jquery.min.js"></script> -->
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <link rel="stylesheet" href="style1.css" type="text/css" />
</head>

<body>
    <div class="grid">
        <?php require $header; ?>
        <?php require $sidemenu; ?>

        <main class="main" id="main1">
            <?php require $main_header; ?>
            <div class="main-overview2">
                <div class="overviewCard2">
                    <div class="overviewCard-description">
                        <h3 class="overviewCard-title text-light"><strong>Light State</strong></h3>
                        <i class="far fa-lightbulb"></i>
                        <span id="state0" class="overviewCard-subtitle"><strong></strong></span>
                    </div>
                </div>
                <div class="overviewCard2">
                    <div class="overviewCard-description">
                        <h3 class="overviewCard-title text-light"><strong>WaterPump</strong></h3>
                        <i class="fas fa-water"></i>
                        <span id="state2" class="overviewCard-subtitle"><strong></strong></span>
                    </div>
                </div>
                <div class="overviewCard2">
                    <div class="overviewCard-description">
                        <h3 class="overviewCard-title text-light"><strong>Fan</strong></h3>
                        <i class="fas fa-fan"></i>
                        <span id="state3" class="overviewCard-subtitle"><strong></strong></span>
                    </div>
                </div>
            </div>

            <div class="main-overview">
                <div class="overviewCard">
                    <a href="https://alx.rec22test.site/Greenhouse/lightPage.php">
                        <div class="overviewCard-icon overviewCard-icon--document"></div>
                    </a>
                    <div class="overviewCard-description">
                        <h3 class="overviewCard-title text-light"><strong>Light Intensity</strong></h3>
                        <p id="readings1" class="overviewCard-subtitle"></p>
                        <div class="overviewCard-subtitle1 fas fa-angle-down"><span id="minL"></span><span id="maxL" class="overviewCard-subtitle2"></span></div>
                    </div>
                    <!-- <div>
                        <div id="minL" class="overviewCard-subtitle1">10</div>
                        <div id="maxL" class="overviewCard-subtitle2"></div>
                    </div> -->
                </div>
                <div class="overviewCard">
                    <a href="https://alx.rec22test.site/Greenhouse/humidPage.php">
                        <div class="overviewCard-icon overviewCard-icon--calendar"></div>
                    </a>
                    <div class="overviewCard-description">
                        <h3 class="overviewCard-title text-light"><strong>Humidity</strong></h3>
                        <p id="readings2" class="overviewCard-subtitle"></p>
                        <!-- <p id="minH" class="overviewCard-subtitle1">10<span id="maxH" class="overviewCard-subtitle2"></span></p> -->
                        <div class="overviewCard-subtitle1 fas fa-angle-down"><span id="minH"></span><span id="maxH" class="overviewCard-subtitle2"></span></div>
                    </div>
                    <!-- <div>
                        <div id="minH" class="overviewCard-subtitle1">10</div>
                        <div id="maxH" class="overviewCard-subtitle2"></div>
                    </div> -->
                </div>
                <div class="overviewCard">
                    <a href="https://alx.rec22test.site/Greenhouse/tempPage.php">
                        <div class="overviewCard-icon overviewCard-icon--mail">
                        </div>
                    </a>
                    <div class="overviewCard-description">
                        <h3 class="overviewCard-title text-light"><strong>Temperature</strong></h3>
                        <p id="readings3" class="overviewCard-subtitle"></p>
                        <!-- <p id="minT" class="overviewCard-subtitle1">10<span id="maxT" class="overviewCard-subtitle2"></span></p> -->
                        <div class="overviewCard-subtitle1 fas fa-angle-down"><span id="minT"></span><span id="maxT" class="overviewCard-subtitle2"></span></div>
                    </div>
                    <!-- <div>
                        <div id="minT" class="overviewCard-subtitle1">10</div>
                        <div id="maxT" class="overviewCard-subtitle2"></div>
                    </div> -->
                </div>
                <div class="overviewCard">
                    <a href="https://alx.rec22test.site/Greenhouse/moisturePage.php">
                        <div class="overviewCard-icon overviewCard-icon--photo"></div>
                    </a>
                    <div class="overviewCard-description">
                        <h3 class="overviewCard-title text-light"><strong>Moisture</strong></h3>
                        <p id="readings4" class="overviewCard-subtitle"></p>
                        <!-- <p id="minM" class="overviewCard-subtitle1">10<span id="maxM" class="overviewCard-subtitle2"></span></p> -->
                        <div class="overviewCard-subtitle1 fas fa-angle-down"><span id="minM"></span><span id="maxM" class="overviewCard-subtitle2"></span></div>
                    </div>
                    <!-- <div>
                        <div id="minM" class="overviewCard-subtitle1">10</div>
                        <div id="maxM" class="overviewCard-subtitle2"></div>
                    </div> -->
                </div>

                <script src="js/refresh.js"></script>

            </div> <!-- /.main__overview -->

            <div class="main-cards">
                <div class="card">
                    <div class="card__header">
                        <div class="card__header-title text-light">
                            <strong>Table For Greenhouse Readings</strong>
                        </div>
                    </div>
                    
                    <!--INCLUSION OF PAGINATION TO THE TABLE-->
                    <?php include $PaginationTable;?>

                </div>
                <div class="card">
                    <div class="card__header">
                        <div class="card__header-title text-light">
                            <strong>Graph for Readings At Real-Time</strong>
                            <p>
                                <button class="CType" id="renderBtnLine">Line</button>
                                <button class="CType" id="renderBtnRadar">Radar</button>
                                <button class="CType" id="renderBtnBubble">Bubble</button>
                                <button class="CType" id="renderBtnBar">Bar</button>
                            </p>
                        </div>
                        <div class="card__header-title text-light">
                            <!-- <button id="renderBtn" align: right><strong>Re-fresh</strong></button> -->
                        </div>
                    </div>
                    <canvas id="graphCanvas"><script src="js/plot.js"></script></canvas>
                    <!-- <script src="js/plot.js"></script> -->
                    
                </div>
            </div>
        </main>
        <?php include $footer; ?>
        
    </div>
    <script src="js/script.js"></script>
</body>
<!-- <script src="js/jquery.min.js"></script>
<script src="js/script.js"></script> -->

</html>
<?php } catch (Exception $e) {
    ob_end_clean();
header('Location: https://alx.rec22test.site/Greenhouse/error.php');
} 
ob_end_flush();
?>