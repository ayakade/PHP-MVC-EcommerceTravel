<div class="signup form">
    <h2>Signup</h2>
    <form id="signup" method="post" action="index.php">
        <input type="hidden" name="controller" value="user" />
        <input type="hidden" name="action" value="doSignup" />
        
        <div class="fieldgroup required">
            <label>First name</label>
            <input type="text" name="strFirstName" value="" placeholder="first name" />
            <div class="errorpopup">
                <p>This field is required</p>
            </div><!-- .error pop up -->
        </div><!-- .fieldgroup -->

        <div class="fieldgroup required">
            <label>Last name</label>
            <input type="text" name="strLastName" value="" placeholder="last name" />
            <div class="errorpopup">
                <p>This field is required</p>
            </div><!-- .error pop up -->
        </div><!-- .fieldgroup -->

        <div class="fieldgroup required">
            <label>Email address</label>
            <input type="text" name="strEmail" value="" placeholder="email address" />
            <div class="errorpopup">
                <p>This field is required</p>
            </div><!-- .error pop up -->
        </div><!-- .fieldgroup -->

        <div class="fieldgroup required">
            <label>Password</label>
            <input type="password" name="strPassword" value="" placeholder="password" />
            <div class="errorpopup">
                <p>This field is required</p>
            </div><!-- .error pop up -->
        </div><!-- .fieldgroup -->

        <div class="btn"><input class="cta-secondary" type="submit" value="Sign up"></div>
    </form>

    <p>Have an account now? <a href="index.php?controller=user&action=login"><strong>Login Now</strong></a></p>

</div><!-- .signup / signup.php -->

