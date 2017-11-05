<?php

include_once DR.'/util/class.util.php';
include_once __DIR__.'/../dao/class.med_give_medicinesdao.php';

class giveMedicinesBao{

	private $_DB;
	private $_giveMDao;
	function __construct(){

		$this->_giveMDao = new giveMedicinesDao();
	}

	public function getPatientMedicinesInfoAll($prescriptionV){
		$Result = new Result();
		$Result = $this->_giveMDao->getPatientMedicinesInfoAll($prescriptionV);
		if(!$Result->getIsSuccess()){
			$Result->setResultObject("Database failure in medicalDoctorsListDao.getPatientMedicinesInfoAll()");
		}
		return $Result;
	}
	public function getPatientTestsInfoAll($prescriptionV2){
		$Result = new Result();
		$Result = $this->_giveMDao->getPatientTestsInfoAll($prescriptionV2);
		if(!$Result->getIsSuccess()){
			$Result->setResultObject("Database failure in medicalDoctorsListDao.getPatientTestsInfoAll()");
		}
		return $Result;
	}

	public function giveMedicines($giveMedicinesV){
		$Result = new Result();
		$Result = $this->_giveMDao->giveMedicines($giveMedicinesV);
		if(!$Result->getIsSuccess()){
			$Result->setResultObject("Database failure in medicalDoctorsListDao.giveMedicines()");
		}
		return $Result;
	}
	public function assignNurse($assignNurseV){
		$Result = new Result();
		$Result = $this->_giveMDao->assignNurse($assignNurseV);
		if(!$Result->getIsSuccess()){
			$Result->setResultObject("Database failure in medicalDoctorsListDao.assignNurse()");
		}
		return $Result;
	}
	
	
}

?>