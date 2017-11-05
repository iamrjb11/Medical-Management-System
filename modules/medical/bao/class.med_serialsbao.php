<?php

include_once DR.'/util/class.util.php';
include_once __DIR__.'/../dao/class.med_serialsdao.php';

Class medicalSerialsBao{

	private $_DB;
	private $_SeriallistDao;

	function __construct(){

		$this->_SeriallistDao = new medicalSerialsDao();

	}
	public function getSeriallist($global_user_p){

		$Result = new Result();	
		$Result = $this->_SeriallistDao->getSeriallist($global_user_p);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in med_serial_listdao.php.getSeriallist($global_user_doctorN)");		

		return $Result;
	}
}
?>