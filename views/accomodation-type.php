<div class="accomodation-type col-12 col-lg-12">
    <h3>Choose from accomodation type</h3>
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

</div><!-- .accomodation-type / accomodation-type.php -->