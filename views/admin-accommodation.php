<div class="adminAccommodation">
    <h2>Accommodation Page</h2>

    <div class="info">
        <form method="post" action="index.php" enctype="multipart/form-data">
            <input type="hidden" name="controller" value="admin" />
            <input type="hidden" name="action" value="saveAccommodation" />

            <?php	
            foreach ($this->oAccommodations as $accommodation)
            { 
            ?>
            <div class="fieldgroup">
                <label>Name</label>
                <input type="text" name="strName" value="<?=$accommodation->strName?>" />
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Description</label>
                <input type="text" name="strDescription" value="<?=$accommodation->strDescription?>" />
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Image</label>
                <input type="file" name="image" value="<?=$accommodation->image?>" />
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Image alt description</label>
                <input type="text" name="alt" value="<?=$accommodation->alt?>" />
            </div><!-- .fieldgroup -->

            <?php
            }
            ?>

            <input type="submit" value="Save">
        </form>
    </div><!-- .info -->
   
</div><!-- .adminAccommodation / admin-accommodation.php -->