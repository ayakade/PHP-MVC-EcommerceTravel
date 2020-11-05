<div class="adminAccomodation">
    <h2>Accomodation Page</h2>

    <div class="info">
        <form method="post" action="index.php" enctype="multipart/form-data">
            <input type="hidden" name="controller" value="admin" />
            <input type="hidden" name="action" value="saveAccomodation" />
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
                <input type="file" name="strFirstImage" value="" />
            </div><!-- .fieldgroup -->

            <input type="submit" value="Save">
        </form>
    </div><!-- .info -->
   
</div><!-- .adminAccomodation / admin-accomodation.php -->