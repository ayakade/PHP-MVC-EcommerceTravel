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
        <div class="images">
            <a data-fancybox="gallery" href="assets/<?=$accommodation->image?>"><img src="assets/<?=$accommodation->image?>" alt="<?=$accommodation->strName?>"></a>
            <div class="small-images">
                <a data-fancybox="gallery" href="assets/<?=$accommodation->image2?>"><img src="assets/<?=$accommodation->image2?>" alt="<?=$accommodation->strName?>"></a>
                <a data-fancybox="gallery" href="assets/<?=$accommodation->image3?>"><img src="assets/<?=$accommodation->image3?>" alt="<?=$accommodation->strName?>"></a>
                <a data-fancybox="gallery" href="assets/<?=$accommodation->image4?>"><img src="assets/<?=$accommodation->image4?>" alt="<?=$accommodation->strName?>"></a>
                <a data-fancybox="gallery" href="assets/<?=$accommodation->image5?>"><img src="assets/<?=$accommodation->image5?>" alt="<?=$accommodation->strName?>"></a>
            </div><!-- .small images -->
        </div><!-- .images -->

        <div class="info">
            <form class="booking" id="booking" method="post" action="index.php">
                <input type="hidden" name="controller" value="user" />
                <input type="hidden" name="action" value="goCheckout" />

                <input type="hidden" name="accommodationId" value="<?=$accommodation->id?>" />

                <p>$<strong><?=$accommodation->price?></strong>/night</p>
                <input type="hidden" id="price" class="calculate" name="price" value="<?=$accommodation->price?>" />

                <div class="row">
                    <div class="fieldgroup required">
                        <label>Check-in</label>
                        <input type="date" id="checkin" class="calculate" name="checkin" value="<?=$this->checkin?>" />
                        <div class="errorpopup">
                            <p>This field is required</p>
                        </div><!-- .error pop up -->
                    </div><!-- .fieldgroup -->

                    <div class="fieldgroup required">
                        <label>Check-out</label>
                        <input type="date" id="checkout" class="calculate" name="checkout" value="<?=$this->checkout?>" />
                        <div class="errorpopup">
                            <p>This field is required</p>
                        </div><!-- .error pop up -->
                    </div><!-- .fieldgroup -->
                </div><!-- .row -->

                <div class="fieldgroup required">
                    <label>Guest number</label>
                    <input type="text" id="guest" name="guest" value="<?=$this->guest?>" />
                    <div class="errorpopup">
                        <p>This field is required</p>
                    </div><!-- .error popup -->
                </div><!-- .fieldgroup -->

                <input class="cta" type="submit" value="Book now">

                <div class="price">
                </div><!-- .price -->
            </form>

            <div class="detail">
                <p><?=$accommodation->strDescription?></p>
        
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
            </div><!-- .detail -->
        </div><!-- .info -->
    </div><!-- .accommodation -->
    <?php
    }
    ?>
</div><!-- .accomodation-info / accommodation.php -->