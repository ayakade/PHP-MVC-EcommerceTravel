<?php 

Class AdminController extends Controller {

	// admin user login
	public function doLogIn()
	{
		$username = $_POST["strUsername"];
		$password = $_POST["strPassword"];
		$passwordHash = password_hash($password, PASSWORD_DEFAULT);
		// echo $passwordHash;

		// if username & password are given
		if(!($username=="" OR $password==""))
		{
			$_SESSION["userId"] = Employees::logIn($username);
			// echo $_SESSION["userId"];

			// get user info with user ID
			$user = Employees::getUserInfo($_SESSION["userId"]);
			// print_r($user);

			if ($user)
			{
				// check if password matches
				if (password_verify($user->strPassword, $passwordHash)) 
				{
					// go to user main page if match
					$this->go("admin", "adminMain"); 

				} else {
					$this->go("public", "aError"); 
					// echo "password not correct";
				}
			}

		// if username & password are not given
		} else if ($username=="" && $password==""){
			$this->go("public", "aError"); 
			// echo "enter your user name and  password";
		
		// if username are not given
		} else if ($username=="") {
			$this->go("public", "aError"); 
			// echo "enter your user name";

		// if password are not given
		} else if ($password=="") {
			$this->go("public", "aError"); 
			// echo "enter your password";
		}
	}

	// admin main page after login 
	public function adminMain() 
	{
		$this->loadRoute("Global", "adminNav", "navHTML"); // load nav

        $this->loadView("views/admin-main.php", 1, "contentHTML"); 
        $this->loadView("views/admin-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-admin.php"); // final view
	}
	
	// accomodation list
	public function accomodationList() 
	{
		$this->loadRoute("Global", "adminNav", "navHTML"); // load nav

		$this->loadData(Accommodations::getAll(), "oAccommodations");
        $this->loadView("views/admin-accommodations.php", 1, "contentHTML"); 
        $this->loadView("views/admin-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-admin.php"); // final view
	}
	
	// accomodation detail
	public function accommodation() 
	{
		$this->loadRoute("Global", "adminNav", "navHTML"); // load nav

		$this->loadData(Accommodations::getAccommodation(), "oAccommodations");
        $this->loadView("views/admin-accommodation.php", 1, "contentHTML"); 
        $this->loadView("views/admin-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-admin.php"); // final view
	}

	// add new accomodation 
	public function addNew() 
	{
		$this->loadRoute("Global", "adminNav", "navHTML"); // load nav

        $this->loadView("views/admin-new-accommodation.php", 1, "contentHTML"); 
        $this->loadView("views/admin-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-admin.php"); // final view
	}
	
	// save new accomodation info
	public function saveAccomodation()
	{
		if($_POST["strName"] && $_POST["strDescription"] && $_POST["image"] && $_POST["alt"])
		{
			//upload photo 
			$profilePhotoName = $_FILES[$fileFieldName]["name"]; // photo name

			move_uploaded_file($_FILES[$fileFieldName]["tmp_name"], "assets/".$_FILES[$fileFieldName]["name"]);

			$con = DB::connect();
			$sql = "INSERT INTO accommodations(strName, strDescription) values ('".$_POST["strName"]."', '".$_POST["strDescription"]."')";
		
			mysqli_query($con, $sql);

			// if successed new assignment
			$this->go("admin", "accomodationList"); 
		} else {
			// if unsuccessful
			echo "unsuccessful";
		}
	}
    
    // customer's booking list
    public function bookingList()
    {
		$this->loadRoute("Global", "adminNav", "navHTML"); // load nav
		
		$this->loadData(Bookings::getAllUpcomingBookings(), "oBookings"); 
		$this->loadView("views/admin-upcoming-bookings.php", 1, "upcomingHTML"); 

		$this->loadData(Bookings::getAllPastBookings(), "oBookings"); 
		$this->loadView("views/admin-past-bookings.php", 1, "pastHTML"); 

        $this->loadView("views/bookings.php", 1, "contentHTML"); 
        $this->loadView("views/admin-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-admin.php"); // final view
	}
	
	// specific booking info
	public function booking()
	{
		$this->loadRoute("Global", "adminNav", "navHTML"); // load nav

		$this->loadData(Bookings::getBookingInfo($_GET["bId"]), "oBookings"); 
		$this->loadView("views/admin-booking.php", 1, "contentHTML"); 
		$this->loadView("views/admin-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-admin.php"); // final view
	}

    // customer's list
    public function customerList() 
    {
        $this->loadRoute("Global", "adminNav", "navHTML"); // load nav

		$this->loadData(Users::getAll(), "oCustomers");
        $this->loadView("views/admin-customers.php", 1, "contentHTML"); 
        $this->loadView("views/admin-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-admin.php"); // final view
	}
	
	// specific customer's info
    public function customer() 
    {
        $this->loadRoute("Global", "adminNav", "navHTML"); // load nav

		$this->loadData(Users::getUser($_GET["aId"]), "oCustomers");
        $this->loadView("views/admin-customer.php", 1, "contentHTML"); 
        $this->loadView("views/admin-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-admin.php"); // final view
    }

    // admin logout
    public function doLogOut()
    {
		unset($_SESSION["userId"]);
		$this->go("public", "adminLogin");
	}

	// if session is out go back admin login page
	public function pretrip(){

		if($_SESSION["userId"]=="")
		{
			$this->go("public", "adminLogin");
		} else {
			$this->oUser = Employees::getUserInfo($_SESSION["userId"]);
		}
	}
}

?>