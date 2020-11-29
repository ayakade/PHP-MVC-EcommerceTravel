<?php
// show this for only user page
if($this->controller=="user")
{
?>
<div class="username">
        <h2>Hi <?=$this->oUser->strFirstName?> :)</h2>
        <p>Are you ready for your next trip?</p>
    </div><!-- .username -->
<?php
}
?>

<div class="bookingList">
    <h3>Booking list</h3>
    <div class="row">
        <?=$this->upcomingHTML?>

        <?=$this->pastHTML?>
    </div><!-- .row -->
</div><!-- .bookingList / user-bookings.php -->