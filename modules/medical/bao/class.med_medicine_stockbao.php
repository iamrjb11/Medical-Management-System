<?php

include_once DR.'/util/class.util.php';
include_once __DIR__.'/../dao/class.med_medicine_stockdao.php';

class medicineStockBao{

	private $_DB;
	private $_mStockDao;
	function __construct(){

		$this->_mStockDao = new medicineStockDao();
	}
	public function getAllmedicines(){

		$Result = new Result();	
		$Result = $this->_mStockDao->getAllmedicines();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_medicine_stockDao.getAllmedicines()");		

		return $Result;
	}

	public function addMedicine($medicineStockClass){


		$Result = new Result();	
		$Result = $this->_mStockDao->addMedicine($medicineStockClass);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in medicalDoctorsListDao.addMedicine()");		

		return $Result;


	}
	public function updateMedicine($medicineStockClass){


		$Result = new Result();	
		$Result = $this->_mStockDao->updateMedicine($medicineStockClass);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in medicalDoctorsListDao.updateMedicine()");		

		return $Result;


	}
	
}

?>