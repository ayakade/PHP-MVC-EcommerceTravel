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
        $this->loadData(Cities::getRandCities(), "oCities"); // this now gives me a $this->oCities
        $this->loadView("views/city-recommend.php", 1, "contentHTML"); 

        $this->loadData(Types::getAllType(), "oTypes"); // this now gives me a $this->oTypes
        $this->loadView("views/accommodation-type.php", 1, "contentHTML"); 

        $this->loadView("views/hero-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main.php"); // final view
    }

    // member login page
	public function memberLogin() 
	{
		$this->loadRoute("Global", "header", "headerHTML"); // load header
		$this->loadRoute("Global", "footer", "footerHTML"); // load footer
		
		$this->loadView("views/login.php", 1, "contentHTML"); 

        $this->loadView("views/basic-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main.php"); // final view
    }

    // signup page
	public function signup() 
	{
        $this->js("js/signup.js");

		$this->loadRoute("Global", "header", "headerHTML"); // load header
		$this->loadRoute("Global", "footer", "footerHTML"); // load footer
		
		$this->loadView("views/signup.php", 1, "contentHTML"); 

        $this->loadView("views/basic-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main.php"); // final view
	}
    
    // member login error page
	public function mError() 
	{
		$this->loadRoute("Global", "header", "headerHTML"); // load header
		$this->loadRoute("Global", "footer", "footerHTML"); // load footer
		
		$this->loadView("views/login-error.php", 1, "contentHTML"); 

        $this->loadView("views/basic-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main.php"); // final view
	}
    
    // admin login page
	public function adminLogin() 
	{
		$this->loadLastView("views/admin-login.php"); // final view
    }
    
    // admin login error page
	public function aError() {
		$this->loadLastView("views/admin-login-error.php"); // final view
	}

}