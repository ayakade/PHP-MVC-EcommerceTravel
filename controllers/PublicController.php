<?php
Class PublicController extends Controller {

	var $content = "";
	var $userId = "";

	// var $noResultMsg ="";
	
	var $location = "";
	var $checkin = "";
	var $checkout = "";
	var $guest = "";
	var $subtotal = "0";
	var $tax = "0";
	var $total = "0";

    // index page
    public function main()
    {
		$this->js("js/search.js");
		$this->js("js/suggest.js");

        $this->loadRoute("Global", "header", "headerHTML"); // load header
		$this->loadRoute("Global", "footer", "footerHTML"); // load footer
		
		// reset previous search data
		unset($_SESSION["location"]);
		unset($_SESSION["checkin"]);
		unset($_SESSION["checkout"]);
		unset($_SESSION["guest"]);
		unset($_SESSION["subtotal"]);
		unset($_SESSION["tax"]);
		unset($_SESSION["total"]);

		// put contents into heroHTML
		$this->loadView("views/search-form.php", 1, "searchHTML");
		$this->loadView("views/heroTop.php", 1, "heroHTML");

        // put contents into contentHTML (inside container)
        $this->loadData(Cities::getRandCities(), "oCities"); // this now gives me a $this->oCities
        $this->loadView("views/city-recommend.php", 1, "contentHTML"); 

        $this->loadData(Types::getAllType(), "oTypes"); // this now gives me a $this->oTypes
		$this->loadView("views/accommodation-type.php", 1, "contentHTML"); 
		
		$this->loadData(Accommodations::getRandAccommodations(), "oAccommodations"); // this now gives me a $this->oAccommodations
        $this->loadView("views/accommodation-recommend.php", 1, "contentHTML"); 

        $this->loadView("views/hero-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main.php"); // final view
	}

	// search accommodation 
	public function search() {
		$_SESSION["location"] = $_GET["location"];
		$_SESSION["checkin"] = $_GET["checkin"];
		$_SESSION["checkout"] = $_GET["checkout"];
		$_SESSION["guest"] = $_GET["guest"];
		// print_r($_SESSION["location"]);
		// print_r($_SESSION["guest"]);

		// check if there's a match 
		$search = Searches::search($_GET["location"], $_GET["checkin"], $_GET["checkout"], $_GET["guest"]);
		print_r($search);

		if($search) {
			// echo "success";
			$this->go("public", "result"); 
		
		} else {
			// $this->$noResultMsg = "Sorry there's no match... try search again";
			$this->go("public", "zero"); 
		}
	}

	// city suggestion 
	public function suggest() {
		// print_r($_GET["searchterm"]);
		Accommodations::suggest($_GET["searchterm"]);
	}
	
	// when there's a match
	public function result() {
		$this->js("js/search.js");
		$this->js("js/suggest.js");

		$this->loadRoute("Global", "header", "headerHTML"); // load header
		$this->loadRoute("Global", "footer", "footerHTML"); // load footer
		
		$this->location = $_SESSION["location"];
		$this->checkin = $_SESSION["checkin"];
		$this->checkout = $_SESSION["checkout"];
		$this->guest = $_SESSION["guest"];

		// put contents into contentHTML (inside container)
		$this->loadData(Accommodations::search($this->location, $this->guest), "oAccommodations"); // this now gives me a $this->oResults
		$this->loadView("views/search-form.php", 1, "searchHTML");
		$this->loadView("views/accommodation.php", 1, "resultHTML");

		$this->loadView("views/result.php", 1, "contentHTML");
        $this->loadView("views/basic-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main.php"); // final view
	}

	// when there's no match
	public function zero() {
		$this->js("js/search.js");
		$this->js("js/suggest.js");

		$this->loadRoute("Global", "header", "headerHTML"); // load header
        $this->loadRoute("Global", "footer", "footerHTML"); // load footer

		$this->location = $_SESSION["location"];
		$this->checkin = $_SESSION["checkin"];
		$this->checkout = $_SESSION["checkout"];
		$this->guest = $_SESSION["guest"];
		
		// put contents into contentHTML (inside container)
		$this->loadView("views/search-form.php", 1, "searchHTML");
		$this->loadView("views/no-result.php", 1, "contentHTML");
        $this->loadView("views/basic-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main.php"); // final view
	}
	
	// specific city page
    public function city()
    {
        $this->loadRoute("Global", "header", "headerHTML"); // load header
        $this->loadRoute("Global", "footer", "footerHTML"); // load footer

		// put contents into contentHTML (inside container)
		$this->loadData(Cities::getCity($_GET["cId"]), "oCities"); // this now gives me a $this->oCities
		$this->loadData(Accommodations::getAllCity($_GET["cId"]), "oAccommodations"); // this now gives me a $this->oAccommodations
		$this->loadView("views/accommodation.php", 1, "resultHTML");
		
		$this->loadView("views/city.php", 1, "contentHTML"); 
        $this->loadView("views/basic-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main.php"); // final view
	}
	
	// specific type page
    public function type()
    {
        $this->loadRoute("Global", "header", "headerHTML"); // load header
        $this->loadRoute("Global", "footer", "footerHTML"); // load footer

		// put contents into contentHTML (inside container)
		$this->loadData(Types::getType($_GET["tId"]), "oTitles"); // this now gives me a $this->oTypes
		$this->loadData(Categories::getAll($_GET["tId"]), "oAccommodations"); // this now gives me a $this->oAccommodations
		$this->loadView("views/accommodation.php", 1, "resultHTML");

        $this->loadView("views/type.php", 1, "contentHTML"); 
        $this->loadView("views/basic-layout.php", 1, "content"); // save the results of this view, into $this->content

		$this->loadLastView("views/main.php"); // final view
	}

	// specific accommodation page 
	public function accommodation() {
		$this->js("js/calculator.js");
		$this->js("js/booking.js");

		$this->loadRoute("Global", "header", "headerHTML"); // load header
		$this->loadRoute("Global", "footer", "footerHTML"); // load footer
		
		if(isset($_SESSION["checkin"])) {
			$this->checkin = $_SESSION["checkin"];
			$this->checkout = $_SESSION["checkout"];
			$this->guest = $_SESSION["guest"];
		} 

		// put contents into contentHTML (inside container)
		$this->loadData(Accommodations::getAccommodation($_GET["aId"]), "oAccommodations"); // this now gives me a $this->oAccommodations
		$this->loadData(Reviews::getReviews($_GET["aId"]), "oReviews"); // this now gives me a $this->oReviews
		$this->loadView("views/accommodation-info.php", 1, "contentHTML"); 
        $this->loadView("views/basic-layout.php", 1, "content"); // save the results of this view, into $this->content

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