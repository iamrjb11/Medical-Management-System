<?php

include_once './util/class.util.php';
include_once '/../dao/class.schooldao.php';


/*
	School Business Object 
*/
Class SchoolBAO{

	private $_DB;
	private $_SchoolDAO;

	function SchoolBAO(){

		$this->_SchoolDAO = new SchoolDAO();

	}

	//get all Schools value
	public function getAllSchools(){

		$Result = new Result();	
		$Result = $this->_SchoolDAO->getAllSchools();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in SchoolDAO.getAllSchools()");		

		return $Result;
	}

	//create School funtion with the School object
	public function createSchool($School){

		$Result = new Result();	
		$Result = $this->_SchoolDAO->createSchool($School);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in SchoolDAO.createSchool()");		

		return $Result;

	
	}

	//read an School object based on its id form School object
	public function readSchool($School){


		$Result = new Result();	
		$Result = $this->_SchoolDAO->readSchool($School);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in SchoolDAO.readSchool()");		

		return $Result;


	}

	//update an School object based on its current information
	public function updateSchool($School){

		$Result = new Result();	
		$Result = $this->_SchoolDAO->updateSchool($School);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in SchoolDAO.updateSchool()");		

		return $Result;
	}

	//delete an existing School
	public function deleteSchool($School){

		$Result = new Result();	
		$Result = $this->_SchoolDAO->deleteSchool($School);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in SchoolDAO.deleteSchool()");		

		return $Result;

	}

}

echo '<br> log:: exit the class.schoolbao.php';

?>