<div class="nav col-12">

	<div class="burgerMenu">
		<input type="checkbox" class="checkBox">

		<div class="bars">
			<i class="fas fa-bars"></i>
		</div><!-- end of bars-->

		<div id="flyoutMenu">
            <p>Hi <?=$this->oUser->strFirstName?> :)</p>
        <?php
            $arrMenu = array(
                // array('menu'=>'Website', 'link'=>'index.php'),
                array('menu'=>'Booking', 'link'=>'index.php?controller=user&action=bookingList'),
                array('menu'=>'Account', 'link'=>'index.php?controller=user&action=account'),
                array('menu'=>'Logout', 'link'=>'index.php?controller=user&action=doLogOut')
            );
           
            foreach ($arrMenu as $key => $menu) {
        ?>
            <a href="<?=$menu["link"]?>"><?=$menu["menu"]?></a>
        <?php
            }
        ?>
		</div><!-- end of flyout menu -->
    </div><!-- end of burger menu -->
    
    <div class="logo">
        <a href="index.php"><h1>Around The World</h1></a>
    </div><!-- .logo -->

	<nav>
    <?php
        foreach ($arrMenu as $key => $menu) {
    ?>
        <a href="<?=$menu["link"]?>"><?=$menu["menu"]?></a>
    <?php
        }
    ?>
	</nav>
	
</div><!-- .nav / user-nav.php -->