<?php

include_once DR.'/util/class.util.php';
include_once __DIR__.'/../dao/class.med_serial_listdao.php';

Class medicalSerialListBao{

	private $_DB;
	private $_SeriallistDao;

	function __construct(){

		$this->_SeriallistDao = new medicalSerialListDao();

	}
	public function getSeriallist($global_user_doctorN){

		$Result = new Result();	
		$Result = $this->_SeriallistDao->getSeriallist($global_user_doctorN);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_serial_listdao.php.getSeriallist($global_user_doctorN)");		

		return $Result;
	}
	public function getSpeciDateSeriallist($global_user_doctorN,$date){
		$Result = new Result();	
		$Result = $this->_SeriallistDao->getSpeciDateSeriallist($global_user_doctorN,$date);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_serial_listdao.php.getSpeciDateSeriallist($global_user_doctorN)");		

		return $Result;
	}

}
?>