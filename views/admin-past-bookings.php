<div class="bookings past-bookings">
    <h4>All past trip</h4>
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
</div><!-- .past-bookings / user-past-bookings.php -->