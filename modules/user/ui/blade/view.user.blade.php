<?php


include_once DR.'/util/class.util.php';
include_once __DIR__.'/../../bao/class.userbao.php';
include_once __DIR__.'/../../bao/class.rolebao.php';
include_once __DIR__.'/../../bao/class.positionbao.php';

$_UserBAO = new UserBAO();
$_RoleBAO = new RoleBAO();
$_PositionBAO = new PositionBAO();
$_DB = DBUtil::getInstance();
$_Log= LogUtil::getInstance();


$globalUser = '';

/* saving a new user account*/
if(isset($_POST['save']))
{
	 $User = new User();	
	 $User->setID(strtolower($_DB->secureInput($_POST['txtEmail'])));
     $User->setUniversityID($_DB->secureInput($_POST['txtUniversityID']));
     $User->setEmail($_DB->secureInput($_POST['txtEmail']));
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

	$_UserBAO->createUser($User);		 
}


/* deleting an existing user */
if(isset($_GET['del']))
{

	$User = new User();	
	$User->setID($_GET['del']);	
	$_UserBAO->deleteUser($User); //reading the user object from the result object

	header("Location:".PageUtil::$USER);
}

/* approving a user */
if(isset($_GET['approve']))
{

	$User = new User();	
	$User->setID($_GET['approve']);	
	$_UserBAO->approve_Reject_User($User,'approved'); //reading the user object from the result object

	header("Location:".PageUtil::$USER);
}

/* rejecting a user */
if(isset($_GET['reject']))
{

	$User = new User();	
	$User->setID($_GET['reject']);	
	$_UserBAO->approve_Reject_User($User,'rejected'); //reading the user object from the result object

	header("Location:".PageUtil::$USER);
}


/* reading an existing user information */
if(isset($_GET['edit']))
{
	$User = new User();	
	$User->setID($_GET['edit']);	
	$globalUser = $_UserBAO->readUserRolesPositions($User)->getResultObject(); //reading the user object from the result object
}

/*updating an existing user information*/
if(isset($_POST['update']))
{
	$User = new User();	

    $User->setID ($_GET['edit']);
    $User->setUniversityID ( $_POST['txtUniversityID'] );   
    $User->setEmail ( $_POST['txtEmail'] );
    $User->setPassword ( $_POST['txtPassword'] );
    $User->setFirstName( $_POST['txtFirstName'] );
    $User->setLastName( $_POST['txtLastName'] );

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

	$_UserBAO->updateUser($User);

	header("Location:".PageUtil::$USER);
}


//if a role(ID) is present in the list of list(roles(ID))
function isRoleAvailable($Role, $Roles)
{
	

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

echo '<br> log:: exit blade.user.php';
$_Log->log(LogUtil::$DEBUG,"exit blade.user.php");

?>