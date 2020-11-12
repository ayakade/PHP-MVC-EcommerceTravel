<div class="nav col-12 col-lg-3">

	<div class="burgerMenu">
		<input type="checkbox" class="checkBox">

		<div class="bars">
			<i class="fas fa-bars"></i>
		</div><!-- end of bars-->

		<div id="flyoutMenu">
        <?php
            $arrMenu = array(
                // array('menu'=>'Home', 'link'=>'index.php?controller=user&action=userMain', 'icon'=>''),
                array('menu'=>'Booking', 'link'=>'index.php?controller=user&action=bookingList', 'icon'=>''),
                array('menu'=>'Account', 'link'=>'index.php?controller=user&action=account', 'icon'=>''),
                array('menu'=>'Logout', 'link'=>'index.php?controller=user&action=doLogOut', 'icon'=>'')
            );
           
            foreach ($arrMenu as $key => $menu) {
        ?>
            <a href="<?=$menu["link"]?>"><?=$menu["menu"]?></a>
        <?php
            }
        ?>
		</div><!-- end of flyout menu -->
	</div><!-- end of burger menu -->

	<nav>
    <?php
        foreach ($arrMenu as $key => $menu) {
    ?>
        <a href="<?=$menu["link"]?>"><?=$menu["menu"]?></a>
        <!-- <a href="<?=$menu["link"]?>"><i class="f<?=$menu["icon"]?>"><?=$menu["menu"]?></a> -->
    <?php
        }
    ?>
	</nav>
	
</div><!-- .nav / user-nav.php -->