<?php
    include_once 'web_header.php';
?>
    <section class="login-form" >
        <div class="container">
            <div class="auth-form">
                <form action="include/login.inc.php" method="post">
                    <h2>Login</h2>
                    <div class="inputBox">
                        <input type="text" id="uid" name="uid" required>
                        <span>Username</span>
                    </div>
                    <div id="feedback"></div>
                    <div class="inputBox">
                        <input type="password" id="pwd" name="pwd" required>
                        <span>Password</span>
                    </div>
                        <div class="inputBox">
                        <input type="submit" name="submit" value="LogIn">
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <script src="js/authentication.js"></script>
<<?php
    include_once 'web_footer.php';
?>

