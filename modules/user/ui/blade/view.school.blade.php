<?php

include_once './util/class.util.php';
include_once '/../../bao/class.schoolbao.php';


$_SchoolBAO = new SchoolBAO();
$_DB = DBUtil::getInstance();

/* saving a new School account*/
if(isset($_POST['save']))
{
	 $School = new School();	
	 $School->setID(Util::getGUID());
     $School->setName($_DB->secureInput($_POST['txtName']));
	 $_SchoolBAO->createSchool($School);		 
}


/* deleting an existing School */
if(isset($_GET['del']))
{

	$School = new School();	
	$School->setID($_GET['del']);	
	$_SchoolBAO->deleteSchool($School); //reading the School object from the result object

	header("Location:".PageUtil::$SCHOOL);
}


/* reading an existing School information */
if(isset($_GET['edit']))
{
	$School = new School();	
	$School->setID($_GET['edit']);	
	$getROW = $_SchoolBAO->readSchool($School)->getResultObject(); 
	//reading the School object from the result object
}

/*updating an existing School information*/
if(isset($_POST['update']))
{
	$School = new School();	

    $School->setID ($_GET['edit']);
    $School->setName( $_POST['txtName'] );
	
	$_SchoolBAO->updateSchool($School);

	header("Location:".PageUtil::$SCHOOL);
}



echo '<br> log:: exit view.blade.school.php';

?>