<div class="accommodation-info">
    <?php
    foreach ($this->oAccommodations as $accommodation)
    {
    ?>
    <div class="title">
        <h2><?=$accommodation->strName?></h2>
        <p><?=$accommodation->city?>, <?=$accommodation->country?></p>
    </div><!-- .title --> 
    <div class="accommodation">
        <div class="info">
            <img src="assets/<?=$accommodation->image?>" alt="<?=$accommodation->strName?>">

            <form class="booking" id="booking" method="post" action="index.php">
                <p>$<strong><?=$accommodation->price?></strong>/night</p>

                <div class="row">
                    <div class="fieldgroup required">
                        <label>Check-in</label>
                        <input type="date" name="checkin" value="" />
                    </div><!-- .fieldgroup -->

                    <div class="fieldgroup required">
                        <label>Check-out</label>
                        <input type="date" name="checkout" value="" />
                    </div><!-- .fieldgroup -->
                </div><!-- .row -->

                <div class="fieldgroup required">
                    <label>Guest number</label>
                    <input type="text" name="guestNumber" value="" />
                </div><!-- .fieldgroup -->

                <input class="cta" type="submit" value="Book now">
            </form>
            <div class="row">
                <p><?=$accommodation->strDescription?></p>
            </div><!-- .row -->
        </div><!-- .info -->
    <?php
    }
    ?>
        <div class="reviews">
            <h3>Reviews</h3>
            <?php
            foreach ($this->oReviews as $review)
            {
            ?>
            <div class="review">
                <div class="row">
                    <p><strong><?=$review->rates?>/5 <?=$review->name?></strong></p>
                </div><!-- .row -->
                <p><?=$review->comments?></p>
            </div><!-- .review -->
            <?php
            }
            ?>
        </div><!-- .reviews --> 
    </div><!-- .accommodation -->
   
</div><!-- .accomodation-info / accommodation.php -->