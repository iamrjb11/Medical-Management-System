<?php

include_once './util/class.util.php';
include_once '/../dao/class.disciplinedao.php';


/*
	Discipline Business Object 
*/
Class DisciplineBAO{

	private $_DB;
	private $_DisciplineDAO;

	function DisciplineBAO(){

		$this->_DisciplineDAO = new DisciplineDAO();

	}

	//get all Disciplines value
	public function getAllDisciplines(){

		$Result = new Result();	
		$Result = $this->_DisciplineDAO->getAllDisciplines();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in DisciplineDAO.getAllDisciplines()");		

		return $Result;
	}

	//create Discipline funtion with the Discipline object
	public function createDiscipline($Discipline){

		$Result = new Result();	
		$Result = $this->_DisciplineDAO->createDiscipline($Discipline);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in DisciplineDAO.createDiscipline()");		

		return $Result;

	
	}

	//read an Discipline object based on its id form Discipline object
	public function readDiscipline($Discipline){


		$Result = new Result();	
		$Result = $this->_DisciplineDAO->readDiscipline($Discipline);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in DisciplineDAO.readDiscipline()");		

		return $Result;


	}

	//update an Discipline object based on its current information
	public function updateDiscipline($Discipline){

		$Result = new Result();	
		$Result = $this->_DisciplineDAO->updateDiscipline($Discipline);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in DisciplineDAO.updateDiscipline()");		

		return $Result;
	}

	//delete an existing Discipline
	public function deleteDiscipline($Discipline){

		$Result = new Result();	
		$Result = $this->_DisciplineDAO->deleteDiscipline($Discipline);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in DisciplineDAO.deleteDiscipline()");		

		return $Result;

	}

}

echo '<br> log:: exit the class.disciplinebao.php';

?>