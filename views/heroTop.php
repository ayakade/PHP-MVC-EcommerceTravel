<div class="hero">
    <div class="filter">
        <div class="heroImage"></div>
    </div><!-- .filter -->

    <div class="search">
        <h2>Your next trip</h2>

        <form method="post" action="index.php" id="searchForm">
            <input type="hidden" name="controller" value="user" />
            <input type="hidden" name="action" value="doUpdate" />

            <div class="fieldgroup">
                <label>Location</label>
                <input type="text" name="" value="" placeholder="location">
            </div><!-- end of fieldgroup -->

            <div class="fieldgroup">
                <label>Check in</label>
                <input type="date" name="" value="">
            </div><!-- end of fieldgroup -->

            <div class="fieldgroup">
                <label>Check out</label>
                <input type="date" name="" value="">
            </div><!-- end of fieldgroup -->

            <div class="fieldgroup">
                <label>Guests</label>
                <input type="text" name="" value="" placeholder="guest">
            </div><!-- end of fieldgroup -->

            <input class="cta" type="submit" value="Search">
            
        </form>
    </div><!-- .search -->
</div><!-- .hero / heroTop.php -->