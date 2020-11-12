<div class="bookings upcoming-bookings">
    <h4>All upcoming trip</h4>
    <?php
    foreach ($this->oBookings as $booking)
    {
    ?>
    <div class="booking">
        <a href="index.php?controller=admin&action=booking&bId=<?=$booking->id?>">
        <p><?=$booking->accommodation?></p>
        </a>
    </div><!-- .booking -->
    <?php
    }
    ?>
</div><!-- .upcoming-bookings / user-upcoming-bookings.php -->