<?php 

Class Accommodations {

	public function __construct($data)
	{
    $this->id = $data["id"];
    $this->strName = $data["strName"];
    $this->strDescription = $data["strDescription"];
    $this->maxGuestNumber = $data["maxGuestNumber"];
    $this->price = $data["price"];
    $this->cityName = $data["cityName"];
    $this->image = $data["image"];
    $this->alt = $data["alt"];
  }
    
  // find accommodations that match customer's preference
  public function search()
  {

  }

  // get all accommodation 
  public static function getAll()
  {
    $accommodations = DB::query("SELECT accommodations.strName, strDescription, maxGuestNumber, price, cities.strName AS cityName, accommodationImages.strFirstImage AS image, accommodationImages.strFirstAlt AS alt
    FROM accommodations
    LEFT JOIN cities ON cities.id = accommodations.cityId
    LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accomodationImageId"); 

        // acting as a factory
    $accommodationArray = array(); // empty array to avoid errors when no assignments were found
    foreach($accommodations as $accommodation)
    {
      // create an instance / object for this SPECIFIC 
      $accommodationArray[] = new Accommodations($accommodation); // put this  object onto the array
    }

    // return the list of objects
    return $accomodationArray;
  }
}

?>