<div class="accommodation-type col-12 col-lg-12">
    <h3>Who is traveling with you?</h3>
    <div class="typeList">
        <?php	
        foreach ($this->oTypes as $type)
        {
        ?>
            <div class="type col-12 col-lg-4">
                <a href="index.php?controller=public&action=type&tId=<?=$type->id?>">
                    <img src="imgs/<?=$type->strImage?>" alt="<?=$type->strName?>">
                    <p><strong><?=$type->strName?></strong></p>
                </a>
            </div><!-- .type -->  
        <?php
        }
        ?>
    </div><!-- .typeList -->

</div><!-- .accommodation-type / accommodation-type.php -->