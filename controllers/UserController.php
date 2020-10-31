<?php 

Class UserCOntroller extends Controller {

	// login page
	public function login() 
	{
		$this->loadRoute("Global", "header", "headerHTML"); // load header
		$this->loadRoute("Global", "footer", "footerHTML"); // load footer
		
		$this->loadView("views/login.php", 1, "contentHTML"); 

        $this->loadView("views/basic-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main.php"); // final view
	}

	// user login
	public function doLogIn()
	{
		$_SESSION["userId"] = Users::LogIn($_POST["strEmail"], $_POST["strPassword"]);

		if ($_SESSION["userId"])
		{
			// go to user main page if email and password match
			$this->go("user", "userMain"); 
		} else {
			//$this->loadView("views/login.php");
			// $this->go("public", "errorLogin"); // if details entered do not exist in the db redirect user back to login form with error
		}
	}

	// user main page after login 
	public function userMain() 
	{
		$this->loadRoute("Global", "header", "headerHTML"); // load header
        $this->loadRoute("Global", "footer", "footerHTML"); // load footer

        $this->loadView("views/basic-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main.php"); // final view
	}
}

?>