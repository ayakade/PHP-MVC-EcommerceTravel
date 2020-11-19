<div class="booking-info">
    <div class="row">
        <?php
        foreach ($this->oBookings as $booking)
        {
        ?>
        <div class="booking">
            <h3>Booking #<?=$booking->id?> <?=$booking->accommodation?></h3>
            <div class="row">
                <img src="assets/<?=$booking->image?>" alt="<?=$booking->accommodation?>">

                <table>
                    <tr>
                        <th>Check in</th>
                        <th>Check out</th>
                        <th>Total stay</th>
                        <th>Guest number</th>
                        <th>Subtotal</th>
                        <th>Discount code</th>
                        <th>Discount</th>
                        <th>Tax</th>
                        <th>Total</th>
                        <th>Booking date</th>
                    </tr>

                    <tr>
                        <td><?=$booking->checkin?></td>
                        <td><?=$booking->checkout?></td>
                        <td><?=$booking->totalStay?></td>
                        <td><?=$booking->guestNumber?></td>
                        <td>$<?=$booking->subtotal?></td>
                        <td><?=$booking->code?></td>
                        <td>- $<?=$booking->discount?> (<?=$booking->rate?>% off)</td>
                        <td>$<?=$booking->tax?></td>
                        <td>$<?=$booking->total?></td>
                        <td><?=$booking->bookingProcessedDate?></td>
                    </tr>
                </table>
            </div><!-- .row -->
        </div><!-- .booking -->

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
                        <option value="3">3 (okay)</option>
                        <option value="4">4 (good)</option>
                        <option value="5">5 (great)</option>
                    </select>
                </div><!-- .fieldgroup -->

                <div class="fieldgroup required">
                    <label>Comment</label>
                    <textarea name="comments" value=""></textarea>
                </div><!-- .fieldgroup -->

                <input class="cta" type="submit" value="Write a review">
            </form>
            <?php
            }
            ?>
        </div><!-- .reviews -->
    </div><!-- .row -->

    <a class="secondary-cta" href="index.php?controller=user&action=bookingList">Go back booking list</a>

</div><!-- .booking-info / user-booking.php -->