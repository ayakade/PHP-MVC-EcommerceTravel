<?php
Class GlobalController extends Controller {
	
    var $content = "";
    
    // main Nav (header)
	public function mainNav()
	{
		$this->loadView("views/header.php"); // load the html and append to $this->content
	}	
}