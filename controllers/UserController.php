<?php 

Class UserController extends Controller {

	// user login
	public function doLogIn()
	{
		$useremail = $_POST["strEmail"];
		$password = $_POST["strPassword"];
		$passwordHash = password_hash($password, PASSWORD_DEFAULT);

		// echo $passwordHash;
		
		// if useremail & password are given
		if(!($useremail=="" OR $password==""))
		{
			$_SESSION["userId"] = Users::logIn($useremail);

			// echo $_SESSION["userId"];

			// get user info with user ID
			$user = Users::getUserInfo($_SESSION["userId"]);
			// print_r($user);

			if ($user)
			{
				// check if password matches
				if (password_verify($user->strPassword, $passwordHash)) 
				{
					// go to user main page if match
					$this->go("user", "userMain"); 

				} else {
					echo "password not correct";
				}
			}

		// if useremail & password are not given
		} else if ($useremail=="" && $password==""){
			echo "enter your user name and  password";

			// if useremail are not given
		} else if ($useremail=="") {
			echo "enter your user email";

			// if password are not given
		} else if ($password=="") {
			echo "enter your password";
		}
	}

	// signup page
	public function signup() 
	{
		$this->loadRoute("Global", "header", "headerHTML"); // load header
		$this->loadRoute("Global", "footer", "footerHTML"); // load footer
		
		$this->loadView("views/signup.php", 1, "contentHTML"); 

        $this->loadView("views/basic-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-user.php"); // final view
	}

	// new user sign up
	public function doSignup()
	{
		
	}

	// user main page after login 
	public function userMain() 
	{
		$this->loadRoute("Global", "userNav", "navHTML"); // load nav

		$this->loadView("views/user-main.php", 1, "contentHTML"); 
        $this->loadView("views/user-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-user.php"); // final view
	}

	// user's booking list
	public function bookingList()
	{
		$this->loadRoute("Global", "userNav", "navHTML"); // load nav

		$this->loadView("views/user-booking.php", 1, "contentHTML"); 
		$this->loadView("views/user-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-user.php"); // final view
	}

	 // user's account info
	 public function account()
	{
		$this->loadRoute("Global", "userNav", "navHTML"); // load nav

		$this->loadData(Users::getUserInfo($_SESSION["userId"]), "oUsers"); // this now gives me a $this->oUsers
		$this->loadView("views/user-account.php", 1, "contentHTML"); 
		$this->loadView("views/user-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-user.php"); // final view
	}

	// account info update
	public function doUpdate() 
	{
		$user = Users::update($_POST["id"], $_POST["strFirstName"], $_POST["strLastName"], $_POST["strEmail"], $_POST["strPhoneNumber"]);

		$this->go("user", "account"); 
	}

	// user logout
    public function doLogOut()
    {
		unset($_SESSION["userId"]);
		$this->go("public", "main");
	}

	// if session is out go back customer login page
	public function pretrip(){

		if($_SESSION["userId"]=="")
		{
			$this->go("public", "memberLogin");
		} else {
			$this->oUser = Users::getUserInfo($_SESSION["userId"]);
		}
	}
}

?>