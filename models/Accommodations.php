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
    $this->image2 = $data["image2"];
    $this->image3 = $data["image3"];
    $this->image4 = $data["image4"];
    $this->image5 = $data["image5"];
  }
    
  // find accommodations that match customer's preference
  public static function search($location, $guest)
  {
    $accommodations = DB::query("SELECT accommodations.id AS id,accommodations.strName, strDescription, maxGuestNumber, price, cities.id AS cityId, cities.strName AS city, countries.strName AS country, accommodationImages.strFirstImage AS image, accommodationImages.strSecondImage AS image2, accommodationImages.strThirdImage AS image3, accommodationImages.strFourthImage AS image4, accommodationImages.strFifthImage AS image5
    FROM accommodations
    LEFT JOIN cities ON cities.id = accommodations.cityId
    LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accommodationImageId
    LEFT JOIN countries ON countries.id = cities.countryId
    WHERE cities.strName = '".$location."' AND maxGuestNumber >= '".$guest."'"); 

    // print_r($accommodations);

    // if there's accomodations match
    if($accommodations) {

      // echo "found";
      // acting as a factory
      $accommodationArray = array(); // set default(empty)
      foreach($accommodations as $accommodation)
      {
        // create an instance / object for this SPECIFIC 
        $accommodationArray[] = new Accommodations($accommodation); // put this  object onto the array
      }

      // return the list of objects
      return $accommodationArray;
    } else {
      // echo "no found";
      return false;
    }
  }

  public static function suggest($location)
  {
    // $accommodations = DB::query("SELECT accommodations.id AS id,accommodations.strName, strDescription, maxGuestNumber, price, cities.id AS cityId, cities.strName AS city, countries.strName AS country, accommodationImages.strFirstImage AS image, accommodationImages.strSecondImage AS image2, accommodationImages.strThirdImage AS image3, accommodationImages.strFourthImage AS image4, accommodationImages.strFifthImage AS image5
    // FROM accommodations
    // LEFT JOIN cities ON cities.id = accommodations.cityId
    // LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accommodationImageId
    // LEFT JOIN countries ON countries.id = cities.countryId
    // WHERE cities.strName LIKE '%".$location."%'"); 

    $con = DB::connect();
    $sql = "SELECT accommodations.id AS id,accommodations.strName, strDescription, maxGuestNumber, price, cities.id AS cityId, cities.strName AS city, countries.strName AS country, accommodationImages.strFirstImage AS image, accommodationImages.strSecondImage AS image2, accommodationImages.strThirdImage AS image3, accommodationImages.strFourthImage AS image4, accommodationImages.strFifthImage AS image5
      FROM accommodations
      LEFT JOIN cities ON cities.id = accommodations.cityId
      LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accommodationImageId
      LEFT JOIN countries ON countries.id = cities.countryId
      WHERE cities.strName LIKE '%".$location."%'";

    $results = mysqli_query($con, $sql);

    // print_r($accommodations);
    // print_r($_GET);

    if($results) {
       //set default 
      $html = "<ul>";

      // make list of suggestion
      while($row = mysqli_fetch_assoc($results))
      {
        $html = $html."<li>".$row["city"]."</li>";
      }

      $html = $html."</ul>";

      echo $html;
    }
  }

  // get all accommodation 
  public static function getAll()
  {
    $accommodations = DB::query("SELECT accommodations.id AS id,accommodations.strName, strDescription, maxGuestNumber, price, cities.id AS cityId, cities.strName AS city, countries.strName AS country, accommodationImages.strFirstImage AS image, accommodationImages.strSecondImage AS image2, accommodationImages.strThirdImage AS image3, accommodationImages.strFourthImage AS image4, accommodationImages.strFifthImage AS image5
    FROM accommodations
    LEFT JOIN cities ON cities.id = accommodations.cityId
    LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accommodationImageId
    LEFT JOIN countries ON countries.id = cities.countryId"); 

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
    $accommodations = DB::query("SELECT accommodations.id AS id,accommodations.strName, strDescription, maxGuestNumber, price, cities.id AS cityId, cities.strName AS city, countries.strName AS country, accommodationImages.strFirstImage AS image, accommodationImages.strSecondImage AS image2, accommodationImages.strThirdImage AS image3, accommodationImages.strFourthImage AS image4, accommodationImages.strFifthImage AS image5
    FROM accommodations
    LEFT JOIN cities ON cities.id = accommodations.cityId
    LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accommodationImageId
    LEFT JOIN countries ON countries.id = cities.countryId
    WHERE accommodations.id = ".$id.""); 
    
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
		$accommodations = DB::query("SELECT accommodations.id AS id,accommodations.strName, strDescription, maxGuestNumber, price, cities.id AS cityId, cities.strName AS city, countries.strName AS country, accommodationImages.strFirstImage AS image, accommodationImages.strSecondImage AS image2, accommodationImages.strThirdImage AS image3, accommodationImages.strFourthImage AS image4, accommodationImages.strFifthImage AS image5
    FROM accommodations
    LEFT JOIN cities ON cities.id = accommodations.cityId
    LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accommodationImageId
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
    $accommodations = DB::query("SELECT accommodations.id AS id,accommodations.strName, strDescription, maxGuestNumber, price, cities.id AS cityId, cities.strName AS city, countries.strName AS country, accommodationImages.strFirstImage AS image, accommodationImages.strSecondImage AS image2, accommodationImages.strThirdImage AS image3, accommodationImages.strFourthImage AS image4, accommodationImages.strFifthImage AS image5
    FROM accommodations
    LEFT JOIN cities ON cities.id = accommodations.cityId
    LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accommodationImageId
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