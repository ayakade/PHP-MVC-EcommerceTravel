<div class="accommodation-info">
    <?php	
    foreach ($this->oAccommodations as $accommodation)
    { 
    ?>
    <div class="title">
        <h2><?=$accommodation->strName?></h2>
        <a class="cta" href="index.php?controller=public&action=accommodation&aId=<?=$accommodation->id?>" target="_blank" rel="noopener noreferrer">view page</a>
    </div><!-- .title -->

    <div class="info">
        <form id="update" method="post" action="index.php" enctype="multipart/form-data">
            <input type="hidden" name="controller" value="admin" />
            <input type="hidden" name="action" value="update" />

            <div class="fieldgroup">
                <label>Name</label>
                <input type="text" name="strName" value="<?=$accommodation->strName?>" />
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>City</label>
                <select name="city">
                <?php	
                foreach ($this->oCities as $city)
                { 
                    $selected = ($accommodation->cityId == $city->id)? "selected" : "";
                ?>
                    <option value="<?=$city->id?>" <?=$selected?>><?=$city->strName?></option>
                <?php
                }
                ?>
                </select>
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Price</label>
                <input type="text" name="price" value="<?=$accommodation->price?>" />
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Max guest number</label>
                <input type="text" name="maxGuestNumber" value="<?=$accommodation->maxGuestNumber?>" />
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Accommodation type</label>
                <?php
                foreach ($this->oTypes as $type)
                { 
                    // $checked = ($this->oCategories->typeID == $type->id)? "checked" : "";
                ?>
                <div class="checkbox">
                    <input type="checkbox" name="type[]" value="<?=$type->id?> <?=$checked?>"/>
                    <span><?=$type->strName?></span>
                </div><!-- .checkbox -->
                <?php
                }
                ?>
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Description</label>
                <textarea name="strDescription" value="<?=$accommodation->strDescription?>"><?=$accommodation->strDescription?></textarea>
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Image</label>
                <img src="assets/<?=$accommodation->image?>" alt="<?=$accommodation->strName?>">
                <input type="file" name="image1" value="<?=$accommodation->image?>" />
            </div><!-- .fieldgroup -->

            <input class="cta" type="submit" value="Save">
        </form>
    </div><!-- .info -->

    <?php
    }
    ?>
   
</div><!-- .accommodation-info / admin-accommodation.php -->