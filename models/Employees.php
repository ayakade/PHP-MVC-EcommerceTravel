<?php 

Class Employees {

	public function __construct($userData)
	{
		$this->id = $userData["id"];
		$this->strFirstName = $userData["strFirstName"];
		$this->strLastName = $userData["strLastName"];
        $this->strUsername = $userData["strUsername"];
        $this->strPassword = $userData["strPassword"];
	}

    // employees login
	public static function LogIn($strUsername)
	{
		$arrUser = DB::query("SELECT * FROM employees WHERE strUsername='".$strUsername."'");

		// print_r($arrUser);

		if($arrUser)
		{
			return $arrUser[0]["id"];
			
		} else {

			return false;
		}
	}
	
	// employees info 
	public static function getUserInfo($userId)
	{
		// $user = DB::query("SELECT * FROM users WHERE id=".$_SESSION["userId"]);
		$user = DB::query("SELECT * FROM employees WHERE id='".$userId."'");

		// acting as a factory
		return new Employees($user[0]); // factory
		// print_r(new Users($user[0]));
	}
}

?>