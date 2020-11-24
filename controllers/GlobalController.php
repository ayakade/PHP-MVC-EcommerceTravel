<?php
Class GlobalController extends Controller {
	
	var $content = "";
	var $userId="";
    
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
	public function adminNav()
	{
		$this->loadView("views/admin-nav.php"); // load the html and append to $this->content
	}	

	// user nav
	public function userNav()
	{
		$this->loadView("views/user-nav.php"); // load the html and append to $this->content
	}	
}