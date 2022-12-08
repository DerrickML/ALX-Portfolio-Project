<?php
    include_once 'web_header.php';
?>
    <section class="login-form" >
        <div class="container">
            <div class="auth-form">
                <form action="include/signup.inc.php" method="post">
                    <h2>Create Account</h2>
                     <div class="inputBox">
                        <input type="text" id="username" name="first" required>
                        <span>First Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" id="username" name="last" required>
                        <span>Last Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" id="username" name="email" required>
                        <span>Email Address</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" id="create-username" name="uname" required>
                        <span>Username</span>
                    </div>
                    <div class="inputBox">
                        <input type="password" id="create-password" name="pwd" required>
                        <span>Password</span>
                    </div>
                        <div class="inputBox">
                        <input type="submit" name="submit" value="Sign up">
                    </div>
                    <div id="feedback"></div>
                </form>
            </div>
        </div>
    </section>
    
<script src="js/authentication.js"></script>

<?php
    include_once 'web_footer.php';
?>
