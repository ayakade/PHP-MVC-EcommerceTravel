<div class="signup">
    <h2>Signup</h2>
    <form id="login" method="post" action="index.php">
        <input type="hidden" name="controller" value="user" />
		<input type="hidden" name="action" value="doSignup" />

        <div class="fieldgroup required">
            <label>Email address</label>
            <input type="text" name="strEmail" value="" />
        </div><!-- .fieldgroup -->

        <div class="fieldgroup required">
            <label>Password</label>
            <input type="text" name="strPassword" value="" />
        </div><!-- .fieldgroup -->

        <input type="submit" value="Login">
    </form>

    <p>Have an account now? <a href="index.php?controller=user&action=login"><strong>Login Now</strong></a></p>

</div><!-- .signup / signup.php -->

