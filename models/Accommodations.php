<?php 

Class Accommodations {

	public function __construct($data)
	{
    $this->id = $data["id"];
    // $this->typeID = $data["typeID"];
    // $this->type = $data["type"];
    $this->strName = $data["strName"];
    $this->strDescription = $data["strDescription"];
    $this->maxGuestNumber = $data["maxGuestNumber"];
    $this->price = $data["price"];
    $this->cityId = $data["cityId"];
    $this->city = $data["city"];
    $this->country = $data["country"];
    $this->image = $data["image"];
  }
    
  // find accommodations that match customer's preference
  public function search()
  {

  }

  // get all accommodation 
  public static function getAll()
  {
    $accommodations = DB::query("SELECT accommodations.id AS id,accommodations.strName, strDescription, maxGuestNumber, price, cities.id AS cityId, cities.strName AS city, countries.strName AS country, accommodationImages.strFirstImage AS image 
    FROM accommodations
    LEFT JOIN cities ON cities.id = accommodations.cityId
    LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accomodationImageId
    LEFT JOIN countries ON countries.id = cities.countryId"); 
    // $accommodations = DB::query("SELECT accommodations.id AS id, types.id AS typeID, types.strName AS type, accommodations.strName, strDescription, maxGuestNumber, price, cities.strName AS cityName, countries.strName AS strCountry, accommodationImages.strFirstImage AS image 
    // FROM accommodationTypes
    // LEFT JOIN types ON accommodationTypes.typeId = types.id
    // LEFT JOIN accommodations ON accommodationTypes.accommodationId = accommodations.id
    // LEFT JOIN cities ON cities.id = accommodations.cityId
    // LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accomodationImageId
    // LEFT JOIN countries ON countries.id = cities.countryId"); 

    // acting as a factory
    $accommodationArray = array(); // set default(empty)
    foreach($accommodations as $accommodation)
    {
      // create an instance / object for this SPECIFIC 
      $accommodationArray[] = new Accommodations($accommodation); // put this  object onto the array
    }

    // return the list of objects
    return $accommodationArray;
  }

  // get a spesific accommodation 
  public static function getAccommodation($id)
  {
    // // set default (empty)
    // $data["id"] = "";
    // $data["strName"] = "";
    // $data["strDescription"] = "";
    // $data["image"] = "";
    // $data["alt"] = "";

    // // connect to bd to check if there's record
		// $con = DB::connect();

    // if(isset($_GET["aId"]))
    // {
    $accommodations = DB::query("SELECT accommodations.id AS id,accommodations.strName, strDescription, maxGuestNumber, price, cities.id AS cityId, cities.strName AS city, countries.strName AS country, accommodationImages.strFirstImage AS image 
    FROM accommodations
    LEFT JOIN cities ON cities.id = accommodations.cityId
    LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accomodationImageId
    LEFT JOIN countries ON countries.id = cities.countryId
    WHERE accommodations.id = ".$id.""); 
    // $accommodations = DB::query("SELECT accommodations.id AS id, types.id AS typeID, types.strName AS type, accommodations.strName, strDescription, maxGuestNumber, price, cities.strName AS cityName, countries.strName AS strCountry, accommodationImages.strFirstImage AS image 
    // FROM accommodationTypes
    // LEFT JOIN types ON accommodationTypes.typeId = types.id
    // LEFT JOIN accommodations ON accommodationTypes.accommodationId = accommodations.id
    // LEFT JOIN cities ON cities.id = accommodations.cityId
    // LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accomodationImageId
    // LEFT JOIN countries ON countries.id = cities.countryId
    // WHERE accommodations.id = ".$id.""); 
    
    // acting as a factory
    $accommodationArray = array(); // set default(empty)

    foreach($accommodations as $accommodation)
    {
      // create an instance / object for this SPECIFIC 
      $accommodationArray[] = new Accommodations($accommodation); // put this  object onto the array
    }
    // }

    // return the list of objects
    return $accommodationArray;
  }

  // get randam 4 accommodation
  public static function getRandAccommodations()
	{
		$accommodations = DB::query("SELECT accommodations.id AS id,accommodations.strName, strDescription, maxGuestNumber, price, cities.id AS cityId, cities.strName AS city, countries.strName AS country, accommodationImages.strFirstImage AS image 
    FROM accommodations
    LEFT JOIN cities ON cities.id = accommodations.cityId
    LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accomodationImageId
    LEFT JOIN countries ON countries.id = cities.countryId
    ORDER BY RAND() LIMIT 4"); 

        // acting as a factory
       $accommodationArray = array(); // set default (empty)

        foreach($accommodations as $accommodation)
        {
            // create an instance / object for this SPECIFIC city
            $accommodationArray[] = new Accommodations($accommodation); // put this city object onto the array
        }
       
        // return the list of city objects
        return $accommodationArray;
  }
  
  // get accommodation group by city
  public static function getAllCity($id) {
    $accommodations = DB::query("SELECT accommodations.id AS id,accommodations.strName, strDescription, maxGuestNumber, price, cities.id AS cityId, cities.strName AS city, countries.strName AS country, accommodationImages.strFirstImage AS image 
    FROM accommodations
    LEFT JOIN cities ON cities.id = accommodations.cityId
    LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accomodationImageId
    LEFT JOIN countries ON countries.id = cities.countryId
    WHERE cityId = ".$id.""); 
    
    // acting as a factory
    $accommodationArray = array(); // set default(empty)

    foreach($accommodations as $accommodation)
    {
      // create an instance / object for this SPECIFIC 
      $accommodationArray[] = new Accommodations($accommodation); // put this  object onto the array
    }
    // }

    // return the list of objects
    return $accommodationArray;
  }
}

?>