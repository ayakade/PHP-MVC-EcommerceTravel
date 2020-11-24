<?php
session_start();

include("controllers/Controller.php");

include("models/Cities.php");
include("models/Types.php");
include("models/Users.php");
include("models/Employees.php");
include("models/Accommodations.php");
include("models/Bookings.php");
include("models/Categories.php");
include("models/Reviews.php");
include("models/BookingDates.php");

include("libs/DB.php");
include("libs/Errors.php");

$controller = setVariable("controller", "Public");
$action = setVariable("action", "main");

function setVariable($name, $default){

	if (isset($_POST[$name]))
	{
		return $_POST[$name];
	}

	if (isset($_GET[$name]))
	{
		return $_GET[$name];
	}

	return $default;
}

$controllerName = ucfirst($controller)."Controller";
$controllerFile = "controllers/".$controllerName.".php";

if(file_exists($controllerFile))
{
	include($controllerFile);

	// create an instance of the controller
	$theController = new $controllerName();

	// if there is a function inside the controller, called pretrip
	// then call that function, BEFORE calling the main action we requested
	if(method_exists($theController, "pretrip"))
	{
		$theController->pretrip(); // pretrip is a way of doing something before the main action (also known as a mixin)
	}

	// now call the main action the user requested
	if(method_exists($theController, $action))
	{
		$theController->$action();
		if ($theController->bLastViewRun)
		{
			$theController->output();
		}
	} else {

		Errors::missingMethodError($controllerName, $action);
	}

} else {

	Errors::missingControllerError($controllerName);
}

?>