<?php

Class Checkout {

    public function __construct($data)
	{
		$this->accommodationId = $data["accommodationId"];
        $this->checkin = $data["checkin"];
        $this->checkout = $data["checkout"];
        $this->guest = $data["guest"];
		$this->subtotal = $data["subtotal"];
		$this->tax = $data["tax"];
		$this->total = $data["total"];
    }

    // temporary save data for checkout
    public static function data($accommodationId, $checkin, $checkout, $guest, $subtotal, $tax, $total) {

        $data = array(
			array("accommodationId"=>".$accommodationId.", "checkin"=>".$checkin.", "checkout"=>".$checkout.", "guest"=>".$guest.", "subtotal"=>".$subtotal.", "tax"=>".$tax.", "total"=>".$total.")
        );
        
        echo($data);

		// set default(empty)
        $response = array();
        
		foreach($data as $checkoutData)
		{
			$response[] = new Checkout ($checkoutData);
		}

		return $response;
    }
}

?>