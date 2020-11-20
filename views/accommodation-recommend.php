<div class="accommodation-recommend col-12 col-lg-12">
    <h3>You will love to travel with our accommodations</h3>
    <div class="accommodationList">
        <?php	
        foreach ($this->oAccommodations as $accommodation)
        {
        ?>
            <div class="accommodation col-12 col-lg-3">
                <a href="index.php?controller=public&action=accommodation&aId=<?=$accommodation->id?>">
                    <img src="assets/<?=$accommodation->image?>" alt="<?=$accommodation->strName?>">
                    <h4><?=$accommodation->strName?></h4>
                    <p><?=$accommodation->city?>, <?=$accommodation->country?></p>
                    <p><strong>$<?=$accommodation->price?>/night</strong></p>
                </a>
            </div><!-- .accommodation -->  
        <?php
        }
        ?>
    </div><!-- .accommodationList -->

</div><!-- .accommodation-recommend / accommodation-recommend.php -->