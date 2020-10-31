<?php
Class PublicController extends Controller{

	var $content = "";

    // index page
    public function main()
    {
        $this->loadRoute("Global", "header", "headerHTML"); // load header
        $this->loadRoute("Global", "footer", "footerHTML"); // load footer

        // put contents into heroHTML
        $this->loadView("views/heroTop.php", 1, "heroHTML");

        // put contents into contentHTML (inside container)
        $this->loadView("views/city-recommend.php", 1, "contentHTML"); 

        $this->loadView("views/hero-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main.php"); // final view
	}
}