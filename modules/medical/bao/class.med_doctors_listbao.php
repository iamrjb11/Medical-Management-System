<?php

include_once DR.'/util/class.util.php';
include_once __DIR__.'/../dao/class.med_doctors_listdao.php';


/*
	Discussion Category Business Object 
*/
Class medicalDoctorsListBao{

	private $_DB;
	private $_DoctorlistDao;

	function __construct(){

		$this->_DoctorlistDao = new medicalDoctorsListDao();

	}

	//get all Discussion Categorys value
	public function getAlldoctorslist(){

		$Result = new Result();	
		$Result = $this->_DoctorlistDao->getAlldoctorslist();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in medicalDoctorsListDao.getAlldoctorslist()");		

		return $Result;
	}
	public function getSpecificcategory($cat){


		$Result = new Result();	
		$Result = $this->_DoctorlistDao->getSpecificcategory($cat);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in medicalDoctorsListDao.getSpecificcategory()");		

		return $Result;


	}
	public function getSpecificdoctor($doctor){


		$Result = new Result();	
		$Result = $this->_DoctorlistDao->getSpecificdoctor($doctor);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in medicalDoctorsListDao.getSpecificdoctor()");		

		return $Result;


	}
	public function getSerial($serialInfo){
		$Result = new Result();	
		$Result = $this->_DoctorlistDao->getSerial($serialInfo);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in _DoctorlistDao.php.>getSerial($serialInfo)");		

		return $Result;
	}
}
?>