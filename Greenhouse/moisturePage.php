<?php
    include('C:/xampp/htdocs/Greenhouse/include/paginationConnection.php');
    include('C:/xampp/htdocs/Greenhouse/include/connection.php');
    include './include/title.php';
?>

<!-- <!DOCTYPE html> -->
<!-- <Meta HTTP-EQUIV="Refresh" Content="2; URL=http://localhost/moisture5/Greenhouse/index.php"> -->
<html>
<?php
        $url=$_SERVER['REQUEST_URI'];
        // header("Refresh: 120; URL=$url"); 
        ?>

<head>
    <title>GH-AMS<?php if (isset($title)) {echo "&#8212;{$title}";} ?></title>
    <meta charset="utf-8">
    <link href="fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/brands.css" rel="stylesheet">
    <link href="fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
    <link href="fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/solid.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <link rel="stylesheet" href="style1.css" type="text/css" />
</head>

<body>
    <div class="grid">
        <?php require './include/header.php'; ?>
        <?php require './include/sidemenu.php'; ?>

        <main class="main" id="main1">
            <?php require './include/main_header.php'; ?>

            <div class="main-overview">
                <div class="overviewCard2">
                    <div class="overviewCard-description">
                        <h3 class="overviewCard-title text-light"><strong>WaterPump</strong></h3>
                        <i class="fas fa-water"></i>
                        <span id="state2" class="overviewCard-subtitle"><strong></strong></span>
                    </div>
                </div>
                <div class="overviewCard">
                    <div class="overviewCard-icon overviewCard-icon--photo">
                    </div>
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
                            <strong>Moisture Readings</strong>
                        </div>
                    </div>
                    <!--INCLUSION OF PAGINATION TO THE TABLE-->
                    <?php include('MoistureTable.php');?>

                </div>
                <div class="card">
                    <div class="card__header">
                        <div class="card__header-title text-light">
                            <strong>Moisture Graph At Real-Time</strong>
                            <p>
                                <button class="CType" id="renderBtnLine">Line</button>
                                <button class="CType" id="renderBtnRadar">Radar</button>
                                <button class="CType" id="renderBtnBubble">Bubble</button>
                                <button class="CType" id="renderBtnBar">Bar</button>
                            </p>
                        </div>
                        <div class="card__header-title text-light">
                            <!--<button id="renderBtn" align: right><strong>Re-fresh</strong></button>-->
                        </div>
                    </div>
                    <canvas id="graphCanvas"></canvas>
                    <script src="js/moistureplot.js"></script>
                </div>
            </div>
        </main>
        <?php include './include/footer.php'; ?>
    </div>
    <script src="js/script.js"></script>
</body>
<!-- <script src="js/jquery.min.js"></script>
<script src="js/script.js"></script> -->

</html>

<?php
	$stmt->close();
?>