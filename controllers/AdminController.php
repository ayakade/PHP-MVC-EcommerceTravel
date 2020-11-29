<?php 

Class AdminController extends Controller {

	var $content = "";
	var $title = "All";
	var $controller = "admin";

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
			$_SESSION["adminId"] = Employees::logIn($username);
			// echo $_SESSION["userId"];

			// get user info with user ID
			$user = Employees::getUserInfo($_SESSION["adminId"]);
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

		$this->loadView("views/admin-search.php", 1, "mainHTML"); 
		$this->loadData(Bookings::getAllUpcomingBookings(), "oBookings"); 
		$this->loadView("views/upcoming-bookings.php", 1, "mainHTML");
		$this->loadView("views/admin-main.php", 1, "contentHTML"); // save the results of this view, into $this->content

        $this->loadView("views/admin-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-admin.php"); // final view
	}
	
	// accomodation list
	public function accommodationList() 
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

		$this->loadData(Accommodations::getAccommodation($_GET["aId"]), "oAccommodations");
		$this->loadData(Cities::getAllCities(), "oCities");
		$this->loadData(Types::getAllType(), "oTypes");
		// $this->loadData(Categories::getType($_GET["aId"]), "oCategories");
        $this->loadView("views/admin-accommodation.php", 1, "contentHTML"); 
        $this->loadView("views/admin-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-admin.php"); // final view
	}

	// add new accomodation 
	public function addNew() 
	{
		$this->js("js/add.js");

		$this->loadRoute("Global", "adminNav", "navHTML"); // load nav

		$this->loadData(Cities::getAllCities(), "oCities");
		$this->loadData(Types::getAllType(), "oTypes");
        $this->loadView("views/admin-new-accommodation.php", 1, "contentHTML"); 
        $this->loadView("views/admin-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-admin.php"); // final view
	}
	
	// save a new accomodation info
	public function saveAccommodation()
	{
		// if all required field is filled
        if($_POST["strName"] && $_POST["city"] && $_POST["price"] && $_POST["maxGuestNumber"] && $_POST["type"] && $_POST["strDescription"] && $_FILES["image1"])
		{
            //reference: https://www.codeandcourse.com/how-to-upload-image-in-php-and-store-in-folder-and-database/
            // file upload path
            $targetDir = "assets/";
            // create unique file name
            $timestamp =round(microtime(true) * 1000);
            $fileName1 = $timestamp.basename($_FILES['image1']['name']);
            $targetFilePath = $targetDir . $fileName1;

            // check the extension of the uploaded file
            $fileType = pathinfo($_FILES['image1']['name'], PATHINFO_EXTENSION);
            
            //allowed file types
            $allowTypes = array('png', 'jpg', 'jpeg');

            if (!file_exists($targetFilePath)) 
            {
                if(in_array($fileType, $allowTypes))
                {
                    // Upload file to server
                    if(move_uploaded_file($_FILES["image1"]["tmp_name"], $targetFilePath))
                    {
                        // insert to db
						$con = DB::connect();
						// insert basic data
                        $sql = "INSERT INTO accommodations (strName, cityId, strDescription, maxGuestNumber, price) 
								VALUES ('".$_POST["strName"]."', '".$_POST["city"]."','".$_POST["strDescription"]."','".$_POST["maxGuestNumber"]."','".$_POST["price"]."')";
						mysqli_query($con, $sql);
						// after insert basic data get the new ID
						$lastID = mysqli_insert_id($con);

						// insert type data
						foreach($_POST["type"] as $type)
						{
							$sql = "INSERT INTO accommodationTypes (typeId, accommodationId)  
							VALUES ('".$type."', '".$lastID."')";
							mysqli_query($con, $sql);
						}

						// insert image data
						$sql = "INSERT INTO accommodationImages (accommodationId, strFirstImage) 
								VALUES ('".$lastID."', '".$fileName1."')";
						mysqli_query($con, $sql);
						// after insert basic data get the new ID
						$lastImageID = mysqli_insert_id($con);
						// echo $lastImageID;

						// add accommocationImageId to table accommodations
						$sql = "UPDATE accommodations
								SET accommodationImageId = '".$lastImageID."'
								WHERE id = '".$lastID."'";
						mysqli_query($con, $sql);

                        // if successed go to accommodation list page
                        $this->go("admin", "accommodationList"); 
                    }
                }
            }  
		} else {
            // if unsucseful 
            echo "unsucseful";
		}
	}

	// update accommodation info
	public function update() {
		// if all required field is filled
        if($_POST["strName"] && $_POST["city"] && $_POST["price"] && $_POST["maxGuestNumber"] && $_POST["type"] && $_POST["strDescription"])
		{
			// if there's a new image upload
			if($FILES["image1"]) {

				//reference: https://www.codeandcourse.com/how-to-upload-image-in-php-and-store-in-folder-and-database/
				// file upload path
				$targetDir = "assets/";
				// create unique file name
				$timestamp =round(microtime(true) * 1000);
				$fileName = $timestamp.basename($_FILES['image']['name']);
				$targetFilePath = $targetDir . $fileName;

				// check the extension of the uploaded file
				$fileType = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				
				//allowed file types
				$allowTypes = array('png', 'jpg', 'jpeg');

				if (!file_exists($targetFilePath)) 
				{
					if(in_array($fileType, $allowTypes))
					{
						// Upload file to server
						if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
							// step 1 :delete old pic
							$sql = "DELETE FROM accommodationImages 
							WHERE accommodationId = '".$_GET["aId"]."'";
							mysqli_query(con(), $sql);

							// step 2 :insert new photo
							$sql = "INSERT INTO accommodationImages (strFirstImage) 
								VALUES ('".$_SESSION["userID"]."', '".$profilePhotoName."', '1')";
							mysqli_query(con(), $sql);
						}
					}
				}
			}  


		} else {
            // if unsucseful 
            echo "unsucseful";
		}
	}

	// find a booking with booking # 
	public function search() {
		$_SESSION["id"] = Bookings::search($_GET["id"]);
		// echo $_SESSION["id"];
		
		$search = Bookings::getBookingInfo($_SESSION["id"]);
		// print_r($search);

		if($search) {
			// echo "found";
			$this->go("admin", "result"); 
		} else {
			echo "no match booking record";
		}
	}

	// booking search result page
	public function result() {
		$this->js("js/delete.js");

		$this->loadRoute("Global", "adminNav", "navHTML"); // load nav

		$this->loadData(Bookings::getBookingInfo($_SESSION["id"]), "oBookings"); 
		$this->loadView("views/admin-booking.php", 1, "contentHTML"); 
		$this->loadView("views/admin-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-admin.php"); // final view
	}
    
    // customer's booking list
    public function bookingList()
    {
		$this->loadRoute("Global", "adminNav", "navHTML"); // load nav
		
		$this->loadView("views/admin-search.php", 1, "contentHTML"); 

		$this->loadData(Bookings::getAllUpcomingBookings(), "oBookings"); 
		$this->loadView("views/upcoming-bookings.php", 1, "upcomingHTML"); 

		$this->loadData(Bookings::getAllPastBookings(), "oBookings"); 
		$this->loadView("views/past-bookings.php", 1, "pastHTML"); 

        $this->loadView("views/bookings.php", 1, "contentHTML"); 
        $this->loadView("views/admin-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-admin.php"); // final view
	}
	
	// specific booking info
	public function booking()
	{
		$this->js("js/delete.js");

		$this->loadRoute("Global", "adminNav", "navHTML"); // load nav

		$this->loadData(Bookings::getBookingInfo($_GET["bId"]), "oBookings"); 
		$this->loadView("views/admin-booking.php", 1, "contentHTML"); 
		$this->loadView("views/admin-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main-admin.php"); // final view
	}

	// delete a booking 
	public function delete() {
		Bookings::delete($_GET["id"]);
		// echo"success";
		$this->go("admin", "bookingList"); 
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
		unset($_SESSION["adminId"]);
		$this->go("public", "adminLogin");
	}

	// if session is out go back admin login page
	public function pretrip(){

		if($_SESSION["adminId"]=="")
		{
			$this->go("public", "adminLogin");
		} else {
			$this->oUser = Employees::getUserInfo($_SESSION["adminId"]);
		}
	}
}

?>