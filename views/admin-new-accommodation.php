<div class="adminNewAccommodation">
    <h2>Accommodation Page</h2>

    <div class="info">
        <form method="post" action="index.php" enctype="multipart/form-data">
            <input type="hidden" name="controller" value="admin" />
            <input type="hidden" name="action" value="saveAccommodation" />

            <div class="fieldgroup">
                <label>Name</label>
                <input type="text" name="strName" value="" />
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Description</label>
                <input type="text" name="strDescription" value="" />
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Image</label>
                <input type="file" name="image" value="" />
            </div><!-- .fieldgroup -->

            <div class="fieldgroup">
                <label>Image alt description</label>
                <input type="text" name="alt" value="" />
            </div><!-- .fieldgroup -->

            <input type="submit" value="Save">
        </form>
    </div><!-- .info -->
   
</div><!-- .adminNewAccommodation / admin-new-accommodation.php -->