<?php

include_once './util/class.util.php';
include_once '/../../bao/class.userbao.php';
include_once '/../../bao/class.rolebao.php';
include_once '/../../bao/class.positionbao.php';


$_UserBAO = new UserBAO();
$_RoleBAO = new RoleBAO();
$_PositionBAO = new PositionBAO();
$_DB = DBUtil::getInstance();
$_Log= LogUtil::getInstance();


$globalUser = '';
$globalUser = $_SESSION["globalUser"];

//calling from outside to know about specific user
if(isset($_GET['id']))
{
  $globalUser = new User();
  $globalUser->setID($_GET['id']);
}

$userPositions = $_UserBAO->readUserRolesPositions($globalUser)->getResultObject(); //reading the user 
$userDetails = $_UserBAO->readUserDetails($globalUser)->getResultObject(); 

//reading the detailed part of an user 


/* saving a new user account*/
if(isset($_POST['update']))
{
	 $User = new User();	
	 $User->setID($globalUser->getID());
	 $User->setEmail($_DB->secureInput($_POST['txtEmail']));
     $User->setUniversityID($_DB->secureInput($_POST['txtUniversityID']));
     $User->setPassword($_DB->secureInput($_POST['txtPassword']));
     $User->setFirstName($_DB->secureInput($_POST['txtFirstName']));
     $User->setLastName($_DB->secureInput($_POST['txtLastName']));

   if(isset($_POST['assignedRoles'])){ 
	    foreach ($_POST['assignedRoles'] as $select)
		{
			$Role = new Role();
			$Role->setID($select);
			$Roles[]=$Role;
		}
		$User->setRoles($Roles);
	}
	
	if(isset($_POST['assignedPositions'])){
		foreach ($_POST['assignedPositions'] as $select)
		{
			$Position = new Position();
			$Position->setID($select);
			$Positions[]=$Position;
		}
		$User->setPositions($Positions);
	}

	 $Result = $_UserBAO->updateUser($User);	

	 if($Result->getIsSuccess())
	 {

		$UserDetails = new UserDetails();
		$UserDetails->setID($globalUser->getID());    	
	    $UserDetails->setFatherName ( $_DB->secureInput($_POST['txtFatherName']) );   
	    $UserDetails->setMotherName ( $_DB->secureInput($_POST['txtMotherName']) );
	    $UserDetails->setPermanentAddress ( $_DB->secureInput($_POST['txtPermanentAddress']) );
	    $UserDetails->setHomePhone ( $_DB->secureInput($_POST['txtHomePhone']) ); 
	    $UserDetails->setCurrentAddress ( $_DB->secureInput($_POST['txtCurrentAddress']) );
	    $UserDetails->setMobilePhone ( $_DB->secureInput($_POST['txtMobilePhone']) );   

	 	$Result = $_UserBAO->updateUserDetails($UserDetails);	
	 }

	header("Location:".PageUtil::$USER_DETAILS);
}


//if a role(ID) is present in the list of list(roles(ID))
function isRoleAvailable($Role, $Roles)
{
	//echo $Role." ".$Roles;
	//var_dump($Role);
	//var_dump($Roles);
	for ($i=0; $i < sizeof($Roles); $i++) { 
		# code...
		if(!strcasecmp($Role->getID(),$Roles[$i]->getID())){
			return true;
		}
	}

	return false;
}

//if a Position(ID) is present in the list of list(Positions(ID))
function isPositionAvailable($Position, $Positions)
{
	
	for ($i=0; $i < sizeof($Positions); $i++) { 
		# code...
		if(!strcasecmp($Position->getID(),$Positions[$i]->getID())){
			return true;
		}
	}

	return false;
}

echo '<br> log:: exit blade.user_details.php';
$_Log->log(LogUtil::$DEBUG,"exit blade.user_details.php");

?>