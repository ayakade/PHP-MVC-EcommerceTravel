<div class="booking-info">
    <?php
    foreach ($this->oBookings as $booking)
    {
    ?>
    <div class="booking">
        <h3>Booking #<?=$booking->id?> <?=$booking->accommodation?></h3>
        <form method="get" action="index.php">
            <input type="hidden" name="controller" value="admin" />
            <input type="hidden" name="action" value="delete" />
            <input type="hidden" name="id" value="<?=$booking->id?>">
        
            <div class="row">
                <img src="assets/<?=$booking->image?>" alt="<?=$booking->accommodation?>">

                <table>
                    <tr>
                        <th>Customer ID</th>
                        <th>Customer name</th>
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
                        <td><?=$booking->id?></td>
                        <td><?=$booking->name?></td>
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

        <div class="action">
            <a class="cta" href="index.php?controller=admin&action=bookingList">Go back booking list</a>
            <?php
            // if it's upcoming booking add delete btn
            if($booking->status=="upcoming") {
            ?>
            <input class="cta delete" type="submit" value="Delete this booking">
            <?php
            }
            ?>
        </div><!-- .action -->
        <?php
        }
        ?>
    </form>
</div><!-- .booking-info / user-booking.php -->