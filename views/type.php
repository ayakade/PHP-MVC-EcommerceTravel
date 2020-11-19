<div class="type-accommodation col-12 col-lg-12">
    <?php	
    foreach ($this->oTypes as $type)
    {
    ?>
    <h2><?=$type->type?></h2>
    <?php
    }
    ?>
    <div class="accommodations">
        <?php	
        foreach ($this->oTypes as $type)
        {
        ?>
        <div class="accommodation">
            <a href="index.php?controller=public&action=accommodation">
                <img src="assets/<?=$type->image?>" alt="<?=$type->strName?>">
                <div class="title">
                    <h3><?=$type->strName?></h3>
                    <p><?=$type->city?>, <?=$type->country?></p>
                    <p>$<?=$type->price?>/night</p>
                    <div class="cta">Check detail</div>
                </div><!-- .title -->
            </a>
        </div><!-- .accommodation -->  
        <?php
        }
        ?>
    </div><!-- .accommodations -->
</div><!-- .city-accommodation / city.php -->