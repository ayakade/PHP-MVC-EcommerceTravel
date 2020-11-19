<div class="city-recommend col-12 col-lg-12">
    <h3>Find from destinations</h3>
    <div class="cityList">
        <?php	
        foreach ($this->oCities as $city)
        {
        ?>
            <div class="city col-6 col-lg-4">
                <a href="index.php?controller=public&action=city&cId=<?=$city->id?>">
                    <img src="imgs/<?=$city->strImage?>" alt="<?=$city->strName?>">
                    <p><?=$city->strName?></p>
                </a>
            </div><!-- .city -->  
        <?php
        }
        ?>
    </div><!-- .cityList -->
</div><!-- .city-recommend / city-recommend.php -->