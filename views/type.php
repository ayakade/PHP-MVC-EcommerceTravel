<div class="type-accommodation col-12 col-lg-12">
    <?php	
    foreach ($this->oTitles as $title)
    {
    ?>
    <h2><?=$title->strName?></h2>
    <?php
    }
    ?>
    
    <?=$this->resultHTML?>

</div><!-- .city-accommodation / city.php -->