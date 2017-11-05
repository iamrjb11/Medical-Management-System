<?php

include_once DR.'/util/class.util.php';
include_once __DIR__.'/../../bao/class.rolebao.php';


$_RoleBAO = new RoleBAO();
$_DB = DBUtil::getInstance();
$_Log = LogUtil::getInstance();

/* saving a new Role account*/
if(isset($_POST['save']))
{
	 $Role = new Role();

	if(isset($_POST['selectedRole']))	
	 	$Role->setID($_POST['selectedRole']);

	
	$Permissions = array();
    
    if(isset($_POST['selectedPermissions'])){ 
	    foreach ($_POST['selectedPermissions'] as $select)
		{
			$Permission = new Permission();
			$Permission->setID($select);
			$Permissions[]=$Permission;
		}

	}     
$_RoleBAO->assignPermissionsToRole($Role,$Permissions);	 
}



/* reading an existing Role information */
if(isset($_GET['edit']))
{
	$Role = new Role();	
	$Role->setID($_GET['edit']);	
	$globalRole = $_RoleBAO->readRolePermissions($Role)->getResultObject(); //reading the role object from the result object
}

//if a permission(ID) is present in the list of list(permissions(ID))
function isPermissionAvailable($Permission, $Permissions)
{
	
	for ($i=0; $i < sizeof($Permissions); $i++) { 
		# code...
		if(!strcmp($Permission->getID(),$Permissions[$i]->getID())){
			return true;
		}
	}

	return false;
}

echo '<br> log:: exit blade.permission.php';

?>