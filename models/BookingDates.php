<?php 

Class BookingDates {

	public function __construct($data)
	{
		$this->checkin = $data["checkin"];
        $this->checkout = $data["checkout"];
    }
    
    // check if the date range is available 
    // reference: https://stackoverflow.com/questions/33174909/room-availability-check-sql
    public static function available($checkin, $checkout)
    {
        $available = DB::query("SELECT checkin, checkout 
        FROM bookings
        WHERE (checkin >= '".$checkin."' AND checkout <= '".$checkout."') OR (checkin >= '".$checkin."' AND checkout <=  '".$checkout."')");

        // if there's no match, available
        if($available =="") {
            return true;
        }
    }
}