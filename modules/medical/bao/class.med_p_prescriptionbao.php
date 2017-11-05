<?php

include_once DR.'/util/class.util.php';
include_once __DIR__.'/../dao/class.med_p_prescriptiondao.php';

class prescriptionListBao{
	private $_DB;
	private $_prescriptionlistDao;

	function __construct(){

		$this->_prescriptionlistDao = new prescriptionListDao();

	}

	public function getAllPrescriptionList($PrescriptionV){

		$Result = new Result();	
		$Result = $this->_prescriptionlistDao->getAllPrescriptionList($PrescriptionV);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_serial_listdao.php.getAllPrescriptionList($global_user_doctorN)");		

		return $Result;
	} 
	public function getMedicinesDetails($DetailsV){

		$Result = new Result();	
		$Result = $this->_prescriptionlistDao->getMedicinesDetails($DetailsV);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_serial_listdao.php.getAllPrescriptionList($global_user_doctorN)");		

		return $Result;
	}
	public function getTestsDetails($TestDetailsV){

		$Result = new Result();	
		$Result = $this->_prescriptionlistDao->getTestsDetails($TestDetailsV);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_serial_listdao.php.getTestsDetails($TestDetailsV)");		

		return $Result;
	}
	public function getDoctorDetails($doctorV){

		$Result = new Result();	
		$Result = $this->_prescriptionlistDao->getDoctorDetails($doctorV);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_serial_listdao.php.getAllPrescriptionList($global_user_doctorN)");		

		return $Result;
	}
	public function AddReportLink($reportLink){

		$Result = new Result();	
		$Result = $this->_prescriptionlistDao->AddReportLink($reportLink);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_serial_listdao.php.getAllPrescriptionList($global_user_doctorN)");		

		return $Result;
	}
}