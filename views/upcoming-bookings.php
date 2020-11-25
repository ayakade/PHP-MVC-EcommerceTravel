<div class="bookings upcoming-bookings">
    <h4><?=$this->title?> upcoming trip</h4>
    <?php
    foreach ($this->oBookings as $booking)
    {
    ?>
    <div class="booking">
        <a href="index.php?controller=<?=$this->controller?>&action=booking&bId=<?=$booking->id?>&status=<?=$booking->status?>">
        <div class="row">
            <p>#<?=$booking->id?> <?=$booking->accommodation?></p>
            <p><?=$booking->city?></p>
            <p><?=$booking->checkin?> <?=$booking->checkout?></p>
        </div><!-- .row -->
        </a>
    </div><!-- .booking -->
    <?php
    }
    ?>
</div><!-- .upcoming-bookings / upcoming-bookings.php -->