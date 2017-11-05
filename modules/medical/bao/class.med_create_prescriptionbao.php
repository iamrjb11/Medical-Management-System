<?php

include_once DR.'/util/class.util.php';
include_once __DIR__.'/../dao/class.med_create_prescriptiondao.php';


/*
	Discussion Category Business Object 
*/
Class createPrescriptionBao{

	private $_DB;
	private $_createPrescriptnDao;

	function __construct(){

		$this->_createPrescriptnDao = new createPrescriptionDao();

	}

	//get all Discussion Categorys value
	public function createPrescription($createPrescriptionV){

		$Result = new Result();	
		$Result = $this->_createPrescriptnDao->createPrescription($createPrescriptionV);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in createPrescriptionDao.createPrescription()");		

		return $Result;
	}
	public function getPrescriptionIDValue(){
		$Result = new Result();	
		$Result = $this->_createPrescriptnDao->getPrescriptionIDValue();		

		return $Result;
	}
	public function getPrescriptionID($values){
		$Result = new Result();	
		$Result = $this->_createPrescriptnDao->getPrescriptionID($values);		

		return $Result;
	}
	public function deleteInfo($ID){

		$Result = new Result();	
		$Result = $this->_createPrescriptnDao->deleteInfo($ID);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in createPrescriptionDao.createPrescriptionMedicine()");		

		return $Result;
	}
	public function createPrescriptionMedicine($createPrescriptionMedicineV){

		$Result = new Result();	
		$Result = $this->_createPrescriptnDao->createPrescriptionMedicine($createPrescriptionMedicineV);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in createPrescriptionDao.createPrescriptionMedicine()");		

		return $Result;
	}
	public function createPrescriptionTest($createPrescriptionTestV){

		$Result = new Result();	
		$Result = $this->_createPrescriptnDao->createPrescriptionTest($createPrescriptionTestV);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in createPrescriptionDao.createPrescriptionTest()");		

		return $Result;
	}
	public function findSpecificPatient($patientEmailID){
		$Result = new Result();	
		$Result = $this->_createPrescriptnDao->findSpecificPatient($patientEmailID);

		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in createPrescriptionDao.findSpecificPatient()");	
		return $Result;
	}
	public function getMedicinesDetailsForPrescription($DetailsV){

		$Result = new Result();	
		$Result = $this->_createPrescriptnDao->getMedicinesDetailsForPrescription($DetailsV);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_serial_listdao.php.getAllPrescriptionList($global_user_doctorN)");		

		return $Result;
	}
	public function getTestsDetailsForPrescription($TestDetailsV){

		$Result = new Result();	
		$Result = $this->_createPrescriptnDao->getTestsDetailsForPrescription($TestDetailsV);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_serial_listdao.php.getTestsDetails($TestDetailsV)");		

		return $Result;
	}
	
}
?>