<div class="accommodation-info">
    <h2>Add a new accommodation</h2>

    <div class="info">
        <form method="post" action="index.php" enctype="multipart/form-data">
            <input type="hidden" name="controller" value="admin" />
            <input type="hidden" name="action" value="saveAccommodation" />

            <div class="fieldgroup">
                <label>Name</label>
                <input type="text" name="strName" value="" />
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>City</label>
                <select name="city">
                <?php	
                foreach ($this->oCities as $city)
                { 
                ?>
                    <option value="<?=$city->id?>"><?=$city->strName?></option>
                <?php
                }
                ?>
                </select>
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Price</label>
                <input type="text" name="price" value="" />
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Max guest number</label>
                <input type="text" name="maxGuestNumber" value="" />
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Accommodation type</label>
                <?php	
                foreach ($this->oTypes as $type)
                { 
                ?>
                <div class="checkbox">
                    <input type="checkbox" name="type[]" value="<?=$type->id?>" />
                    <span><?=$type->strName?></span>
                </div><!-- .checkbox -->
                <?php
                }
                ?>
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Description</label>
                <textarea name="strDescription" value=""></textarea>
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Image</label>
                <input type="file" name="image" value="" />
            </div><!-- .fieldgroup -->

            <input class="cta" type="submit" value="Save">
        </form>
    </div><!-- .info -->
   
</div><!-- .accommodation-info / admin-new-accommodation.php -->