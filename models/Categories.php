<?php

Class Categories {

    public function __construct($data)
	{
        $this->id = $data["id"];
        $this->typeID = $data["typeID"];
        $this->type = $data["type"];
        $this->strName = $data["strName"];
        $this->strDescription = $data["strDescription"];
        $this->maxGuestNumber = $data["maxGuestNumber"];
        $this->price = $data["price"];
        $this->city = $data["city"];
        $this->country = $data["country"];
        $this->image = $data["image"];
    }

    // get all accommodations of one type
    public static function getAll($id) {
        $accommodations = DB::query("SELECT accommodations.id AS id, types.id AS typeID, types.strName AS type, accommodations.strName, strDescription, maxGuestNumber, price, cities.strName AS city, countries.strName AS country, accommodationImages.strFirstImage AS image 
        FROM accommodationTypes
        LEFT JOIN types ON accommodationTypes.typeId = types.id
        LEFT JOIN accommodations ON accommodationTypes.accommodationId = accommodations.id
        LEFT JOIN cities ON cities.id = accommodations.cityId
        LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accommodationImageId
        LEFT JOIN countries ON countries.id = cities.countryId
        WHERE typeID = ".$id.""); 

        // acting as a factory
        $accommodationArray = array(); // set default(empty)

        foreach($accommodations as $accommodation)
        {
        // create an instance / object for this SPECIFIC 
        $accommodationArray[] = new Categories($accommodation); // put this  object onto the array
        }
        // }

        // return the list of objects
        return $accommodationArray;
    }

    // get all type accomodations categorized
	public static function getType($id) {

        // // set the default(when no category is checked(empty))
        // $categories = false;

        // $sql = DB::query("SELECT * FROM accommodationTypes WHERE accommodationId = ".$id.""); 

        // // print_r($sql);

        // $results = mysqli_query(DB::connect(), $sql);   

        // while($data = mysqli_fetch_assoc($results))
        // {
        //     $categories[$data["typeID"]] = true;
        // }

        // print_r($categories);

        // return $categories;
    
        $categories = DB::query("SELECT accommodations.id AS id, types.id AS typeID, types.strName AS type, accommodations.strName, strDescription, maxGuestNumber, price, cities.strName AS city, countries.strName AS country, accommodationImages.strFirstImage AS image 
        FROM accommodationTypes
        LEFT JOIN types ON accommodationTypes.typeId = types.id
        LEFT JOIN accommodations ON accommodationTypes.accommodationId = accommodations.id
        LEFT JOIN cities ON cities.id = accommodations.cityId
        LEFT JOIN accommodationImages ON accommodationImages.id = accommodations.accommodationImageId
        LEFT JOIN countries ON countries.id = cities.countryId
        WHERE accommodations.id = ".$id.""); 

        // acting as a factory
        $categoryArray = array(); // set default(empty)

        foreach($categories as $category)
        {
        // create an instance / object for this SPECIFIC 
        $categoryArray[] = new Categories($category); // put this  object onto the array
        }
        
        print_r($categoryArray);

        // return the list of objects
        return $categoryArray;
    }
}

?>