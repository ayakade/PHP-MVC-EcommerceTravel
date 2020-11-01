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
	public static function LogIn($strUsername, $strPassword)
	{
		$arrUser = DB::query("SELECT * FROM employees WHERE strUsername='".$strUsername."' and strPassword='".$strPassword."'");

		print_r($arrUser);

		if($arrUser)
		{
			return $arrUser[0]["id"];
			
		} else {

			return false;
		}
    }
}

?>