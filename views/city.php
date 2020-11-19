<div class="city-accommodation col-12 col-lg-12">
    <?php	
    foreach ($this->oCities as $city)
    {
    ?>
    <h2><?=$city->city?></h2>
    <?php
    }
    ?>
    <div class="accommodations">
        <?php	
        foreach ($this->oCities as $city)
        {
        ?>
        <div class="accommodation">
            <a href="index.php?controller=public&action=accommodation">
                <img src="assets/<?=$city->image?>" alt="<?=$city->strName?>">
                <div class="title">
                    <h3><?=$city->strName?></h3>
                    <p>$<?=$city->price?>/night</p>
                    <div class="cta">Check detail</div>
                </div><!-- .title -->
            </a>
        </div><!-- .accommodation -->  
        <?php
        }
        ?>
    </div><!-- .accommodations -->
</div><!-- .city-accommodation / city.php -->