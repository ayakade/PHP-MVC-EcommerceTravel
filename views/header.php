<div class="header col-12 col-lg-12">
    <div class="burgerMenu">
        <input type="checkbox" class="checkBox">

        <div class="bars">
            <i class="fas fa-bars"></i>
        </div>

        <div id="flyoutMenu">
        <?php
            $arrMenu = array(
                array('menu'=>'Home', 'link'=>'#'),
                array('menu'=>'Assignments', 'link'=>'#'),
                array('menu'=>'Grades', 'link'=>'#')
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
        <a href="index.php?controller=user&action=main&"><h1>##</h1></a>
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

