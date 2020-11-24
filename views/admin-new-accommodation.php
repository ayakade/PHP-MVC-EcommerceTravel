<div class="accommodation-info">
    <h2>Add a new accommodation</h2>

    <div class="info form">
        <form id="add" method="post" action="index.php" enctype="multipart/form-data">
            <input type="hidden" name="controller" value="admin" />
            <input type="hidden" name="action" value="saveAccommodation" />

            <div class="fieldgroup required">
                <label>* Name</label>
                <input type="text" name="strName" value="" />
                <div class="errorpopup">
                    <p>This field is required</p>
                </div><!-- .error pop up -->
            </div><!-- .fieldgroup -->

            <div class="fieldgroup required">
                <label>* City</label>
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
                <div class="errorpopup required">
                    <p>This field is required</p>
                </div><!-- .error pop up -->
            </div><!-- .fieldgroup -->

            <div class="fieldgroup required">
                <label>* Price</label>
                <input type="text" name="price" value="" />
                <div class="errorpopup">
                    <p>This field is required</p>
                </div><!-- .error pop up -->
            </div><!-- .fieldgroup -->

            <div class="fieldgroup required">
                <label>* Max guest number</label>
                <input type="text" name="maxGuestNumber" value="" />
                <div class="errorpopup">
                    <p>This field is required</p>
                </div><!-- .error pop up -->
            </div><!-- .fieldgroup -->

            <div class="fieldgroup required">
                <label>* Accommodation type</label>
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
                <div class="errorpopup required">
                    <p>* This field is required</p>
                </div><!-- .error pop up -->
            </div><!-- .fieldgroup -->

            <div class="fieldgroup required">
                <label>* Description</label>
                <textarea name="strDescription" value=""></textarea>
                <div class="errorpopup">
                    <p>This field is required</p>
                </div><!-- .error pop up -->
            </div><!-- .fieldgroup -->

            <div class="fieldgroup required">
                <label>* Image</label>
                <input type="file" name="image" value="" />
                <div class="errorpopup">
                    <p>This field is required</p>
                </div><!-- .error pop up -->
            </div><!-- .fieldgroup -->

            <input class="cta" type="submit" value="Save">
        </form>
    </div><!-- .info -->
   
</div><!-- .accommodation-info / admin-new-accommodation.php -->