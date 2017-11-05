<?php
//echo "login blade";
include_once './util/class.xml.php';
include_once './util/class.util.php';
include_once './modules/user/bao/class.userbao.php';


$_UserBAO = new UserBAO();
$_DB = DBUtil::getInstance();
$_Log= LogUtil::getInstance();
$_Menu = XMLtoMenuUtil::getInstance();
$globalUser='';
$globalPermission='';
$globalMenu ='';



/* loading the user account*/
if(isset($_POST['login']))
{
	$User = new User();	
    $User->setEmail($_DB->secureInput($_POST['txtEmail']));
    $User->setPassword($_DB->secureInput($_POST['txtPassword']));

	$Result = $_UserBAO->readUserRolesPermissions($User); //reading the user object from the result 

	

	if($Result->getIsSuccess()){

		//storing the user object with all the roles and related permissions available in the complete system
		$globalUser = $Result->getResultObject();
		//required to access session variables;		
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

		$_SESSION["globalUser"]=$globalUser;

		//finding the complete permission list
		$globalPermission = getAllPermissions($globalUser);
			
		//storing permission in the session
		$_SESSION["globalPermission"] = $globalPermission;


		$_Menu->load();

		$_Menu->viewable_menu($globalPermission);
		
		$globalMenu =  $_Menu->reorganize_menu();
	  	
	  	//storing in the session

	  	$_SESSION["globalMenu"] = $globalMenu;


		$_SESSION[PageUtil::$LOGIN]='true';

		header("Location:".PageUtil::$HOME);		

	}
	else{
		echo '<strong>'.$Result->getResultObject().'</strong>';	
	}
	
}

if(isset($_GET['logout'])){
	session_unset(); 
	session_destroy();
	header("Location:".PageUtil::$LOGIN);		
}


//return only the unique permissions a user has on the system
function getAllPermissions($User){

	//get all roles from user
	$Roles = $User->getRoles();
	
	$AllPermissions=array();
	
	foreach ($Roles as $Role) {
		
		//get all the permissions available in a role
		$Permissions = $Role->getPermissions();

		//iterate over the permission list
		foreach ($Permissions as $Permission) {
			
			//if a permission not available in the global list then add it
			if(!in_array($Permission->getID(), $AllPermissions)){

				//adding the permission to the global permission list
				$AllPermissions[]=$Permission->getID();

			}
		}

	}

	return $AllPermissions;
}

echo '<br> log:: exit blade.login.php';
$_Log->log(LogUtil::$DEBUG,"exit blade.login.php");

?>