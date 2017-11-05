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



/* saving a new user account*/
if(isset($_POST['search']))
{

	if(isset($_POST['assignedRoles']))
	{	   
		$Role = $_POST['assignedRoles'];
	}

	if(isset($_POST['selectedField']))
	{	   
		$SearchField = $_POST['selectedField'];
	}

	if(isset($_POST['txtSearch']))
	{	   
		$SearchText = $_DB->secureInput($_POST['txtSearch']);

		$ResultSearch = $_UserBAO->searchUser( $Role, $SearchField, $SearchText);		
	}	
		
}



echo '<br> log:: exit blade.user_search.php';

$_Log->log(LogUtil::$DEBUG,"exit blade.user_search.php");

?>