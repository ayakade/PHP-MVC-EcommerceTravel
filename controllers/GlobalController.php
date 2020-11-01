<?php
Class GlobalController extends Controller {
	
    var $content = "";
    
    // header
	public function header()
	{
		$this->loadView("views/header.php"); // load the html and append to $this->content
    }
    
    // footer
	public function footer()
	{
		$this->loadView("views/footer.php"); // load the html and append to $this->content
	}	

	// admin nav
	public function nav()
	{
		$this->loadView("views/nav.php"); // load the html and append to $this->content
	}	
}