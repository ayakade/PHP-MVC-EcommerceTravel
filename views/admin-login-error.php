<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-wrapper col-12 col-lg-12">
        <div class="login col-9 col-lg-4">
            <h1>Login</h1>
            <p class="error">Your username and password didn't match</p>
            <!-- <p><?=$this->msg?></p> -->
            <form id="login" method="post" action="index.php">
                <!-- <input type="hidden" name="controller" value="admin" /> -->
                <input type="hidden" name="controller" value="admin" />                
                <input type="hidden" name="action" value="doLogin" />

                <div class="fieldgroup required">
                    <label>Username</label>
                    <input type="text" name="strUsername" value="" />
                </div><!-- .fieldgroup -->

                <div class="fieldgroup required">
                    <label>Password</label>
                    <input type="text" name="strPassword" value="" />
                </div><!-- .fieldgroup -->

                <input class="cta" type="submit" value="Login">
            </form>
        </div><!-- .login / login.php -->
    </div><!-- .wrapper -->
	<script src="https://kit.fontawesome.com/76c00b2855.js" crossorigin="anonymous"></script>
    <!-- <script src="js/login.js"></script> -->

</body>
</html>