<?php


include_once DR.'/util/class.util.php';
include_once __DIR__.'/../../bao/class.userbao.php';
include_once __DIR__.'/../../bao/class.rolebao.php';

$_UserBAO = new UserBAO();
$_RoleBAO = new RoleBAO();
$_DB = DBUtil::getInstance();
$_Log= LogUtil::getInstance();


/* saving a new user account*/
if(isset($_POST['request']))
{
	$User = new User();

	if(isset($_POST['selectRole'])){ 
		$Role = new Role();
		$Role->setID($_POST['selectRole']);
		$Roles[]=$Role;		
		$User->setRoles($Roles);
	}
	//if(isset($_POST['uid']))
	//{
	//	echo $_POST['uid'];
	//	$User->setUniversityID($_POST['uid']);
	//}
	if(isset($_POST['txtEmail'])){ 
		$User->setID(strtolower($_DB->secureInput($_POST['txtEmail']))); 
	}
	if(isset($_POST['txtUniversityID'])){
		$User->setUniversityID($_DB->secureInput($_POST['txtUniversityID']));
	}
	if(isset($_POST['txtFirstName'])){
   		$User->setFirstName($_DB->secureInput($_POST['txtFirstName']));
	}
 	if(isset($_POST['txtLastName'])){
    	$User->setLastName($_DB->secureInput($_POST['txtLastName']));
 	}
 	if(isset($_POST['txtAge'])){
    	$User->setAge($_DB->secureInput($_POST['txtAge']));
 	}

 	if(isset($_POST['selectSex'])){ 
 		$User->setSex($_DB->secureInput($_POST['selectSex']));
 	}
	if(isset($_POST['txtEmail'])){
		$User->setEmail(strtolower($_DB->secureInput($_POST['txtEmail']))); 
	}
	if(isset($_POST['txtPassword'])){
    	$User->setPassword($_DB->secureInput($_POST['txtPassword']));
 	}

 	if(isset($_POST['txtDegrees'])){
    	$User->setDegrees($_DB->secureInput($_POST['txtDegrees']));
 	}
 	if(isset($_POST['txtSpecialist'])){
    	$User->setSpecialist($_DB->secureInput($_POST['txtSpecialist']));
 	}
 	if(isset($_POST['txtWorkAddress'])){
    	$User->setWorkingAddress($_DB->secureInput($_POST['txtWorkAddress']));
 	}
 	if(isset($_POST['txtDayShedule'])){
    	$User->setDayShedule($_DB->secureInput($_POST['txtDayShedule']));
 	}
 	if(isset($_POST['txtTimeShedule'])){
    	$User->setTimeShedule($_DB->secureInput($_POST['txtTimeShedule']));
 	}

     $User->setStatus('pending');

    
    
	
	$Result = $_UserBAO->newUserRequest($User);		

	if($Result->getIsSuccess())
		echo '<strong>'.$Result->getResultObject().'</strong>';	


}


echo '<br> log:: exit blade.user_new.php';
//$_Log->log(LogUtil::$DEBUG,"exit blade.user_new.php");

?>