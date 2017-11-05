<?php
// write dao object for each class
include_once DR.'/common/class.common.php';
include_once DR.'/common/class.medical.php';
include_once DR.'/util/class.util.php';


Class medicineStockDao{
	private $_DB;
	private $_mStock;

	function __construct(){

		$this->_DB = DBUtil::getInstance();
		$this->_mStock = new MedicinesStock();
		//$this->_createPrescriptnSpecificPatient = new Medical();

	}

	public function getAllmedicines(){
		$MedicineInfoArray = array();

		$this->_DB->doQuery("SELECT * FROM med_medicines_stock ");

		$rows = $this->_DB->getAllRows() or die("got busted");
		echo "<br>Size Rows : ".sizeof($rows)."<br>";
		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_mStock = new MedicinesStock();

		    $this->_mStock->setMedicineID ( $row['medicine_id']);
		    $this->_mStock->setMedicineName ( $row['medicine_name']);
		    $this->_mStock->setMedicineStock( $row['medicine_stock'] );

		    $MedicineInfoArray[]=$this->_mStock;
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($MedicineInfoArray);

		return $Result;
	}
	public function addMedicine($medicineStockClass){


		$MedicineID=$medicineStockClass->getMedicineID();
		$MedicineName=$medicineStockClass->getMedicineName();
		$MedicineStock=$medicineStockClass->getMedicineStock();
		//echo "<br>Ok2   <br>";

		$SQL="INSERT INTO med_medicines_stock (medicine_id,medicine_name,medicine_stock) VALUES('$MedicineID','$MedicineName','$MedicineStock') ";

		$SQL = $this->_DB->doQuery($SQL) or die("ai haiiiiii");		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;


	}
	public function updateMedicine($medicineStockClass){


		$MedicineID=$medicineStockClass->getMedicineID();
		$MedicineName=$medicineStockClass->getMedicineName();
		$MedicineStock=$medicineStockClass->getMedicineStock();
		//echo "<br>Ok2   <br>";
		if($_SESSION['update_medicineName'])
		$SQL="UPDATE med_medicines_stock SET medicine_name='$MedicineName' where medicine_id='$MedicineID' ";
		if($_SESSION['update_medicineStock'])
		$SQL="UPDATE med_medicines_stock SET medicine_stock='$MedicineStock' where medicine_id='$MedicineID' ";

		$SQL = $this->_DB->doQuery($SQL) or die("ai haiiiiii");		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;


	}
}

?>