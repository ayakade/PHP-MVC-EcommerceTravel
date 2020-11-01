<?php 

Class Users {

	public function __construct($userData)
	{
		$this->id = $userData["id"];
		$this->strFirstName = $userData["strFirstName"];
		$this->strLastName = $userData["strLastName"];
        $this->strEmail = $userData["strEmail"];
        $this->strPassword = $userData["strPassword"];
	}

    // user login
	public static function LogIn($strEmail, $strPassword)
	{
		$arrUser = DB::query("SELECT * FROM users WHERE strEmail='".$strEmail."' and strPassword='".$strPassword."'");

		print_r($arrUser);

		if($arrUser)
		{
			return $arrUser[0]["id"];
			
		} else {

			return false;
		}
    }
 
    // check all users email
    public static function getUserByEmail($strEmail) {
        $user = DB::query("SELECT * FROM users WHERE strEmail='".$strEmail."'");

        $userFound = mysqli_fetch_assoc($user);

        return $userFound;
    }
}

?>