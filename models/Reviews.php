<?php 

Class Reviews {

	public function __construct($data)
	{
        $this->id = $data["id"];
        $this->accommodationId = $data["accommodationId"];
        $this->rates = $data["rates"];
        $this->comments = $data["comments"];
        $this->userId = $data["userId"];
        $this->name = $data["name"];
    }

    // get all reviews of one accommodation
    public static function getReviews($id) {
        $reviews = DB::query("SELECT reviews.id AS id, accommodationId, rates, comments, userId, CONCAT(users.strFirstName,  ' ' , users.strLastName) as name
        FROM reviews
        LEFT JOIN users ON users.id = reviews.userId
        WHERE accommodationId = ".$id.""); 

        // acting as a factory
        $reviewArray = array(); // set default(empty)
        foreach($reviews as $review)
        {
        // create an instance / object for this SPECIFIC 
        $reviewArray[] = new Reviews($review); // put this object onto the array
        }

        // return the list of objects
        return $reviewArray;
    }

    // get a specific  accommodation
    public static function getReview($id) {
        $reviews = DB::query("SELECT reviews.id AS id, accommodationId, rates, comments, userId, CONCAT(users.strFirstName,  ' ' , users.strLastName) as name
        FROM reviews
        LEFT JOIN users ON users.id = reviews.userId
        WHERE reviews.id = ".$id.""); 

        // acting as a factory
        $reviewArray = array(); // set default(empty)
        foreach($reviews as $review)
        {
        // create an instance / object for this SPECIFIC 
        $reviewArray[] = new Reviews($review); // put this object onto the array
        }

        // return the list of objects
        return $reviewArray;
    }
}

?>