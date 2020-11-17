<?php

Class Types {

    public function __construct($data)
	{
        $this->id = $data["id"];
		$this->strName = $data["strName"];
		$this->strImage = $data["strImage"];
	}

    // get all accomodation type 
	public static function getAllType()
	{
		$types = DB::query("SELECT * from types"); 

        // acting as a factory
		$typeArray = array(); // empty array to avoid errors when no assignments were found
		foreach($types as $type)
		{
			// create an instance / object for this SPECIFIC 
			$typeArray[] = new Types($type); // put this object onto the array
		}

		// return the list of objects
		return $typeArray;
	}
	
	// get spesific type accomodations
	public static function getType()
	{
		$types = DB::query("SELECT * from types"); 

        // acting as a factory
		$typeArray = array(); // empty array to avoid errors when no assignments were found
		foreach($types as $type)
		{
			// create an instance / object for this SPECIFIC 
			$typeArray[] = new Types($type); // put this object onto the array
		}

		// return the list of objects
		return $typeArray;
    }
}

?>