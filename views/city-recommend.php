<div class="city-recommend col-12 col-lg-12">
    <h3>City reccomendation</h3>
    <div class="cityList">
        <?php	
        foreach ($this->oCities as $city)
        {
        ?>
            <div class="city col-6 col-lg-3">
                <a href="#">
                <p><?=$city->strName?></p>
                </a>
            </div><!-- .city -->  
        <?php
        }
        ?>
    </div><!-- .cityList -->
</div><!-- .city-recommend / city-recommend.php -->