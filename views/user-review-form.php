<?php
foreach ($this->oBookings as $booking)
{
?>
<div class="reviews">
    <h3>Write a review</h3>
    <form id="review" method="post" action="index.php">
        <input type="hidden" name="controller" value="user" />                
        <input type="hidden" name="action" value="writeReview" />

        <input type="hidden" name="accommodationId" value="<?=$booking->accommodationId?>">
        <input type="hidden" name="userId" value="<?=$_SESSION["userId"]?>">

        <div class="fieldgroup required">
            <label>Rate</label>
            <select name="rates">
                <option value="1">1 (Bad)</option>
                <option value="2">2 (Not good)</option>
                <option value="3">3 (Okay)</option>
                <option value="4">4 (Good)</option>
                <option value="5">5 (Great)</option>
            </select>
        </div><!-- .fieldgroup -->

        <div class="fieldgroup required">
            <label>Comment</label>
            <textarea name="comments" value=""></textarea>
        </div><!-- .fieldgroup -->

        <input class="cta" type="submit" value="Write a review">
    </form>
</div><!-- .reviews -->
<?php
}
?>