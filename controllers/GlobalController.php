<?php
Class GlobalController extends Controller {
	
    var $content = "";
    
    // header
	public function header()
	{
		$this->loadView("views/header.php"); // load the html and append to $this->content
    }
    
     // header
	public function footer()
	{
		$this->loadView("views/footer.php"); // load the html and append to $this->content
	}	
}