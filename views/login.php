<div class="login">
    <h2>Login </h2>
    <form id="login" method="post" action="index.php">
        <input type="hidden" name="controller" value="user" />
		<input type="hidden" name="action" value="doLogin" />

        <div class="fieldgroup required">
            <label>Email address</label>
            <input type="text" name="strEmail" value="" />
            <div class="errorpopup">
                <p>This field is required</p>
            </div><!-- .errorpopup -->
        </div><!-- .fieldgroup -->

        <div class="fieldgroup required">
            <label>Password</label>
            <input type="text" name="strPassword" value="" />
            <div class="errorpopup">
                <p>This field is required</p>
            </div><!-- .errorpopup -->
        </div><!-- .fieldgroup -->

        <input type="submit" value="Login">
    </form>

</div><!-- .login / login.php -->

