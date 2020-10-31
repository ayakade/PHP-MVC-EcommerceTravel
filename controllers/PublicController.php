<?php
Class PublicController extends Controller{

	var $content = "";

    // index page
    public function main()
    {
        $this->loadRoute("Global", "mainNav"); // load header

		$this->loadLastView("views/main.php"); // final view
	}
}