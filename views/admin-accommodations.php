<div class="adminAccommodationList">
    <h2>Accommodation list</h2>
    <a href="index.php?controller=admin&action=addNew">Add new </a>

    <div class="lists">
        <?php
        foreach ($this->oAccommodations as $accommodation)
        {
        ?>
        <div class="list">
            <a href="index.php?controller=admin&action=accommodation&aId=<?=$accommodation->id?>">
            <h3><?=$accommodation->strName?></h3>
            </a>
        </div><!-- .list -->
        <?php
        }
        ?>
    </div><!-- .lists -->
</div><!-- .adminAccommodationList / admin-accommodations.php -->