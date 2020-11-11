<?php
Class DB {

	var $debug = true;

    // connect db
	static public function connect(){
		$dbDetails = parse_ini_file("../e-commerce.ini"); 
		
		return mysqli_connect($dbDetails["host"], $dbDetails["user"], $dbDetails["pass"], $dbDetails["dbname"]);
	}

    // get data
	static public function query($sql){

		$oDB = new DB();

		if($oDB->debug)
		{
			$oDB->debug($sql);
		}

		$results = mysqli_query($oDB->connect(), $sql);

		if($results)
		{
			$data = null;
			while($row = mysqli_fetch_assoc($results))
			{
				$data[] = $row;
			}

			return $data;
		}
	}

	public function debug($sql)
	{
		//echo "<script>console.log('$sql')</script>";
	}
}
?>