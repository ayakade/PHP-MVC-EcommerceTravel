<div class="accommodations">
    <?php
    foreach ($this->oAccommodations as $accommodation)
    {
    ?>
        <div class="accommodation">
            <a href="index.php?controller=public&action=accommodation&aId=<?=$accommodation->id?>">
                <img src="assets/<?=$accommodation->image?>" alt="<?=$accommodation->strName?>">
                <div class="title">
                    <h3><?=$accommodation->strName?></h3>
                    <p><?=$accommodation->city?>, <?=$accommodation->country?></p>
                    <p>$<?=$accommodation->price?>/night</p>
                    <div class="cta">Check detail</div>
                </div><!-- .title -->
            </a>
        </div><!-- .accommodation -->  
    <?php
    }
    ?>
</div><!-- .accommodations / accommodation.php-->