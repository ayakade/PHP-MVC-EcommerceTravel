<?php 

Class UserController extends Controller {

	var $content = "";
	var $title = "Your";
	var $controller = "user";
	var $action = "";
	var $footerHTML = "";
	var $userId="";
	var $reviewHTML = "";

	// for checkout
	var $subtotal = "";
	var $tax = "";
	var $total = "";

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
					// when at checkout
					if(isset($_SESSION["total"])) {
						// go to checkout page
						$this->go("user", "checkout"); 
					} else {
						// usual login
						// go to user main page (booking list page) if match
						$this->go("user", "bookingList"); 
					}
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

		// after resgister get the new ID
		$lastID = mysqli_insert_id($con);

		$_SESSION["userId"] = $lastID;

		// // get user info with user ID
		$user = Users::getUserInfo($lastID);

		if ($user)
		{
			// when at checkout
			if(isset($_SESSION["total"])) {
				// go to checkout page
				$this->go("user", "checkout"); 
			} else {
				// usual signup
				// go to user main page (booking list page) if match
				$this->go("user", "bookingList"); 
			}
		} else {
			// if unsucseful 
			echo "unsucseful";
			// $this->go("public", "signup"); 
		}
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
		$this->loadView("views/upcoming-bookings.php", 1, "upcomingHTML"); 

		$this->loadData(Bookings::getPastBookings($_SESSION["userId"]), "oBookings"); 
		$this->loadView("views/past-bookings.php", 1, "pastHTML"); 

		$this->loadView("views/bookings.php", 1, "contentHTML"); 
		$this->loadView("views/user-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-user.php"); // final view
	}

	// user's specific booking info
	public function booking()
	{
		$this->loadRoute("Global", "userNav", "navHTML"); // load nav

		$this->loadData(Bookings::getBookingInfo($_GET["bId"]), "oBookings"); 
		$status = $_GET["status"];

		// if it's past booking shop review form
		if($status = "past") {
			$this->loadView("views/user-review-form.php", 1, "reviewHTML");
		} 

		$this->loadView("views/user-booking.php", 1, "contentHTML"); 
		$this->loadView("views/user-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-user.php"); // final view
	}

	// write a review 
	public function writeReview() {
		if($_POST["rates"] && $_POST["comments"])
		{
			$con = DB::connect();
			$sql = "INSERT INTO reviews(accommodationId, rates, comments, userId) values ('".$_POST["accommodationId"]."', '".$_POST["rates"]."','".$_POST["comments"]."', '".$_POST["userId"]."')";
		
			mysqli_query($con, $sql);

			// if successed 
			$this->go("user", "success"); 
		} else {
			// if unsucsseful
			echo "unsucsseful";
		}
	}

	// thank you page after writing review 
	public function success() {
		$this->loadRoute("Global", "userNav", "navHTML"); // load nav

		$this->loadView("views/user-review-success.php", 1, "contentHTML"); 
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

	public function goCheckout() {

		// if all required field is filled
        if($_POST["checkin"] && $_POST["checkout"] && $_POST["guest"] && $_POST["subtotal"] && $_POST["tax"] && $_POST["total"])
		{
			$_SESSION["accommodationId"] = $_POST["accommodationId"];
			$_SESSION["checkin"] = $_POST["checkin"];
			$_SESSION["checkout"] = $_POST["checkout"];
			$_SESSION["guest"] = $_POST["guest"];
			$_SESSION["subtotal"] = $_POST["subtotal"];
			$_SESSION["tax"] = $_POST["tax"];
			$_SESSION["total"] = $_POST["total"];
			
			if($_SESSION["userId"]=="")
			{
				// if user haven't login go login page
				$this->go("public", "memberLogin");
			} else {
				// continue to checkout page
				$this->go("user", "checkout"); 
			}
		} else {
			echo "error";
		}
   	}

   // checkout page
   	public function checkout() {
		$this->js("js/payment.js");

		$this->loadRoute("Global", "header", "headerHTML"); // load header
		//    $this->loadRoute("Global", "footer", "footerHTML"); // load footer

		$this->checkin = $_SESSION["checkin"];
		$this->checkout = $_SESSION["checkout"];
		$this->guest = $_SESSION["guest"];
		$this->subtotal = $_SESSION["subtotal"];
		$this->tax = $_SESSION["tax"];
		$this->total = $_SESSION["total"];
		
		$this->loadData(Accommodations::getAccommodation($_SESSION["accommodationId"]), "oAccommodations"); // this now gives me a $this->oAccommodations
		$this->loadView("views/checkout.php", 1, "contentHTML"); 

		$this->loadView("views/basic-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main.php"); // final view
   	}

    // process checkout/ save a new booking 
	public function processCheckout() {

		// insert to db
		$con = DB::connect();
		$sql = "INSERT INTO bookings (userId, accommodationId, checkin, checkout, totalStay, guestNumber, subtotal, tax, total, bookingProcessedDate, bookingStatusId) 
				VALUES ('".$_SESSION["userId"]."', '".$_POST["accommodationId"]."','".$_POST["checkin"]."','".$_POST["checkout"]."', '".$_POST["totalStay"]."', '".$_POST["guest"]."','".$_POST["subtotal"]."','".$_POST["tax"]."','".$_POST["total"]."', CURDATE(), '1')";

		// print_r($sql);
		mysqli_query($con, $sql);

		// after insert get the new ID
		$lastID = mysqli_insert_id($con);

		$_SESSION["bookingId"] = $lastID;

		if ($_SESSION["bookingId"])
		{
			$this->go("user", "confirmation"); 
			
		} else {
			// if unsucseful 
			echo "unsucseful";
			echo $sql;
		}
	}

   // booking completed
	public function confirmation() {
		$this->loadRoute("Global", "header", "headerHTML"); // load header
		// $this->loadRoute("Global", "footer", "footerHTML"); // load footer
		
		$this->loadView("views/confirmation.php", 1, "contentHTML"); 

        $this->loadView("views/basic-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main.php"); // final view
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

		$this->userId = $_SESSION["userId"];

		if($_SESSION["userId"] == "")
		{
			$this->go("public", "memberLogin");
		} else {
			$this->userId = $_SESSION["userId"];
			$this->oUser = Users::getUserInfo( $_SESSION["userId"]);
			
		}
	}
}

?>