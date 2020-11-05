<?php 

Class Users {

	public function __construct($userData)
	{
		$this->id = $userData["id"];
		$this->strFirstName = $userData["strFirstName"];
		$this->strLastName = $userData["strLastName"];
		$this->strEmail = $userData["strEmail"];
		$this->strPhoneNumber = $userData["strPhoneNumber"];
        $this->strPassword = $userData["strPassword"];
	}

	// user login
	// get the user matches email
	public static function logIn($strEmail)
	{
		$arrUser = DB::query("SELECT * FROM users WHERE strEmail='".$strEmail."'");

		// print_r($arrUser);

		if($arrUser)
		{
			return $arrUser[0]["id"];
			
		} else {

			return false;
		}
    }
 
    // check all users email
	public static function getUserByEmail($strEmail) 
	{
        $user = DB::query("SELECT * FROM users WHERE strEmail='".$strEmail."'");

        $userFound = mysqli_fetch_assoc($user);

        return $userFound;
	}
	
	// user info 
	public static function getUserInfo($userId)
	{
		// $user = DB::query("SELECT * FROM users WHERE id=".$_SESSION["userId"]);
		$user = DB::query("SELECT * FROM users WHERE id='".$userId."'");

		// acting as a factory
		return new Users($user[0]); // factory
		// print_r(new Users($user[0]));
	}

	// update user info
	public static function update($id, $strFirstName, $strLastName, $strEmail, $strPhoneNumber)
	{
		$user = DB::query("UPDATE users SET strFirstName='".$strFirstName."',  strLastName='".$strLastName."', strEmail='".$strEmail."',  strPhoneNumber='".$strPhoneNumber."' WHERE id='".$id."'");

		return true;
    }
}

?>