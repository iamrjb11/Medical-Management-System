<?php

include_once DR.'/util/class.util.php';
include_once __DIR__.'/../dao/class.med_prescription_historydao.php';

class prescriptionHistoryBao{
	private $_DB;
	private $_prescriptionHistoryDao;

	function __construct(){

		$this->_prescriptionHistoryDao = new prescriptionHistoryDao();

	}

	public function getPrescriptionHistoryList($PrescriptionV){

		$Result = new Result();	
		$Result = $this->_prescriptionHistoryDao->getPrescriptionHistoryList($PrescriptionV);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_serial_listdao.php.getAllPrescriptionList($global_user_doctorN)");		

		return $Result;
	} 
	public function getDoctorDetailsForHistory($doctorV){

		$Result = new Result();	
		$Result = $this->_prescriptionHistoryDao->getDoctorDetailsForHistory($doctorV);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_serial_listdao.php.getAllPrescriptionList($global_user_doctorN)");		

		return $Result;
	}
	public function getMedicinesDetailsForHistory($DetailsV){

		$Result = new Result();	
		$Result = $this->_prescriptionHistoryDao->getMedicinesDetailsForHistory($DetailsV);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_serial_listdao.php.getAllPrescriptionList($global_user_doctorN)");		

		return $Result;
	}
	public function getTestsDetailsForHistory($TestDetailsV){

		$Result = new Result();	
		$Result = $this->_prescriptionHistoryDao->getTestsDetailsForHistory($TestDetailsV);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_serial_listdao.php.getTestsDetails($TestDetailsV)");		

		return $Result;
	}
}
	?>