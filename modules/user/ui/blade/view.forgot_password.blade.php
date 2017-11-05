<?php


include_once './util/class.util.php';
include_once '/../../bao/class.userbao.php';

$_UserBAO = new UserBAO();
$_Log= LogUtil::getInstance();
$_DB = DBUtil::getInstance();


/* saving a new user account*/
if(isset($_POST['request']))
{
	$User = new User();	

	$User->setID(strtolower($_DB->secureInput($_POST['txtEmail']))); 
		 
	$User->setEmail(strtolower($_DB->secureInput($_POST['txtEmail']))); 

   	
	$Result = $_UserBAO->requestPassword($User);		

	echo '<strong>'.$Result->getResultObject().'</strong>';	

}


echo '<br> log:: exit blade.user_new.php';
//$_Log->log(LogUtil::$DEBUG,"exit blade.user_new.php");

?>