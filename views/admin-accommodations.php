<div class="accommodationList">
    <div class="row">
        <h2>Accommodation list</h2>
        <a class="cta" href="index.php?controller=admin&action=addNew">Add new</a>
    </div><!-- .row -->

    <div class="lists">
        <?php
        foreach ($this->oAccommodations as $accommodation)
        {
        ?>
        <div class="list">
            <a href="index.php?controller=admin&action=accommodation&aId=<?=$accommodation->id?>">
            <p><strong><?=$accommodation->id?>: <?=$accommodation->strName?></strong></p>
            <p class="cta">Detail</p>
            </a>
        </div><!-- .list -->
        <?php
        }
        ?>
    </div><!-- .lists -->
</div><!-- .accommodationList / admin-accommodations.php -->