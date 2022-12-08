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
                        <h3 class="overviewCard-title text-light"><strong>Light State</strong></h3>
                        <i class="far fa-lightbulb"></i>
                        <span id="state0" class="overviewCard-subtitle"><strong></strong></span>
                    </div>
                </div>
                <div class="overviewCard">
                    <a>
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
                    <?php include('LightTable.php');?>

                </div>
                <div class="card">
                    <div class="card__header">
                        <div class="card__header-title text-light">
                            <strong>Light Readings At Real-Time</strong>
                            <p>
                                <button class="CType" id="renderBtnLine">Line</button>
                                <button class="CType" id="renderBtnRadar">Radar</button>
                                <button class="CType" id="renderBtnBubble">Bubble</button>
                                <button class="CType" id="renderBtnBar">Bar</button>
                            </p>
                        </div>
                        <div class="card__header-title text-light">
                        </div>
                    </div>
                    <canvas id="graphCanvas"></canvas>
                    <script src="js/lightplot.js"></script>
                </div>
            </div>
        </main>
        <?php include './include/footer.php'; ?>
    </div>
    <script src="js/script.js"></script>
</body>

</html>

<?php
	$stmt->close();
?>