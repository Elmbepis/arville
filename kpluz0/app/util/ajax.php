<?php
/* ajax.php contains the functions accessible via javascript AJAX. Returns data in JSON format. User must be logged in in order to access. */
// require_once($_SERVER['DOCUMENT_ROOT'].'/app/login.php');
require_once('util_modules.php');
require_once('util_user.php');
	
if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$json_string = file_get_contents('php://input');
	$json_obj = json_decode($json_string);

	$result = array();
	switch($json_obj->requestType){

		case 'getModulesForUser':
			$user_manager = new UserManager();
			$result = $user_manager->getModulesForUser($_COOKIE['KPluzID_my_site']);
			break;


		case 'getModuleData':
			$manager = new ModuleManager();
			$moduleID = $json_obj->moduleID;
			$result = $manager->getLegacyUrl($moduleID);
			break;


		default:
			break;

	}
	/* send data as json */
	header('Content-type: application/json');
	echo json_encode($result);
}

?>