<?php 

Class Searches {
    
    // check if the date range is available 
    // reference: https://stackoverflow.com/questions/33174909/room-availability-check-sql
    public static function search($location, $checkin, $checkout, $guest)
    {
        $available = DB::query("SELECT accommodations.id AS id,accommodations.strName, checkin, checkout, maxGuestNumber,  cities.id AS cityId, cities.strName AS city
        FROM bookings
        LEFT JOIN accommodations ON accommodations.id = bookings.accommodationId 
        LEFT JOIN cities ON cities.id = accommodations.cityId
        WHERE ((checkin <= '".$checkin."' AND checkout >= '".$checkin."') OR (checkin <= '".$checkout."' AND checkout >= '".$checkout."')) AND cities.strName = '".$location."' AND maxGuestNumber >= '".$guest."'");

        // if there's no match, available
        if($available =="") {
            return true;
        } 
    }
}