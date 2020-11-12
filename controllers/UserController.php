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
					$this->go("public", "mError"); 
					// echo "password not correct";
				}
			}

		// if useremail & password are not given
		} else if ($useremail=="" && $password==""){
			$this->go("public", "mError"); 
			// echo "enter your user name and  password";

			// if useremail are not given
		} else if ($useremail=="") {
			$this->go("public", "mError"); 
			// echo "enter your user email";

			// if password are not given
		} else if ($password=="") {
			$this->go("public", "mError"); 
			// echo "enter your password";
		}
	}

	// new user sign up
	public function doSignup()
	{
		// insert to db
		$con = DB::connect();
		$sql = "INSERT INTO users (strFirstName, strLastName, strEmail, strPassword) values ('".$_POST["strFirstName"]."', '".$_POST["strLastName"]."','".$_POST["strEmail"]."','".$_POST["strPassword"]."')";

		mysqli_query($con, $sql);

		$this->go("user", "userMain");

		// after resgister get the new ID
		// $lastID = mysqli_insert_id($con);
		// // echo "last ID: ".$lastID;
		// // die;
		// $_SESSION["userId"] = $lastID;

		// return true;

		// // get user info with user ID
		// $user = Users::getUserInfo($lastID);

		// if ($user)
		// {
		// 	$this->go("user", "userMain");
			
		// } else {
		// 	// if unsucseful 
		// 	// echo "unsucseful";
		// 	$this->go("public", "signup"); 
		// }
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

		$this->loadData(Bookings::getUpcomingBookings($_SESSION["userId"]), "oBookings"); 
		$this->loadView("views/user-upcoming-bookings.php", 1, "upcomingHTML"); 

		$this->loadData(Bookings::getPastBookings($_SESSION["userId"]), "oBookings"); 
		$this->loadView("views/user-past-bookings.php", 1, "pastHTML"); 

		$this->loadView("views/bookings.php", 1, "contentHTML"); 
		$this->loadView("views/user-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-user.php"); // final view
	}

	// user's specific booking info
	public function booking()
	{
		$this->loadRoute("Global", "userNav", "navHTML"); // load nav

		$this->loadData(Bookings::getBookingInfo($_GET["bId"]), "oBookings"); 
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
		$this->go("public", "memberLogin");
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