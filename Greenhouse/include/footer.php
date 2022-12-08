<footer class="footer">
    <div class="footer__copyright">&copy; 
        <?php
            $startYear = 2019;
            $thisYear = date('Y');
            if ($startYear == $thisYear) {
            echo $startYear;
            } else {
            echo "{$startYear}&ndash;{$thisYear}";
            }
        ?>
        ALX-Portfolio Project: IoT Based Greenhouse Monitoring System
    </div>
    <div class="footer__signature">Made with love by Derrick</div>
</footer>