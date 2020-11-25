<div class="search">
    <h2>Find a booking with booking number</h2>
    <form id="admin-search" method="get" action="index.php">
        <input type="hidden" name="controller" value="admin" />                
        <input type="hidden" name="action" value="search" />

        <div class="fieldgroup required">
            <label>Booking number</label>
            <input type="text" name="id" value="" placeholder="booking number"/>
        </div><!-- .fieldgroup -->

        <input class="cta" type="submit" value="Search">
    </form>
</div><!-- .search / admin-search.php -->