<?php 

Class Bookings {

	public function __construct($data)
	{
		$this->id = $data["id"];
		$this->userId = $data["userId"];
		$this->accommodation = $data["accommodation"];
		$this->image = $data["image"];
		$this->checkin = $data["checkin"];
        $this->checkout = $data["checkout"];
        $this->totalStay = $data["totalStay"];
		$this->guestNumber = $data["guestNumber"];
		$this->subtotal = $data["subtotal"];
		$this->code = $data["code"];
        $this->discount = $data["discount"];
        $this->tax = $data["tax"];
        $this->total = $data["total"];
		$this->paymentType = $data["paymentType"];
		$this->bookingProcessedDate = $data["bookingProcessedDate"];
        $this->status = $data["status"];
    }
    
    // get all booking info 
    public static function getAll()
    {
        $bookings = DB::query("SELECT bookings.id, userId, accommodations.strName AS accommodation, accommodationImages.strFirstImage AS image, checkin, checkout, totalStay, guestNumber, subtotal, discounts.strCode AS code, discount, tax, total, paymentTypes.strName AS paymentType,  bookingProcessedDate, status
        FROM bookings
        LEFT JOIN paymentTypes ON bookings.paymentTypeId = paymentTypes.id
        LEFT JOIN accommodations ON bookings.accommodationId =accommodations.id
        LEFT JOIN accommodationImages ON accommodations.accomodationImageId = accommodationImages.id
        LEFT JOIN discounts ON bookings.discountId = discounts.id"); 

        // acting as a factory
        $bookingArray = array(); // set default(empty)
        foreach($bookings as $booking)
        {
        // create an instance / object for this SPECIFIC 
        $bookingArray[] = new Bookings($booking); // put this  object onto the array
        }

        // return the list of objects
        return $bookingArray;
    }

    // user page: get their upcoming bookings  
    public static function getUpcomingBookings($userId)
    {
        $bookings = DB::query("SELECT bookings.id, userId,accommodations.strName AS accommodation, accommodationImages.strFirstImage AS image, checkin, checkout, totalStay, guestNumber, subtotal, discounts.strCode AS code, discount, tax, total, paymentTypes.strName AS paymentType,  bookingProcessedDate, status
        FROM bookings
        LEFT JOIN paymentTypes ON bookings.paymentTypeId = paymentTypes.id
        LEFT JOIN accommodations ON bookings.accommodationId =accommodations.id
        LEFT JOIN accommodationImages ON accommodations.accomodationImageId = accommodationImages.id
        LEFT JOIN discounts ON bookings.discountId = discounts.id
        WHERE userId ='".$userId."' AND status = 0"); 

        // if there's no upcoming bookings
        if($bookings == "") {
            //make an object with no booking data
            $bookingArray = array((object) array("id" => "0", 'accommodation' => 'no upcoming trip'));

            return $bookingArray;

        } else {

            // acting as a factory
            $bookingArray = array(); // set default(empty)
            foreach($bookings as $booking)
            {
            // create an instance / object for this SPECIFIC 
            $bookingArray[] = new Bookings($booking); // put this  object onto the array
            }

            // return the list of objects
            return $bookingArray;
        }
    }

    // user page: get their past bookings  
    public static function getPastBookings($userId)
    {
        $bookings = DB::query("SELECT bookings.id, userId,accommodations.strName AS accommodation, accommodationImages.strFirstImage AS image, checkin, checkout, totalStay, guestNumber, subtotal, discounts.strCode AS code, discount, tax, total, paymentTypes.strName AS paymentType,  bookingProcessedDate, status
        FROM bookings
        LEFT JOIN paymentTypes ON bookings.paymentTypeId = paymentTypes.id
        LEFT JOIN accommodations ON bookings.accommodationId =accommodations.id
        LEFT JOIN accommodationImages ON accommodations.accomodationImageId = accommodationImages.id
        LEFT JOIN discounts ON bookings.discountId = discounts.id
        WHERE userId ='".$userId."' AND status = 1"); 

        // if there's no past bookings
        if($bookings == "") {
            //make an object with no booking data
            $bookingArray = array((object) array("id" => "0", 'accommodation' => 'no upcoming trip'));

            return $bookingArray;

        } else {
            // acting as a factory
            $bookingArray = array(); // set default(empty)
            foreach($bookings as $booking)
            {
            // create an instance / object for this SPECIFIC 
            $bookingArray[] = new Bookings($booking); // put this  object onto the array
            }

            // return the list of objects
            return $bookingArray;
        }
    }

    // admin page: get all upcoming bookings  
    public static function getAllUpcomingBookings()
    {
        $bookings = DB::query("SELECT bookings.id, userId,accommodations.strName AS accommodation, accommodationImages.strFirstImage AS image, checkin, checkout, totalStay, guestNumber, subtotal, discounts.strCode AS code, discount, tax, total, paymentTypes.strName AS paymentType,  bookingProcessedDate, status
        FROM bookings
        LEFT JOIN paymentTypes ON bookings.paymentTypeId = paymentTypes.id
        LEFT JOIN accommodations ON bookings.accommodationId =accommodations.id
        LEFT JOIN accommodationImages ON accommodations.accomodationImageId = accommodationImages.id
        LEFT JOIN discounts ON bookings.discountId = discounts.id
        WHERE status = 0"); 

        // if there's no upcoming bookings
        if($bookings == "") {
            //make an object with no booking data
            $bookingArray = array((object) array("id" => "0", 'accommodation' => 'no upcoming trip'));

            return $bookingArray;

        } else {

            // acting as a factory
            $bookingArray = array(); // set default(empty)
            foreach($bookings as $booking)
            {
            // create an instance / object for this SPECIFIC 
            $bookingArray[] = new Bookings($booking); // put this  object onto the array
            }

            // return the list of objects
            return $bookingArray;
        }
    }

    // admin page: get all past bookings  
    public static function getAllPastBookings()
    {
        $bookings = DB::query("SELECT bookings.id, userId,accommodations.strName AS accommodation, accommodationImages.strFirstImage AS image, checkin, checkout, totalStay, guestNumber, subtotal, discounts.strCode AS code, discount, tax, total, paymentTypes.strName AS paymentType,  bookingProcessedDate, status
        FROM bookings
        LEFT JOIN paymentTypes ON bookings.paymentTypeId = paymentTypes.id
        LEFT JOIN accommodations ON bookings.accommodationId =accommodations.id
        LEFT JOIN accommodationImages ON accommodations.accomodationImageId = accommodationImages.id
        LEFT JOIN discounts ON bookings.discountId = discounts.id
        WHERE status = 1"); 

        // if there's no past bookings
        if($bookings == "") {
            //make an object with no booking data
            $bookingArray = array((object) array("id" => "0", 'accommodation' => 'no upcoming trip'));

            return $bookingArray;

        } else {
            // acting as a factory
            $bookingArray = array(); // set default(empty)
            foreach($bookings as $booking)
            {
            // create an instance / object for this SPECIFIC 
            $bookingArray[] = new Bookings($booking); // put this  object onto the array
            }

            // return the list of objects
            return $bookingArray;
        }
    }


    // get specific booking info 
    public static function getBookingInfo($id)
    {
        $bookings = DB::query("SELECT bookings.id, userId, accommodations.strName AS accommodation, accommodationImages.strFirstImage AS image, checkin, checkout, totalStay, guestNumber, subtotal, discounts.strCode AS code, discount, tax, total, paymentTypes.strName AS paymentType,  bookingProcessedDate, status
        FROM bookings
        LEFT JOIN paymentTypes ON bookings.paymentTypeId = paymentTypes.id
        LEFT JOIN accommodations ON bookings.accommodationId =accommodations.id
        LEFT JOIN accommodationImages ON accommodations.accomodationImageId = accommodationImages.id
        LEFT JOIN discounts ON bookings.discountId = discounts.id
        WHERE bookings.id='".$id."'"); 

        // acting as a factory
        $bookingArray = array(); // set default(empty)
        foreach($bookings as $booking)
        {
        // create an instance / object for this SPECIFIC 
        $bookingArray[] = new Bookings($booking); // put this  object onto the array
        }

        // return the list of objects
        return $bookingArray;
    }
}