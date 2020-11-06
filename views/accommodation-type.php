<div class="accommodation-type col-12 col-lg-12">
    <h3>Choose from accommodation type</h3>
    <div class="typeList">
        <?php	
        foreach ($this->oTypes as $type)
        {
        ?>
            <div class="type col-6 col-lg-3">
                <a href="#">
                <p><?=$type->strName?></p>
                </a>
            </div><!-- .type -->  
        <?php
        }
        ?>
    </div><!-- .typeList -->

</div><!-- .accommodation-type / accommodation-type.php -->