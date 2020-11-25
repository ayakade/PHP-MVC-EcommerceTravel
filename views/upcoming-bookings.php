<div class="bookings upcoming-bookings">
    <h4><?=$this->title?> upcoming trip</h4>
    <?php
    foreach ($this->oBookings as $booking)
    {
    ?>
    <div class="booking">
        <a href="index.php?controller=<?=$this->controller?>&action=booking&bId=<?=$booking->id?>&status=<?=$booking->status?>">
        <p><?=$booking->accommodation?></p>
        </a>
    </div><!-- .booking -->
    <?php
    }
    ?>
</div><!-- .upcoming-bookings / upcoming-bookings.php -->