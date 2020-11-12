<div class="header col-12 col-lg-12">
    <div class="burgerMenu">
        <input type="checkbox" class="checkBox">

        <div class="bars">
            <i class="fas fa-bars"></i>
        </div>

        <div id="flyoutMenu">
        <?php
            $arrMenu = array(
                // array('menu'=>'City', 'link'=>'#'),
                // array('menu'=>'Type', 'link'=>'#'),
                array('menu'=>'Login', 'link'=>'index.php?controller=public&action=memberLogin')
            );
           
            foreach ($arrMenu as $key => $nav) {
        ?>
            <a href="<?=$nav["link"]?>"><?=$nav["menu"]?></a>
        <?php
            }
        ?>
        </div><!-- #flyout menu -->
    </div><!-- .burger menu -->

    <div class="logo">
        <a href="index.php"><h1>##</h1></a>
    </div><!-- .logo -->

    <nav>
    <?php
        foreach ($arrMenu as $key => $nav) {
    ?>
        <a href="<?=$nav["link"]?>"><?=$nav["menu"]?></a>
    <?php
        }
    ?>
    </nav><!--  nav -->

</div><!-- .header views/header.php -->

