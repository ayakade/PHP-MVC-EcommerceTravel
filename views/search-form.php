<form method="get" action="index.php" id="searchForm" class="search">
    <input type="hidden" name="controller" value="public" />
    <input type="hidden" name="action" value="search" />

    <div class="fieldgroup required">
        <label>Location</label>
        <input type="text" class="location" name="location" value="<?=$this->location?>" placeholder="location">
        <div class="suggest"></div>
        <div class="errorpopup">
            <p>This field is required</p>
        </div><!-- .error pop up -->
    </div><!-- end of fieldgroup -->

    <div class="fieldgroup required">
        <label>Check in</label>
        <input type="date" id="checkin" name="checkin" value="<?=$this->checkin?>">
        <div class="errorpopup">
            <p>This field is required</p>
        </div><!-- .error pop up -->
    </div><!-- end of fieldgroup -->

    <div class="fieldgroup required">
        <label>Check out</label>
        <input type="date" id="checkout" name="checkout" value="<?=$this->checkout?>">
        <div class="errorpopup">
            <p>This field is required</p>
        </div><!-- .error pop up -->
    </div><!-- end of fieldgroup -->

    <div class="fieldgroup required">
        <label>Guests</label>
        <input type="text" id="guest" name="guest" value="<?=$this->guest?>" placeholder="guest">
        <div class="errorpopup">
            <p>This field is required</p>
        </div><!-- .error pop up -->
    </div><!-- end of fieldgroup -->

    <input class="cta" type="submit" value="Search">
</form>