<?php 

Class Cities {

    public function __construct($data)
	{
		$this->id = $data["id"];
        $this->strName = $data["strName"];
        $this->strImage = $data["strImage"];
	}	
	
	// get cities
	public static function getAllCities()
	{
		$cities = DB::query("SELECT * FROM cities"); 

        // acting as a factory
        $cityArray = array(); // set default (empty)

        foreach($cities as $city)
        {
            // create an instance / object for this SPECIFIC city
            $cityArray[] = new Cities($city); // put this city object onto the array
        }
       
        // return the list of city objects
        return $cityArray;
    }

    // get a spacific city 
	public static function getCity($id)
	{
		$cities = DB::query("SELECT * FROM cities WHERE id = ".$id.""); 

        // acting as a factory
        $cityArray = array(); // set default (empty)

        foreach($cities as $city)
        {
            // create an instance / object for this SPECIFIC city
            $cityArray[] = new Cities($city); // put this city object onto the array
        }
       
        // return the list of city objects
        return $cityArray;
    }
    
    // get randam 6 cities 
	public static function getRandCities()
	{
	    $cities = DB::query("SELECT * FROM cities ORDER BY RAND() LIMIT 6"); 

        // acting as a factory
        $cityArray = array(); // set default (empty)

        foreach($cities as $city)
        {
            // create an instance / object for this SPECIFIC city
            $cityArray[] = new Cities($city); // put this city object onto the array
        }
       
        // return the list of city objects
        return $cityArray;
    }
    
    // suggest when user type location
    public function suggest()
    {
        $cities = DB::query("SELECT * FROM cities WHERE strName LIKE '%".$_POST["location"]."%'"); 

        //set default 
        $html = "<ul>";

        // make list of suggestion
        while($row = mysqli_fetch_assoc($cities))
        {
            $html = $html."<li>".$row["strName"]."</li>";
        }

        $html = $html."</ul>";

        echo $html;
    }
}