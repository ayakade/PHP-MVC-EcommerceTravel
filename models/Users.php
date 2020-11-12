<?php 

Class Users {

	public function __construct($userData)
	{
		$this->id = $userData["id"];
		$this->name = $userData["name"];
		$this->strFirstName = $userData["strFirstName"];
		$this->strLastName = $userData["strLastName"];
		$this->strEmail = $userData["strEmail"];
		$this->strPhoneNumber = $userData["strPhoneNumber"];
        $this->strPassword = $userData["strPassword"];
	}

	// user page: user login
	// get the user matches email
	public static function logIn($strEmail)
	{
		$arrUser = DB::query("SELECT CONCAT(strFirstName ,  ' ' , strLastName) as name, id, strFirstName, strLastName, strEmail, strPhoneNumber, strPassword FROM users WHERE strEmail='".$strEmail."'");

		// print_r($arrUser);

		if($arrUser)
		{
			return $arrUser[0]["id"];
			
		} else {

			return false;
		}
    }
 
    // user page: check all users email
	public static function getUserByEmail($strEmail) 
	{
        $user = DB::query("SELECT CONCAT(strFirstName ,  ' ' , strLastName) as name, id, strFirstName, strLastName, strEmail, strPhoneNumber, strPassword FROM users WHERE strEmail='".$strEmail."'");

        $userFound = mysqli_fetch_assoc($user);

        return $userFound;
	}

	// admin page: get users list
	public static function getAll()
	{
		$customers = DB::query("SELECT CONCAT(strFirstName ,  ' ' , strLastName) as name, id, strFirstName, strLastName, strEmail, strPhoneNumber, strPassword FROM users"); 

        // acting as a factory
        $customerArray = array(); // set default (empty)

        foreach($customers as $customer)
        {
            // create an instance / object for this SPECIFIC city
            $customerArray[] = new Users($customer); // put this customer object onto the array
        }
       
        // return the list of customer objects
        return $customerArray;
	}

	// admin page: spesific user info
	public static function getUser($userId)
	{
		$customers = DB::query("SELECT CONCAT(strFirstName ,  ' ' , strLastName) as name, id, strFirstName, strLastName, strEmail, strPhoneNumber, strPassword FROM users WHERE id='".$userId."'"); 

        // acting as a factory
        $customerArray = array(); // set default (empty)

        foreach($customers as $customer)
        {
            // create an instance / object for this SPECIFIC city
            $customerArray[] = new Users($customer); // put this customer object onto the array
        }
       
        // return the list of customer objects
        return $customerArray;
	}
	
	// user page: user info for login 
	public static function getUserInfo($userId)
	{
		// $user = DB::query("SELECT * FROM users WHERE id=".$_SESSION["userId"]);
		$user = DB::query("SELECT CONCAT(strFirstName ,  ' ' , strLastName) as name, id, strFirstName, strLastName, strEmail, strPhoneNumber, strPassword FROM users WHERE id='".$userId."'");

		// acting as a factory
		return new Users($user[0]); // factory
		// print_r(new Users($user[0]));
	}

	// user page: update user info
	public static function update($id, $strFirstName, $strLastName, $strEmail, $strPhoneNumber)
	{
		$user = DB::query("UPDATE users SET strFirstName='".$strFirstName."',  strLastName='".$strLastName."', strEmail='".$strEmail."',  strPhoneNumber='".$strPhoneNumber."' WHERE id='".$id."'");

		return true;
    }
}

?>