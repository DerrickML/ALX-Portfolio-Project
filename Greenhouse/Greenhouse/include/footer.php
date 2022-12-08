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
        Final Year Project IoT Based Greenhouse Monitoring System
    </div>
    <div class="footer__signature">Made with love by CS20-01</div>
</footer>