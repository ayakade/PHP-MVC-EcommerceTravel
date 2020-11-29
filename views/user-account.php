<div class="account">
    <h3>Your account info</h3>

    <form method="post" action="index.php" id="accountInfo">
        <input type="hidden" name="controller" value="user" />
		<input type="hidden" name="action" value="doUpdate" />
        <input type="hidden" name="id" value="<?=$this->oUser->id?>"/>
        

        <div class="fieldgroup">
            <label>First name</label>
            <input type="text" name="strFirstName" value="<?=$this->oUser->strFirstName?>">
        </div><!-- end of fieldgroup -->

        <div class="fieldgroup">
            <label>Last name</label>
            <input type="text" name="strLastName" value="<?=$this->oUser->strLastName?>">
        </div><!-- end of fieldgroup -->

        <div class="fieldgroup">
            <label>Email address</label>
            <input type="text" name="strEmail" value="<?=$this->oUser->strEmail?>">
        </div><!-- end of fieldgroup -->

        <div class="fieldgroup">
            <label>PhoneNumber</label>
            <input type="text" name="strPhoneNumber" value="<?=$this->oUser->strPhoneNumber?>">
        </div><!-- end of fieldgroup -->

        <div class="btn"><input class="cta" type="submit" value="Update info"></div>
        
    </form>
</div><!-- .account / user-account.php -->