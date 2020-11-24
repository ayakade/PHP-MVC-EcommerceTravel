<div class="city-accommodation col-12 col-lg-12">
    <?php	
    foreach ($this->oCities as $city)
    {
    ?>
    <h2><?=$city->strName?></h2>
    <?php
    }
    ?>

    <?=$this->resultHTML?>
    
</div><!-- .city-accommodation / city.php -->