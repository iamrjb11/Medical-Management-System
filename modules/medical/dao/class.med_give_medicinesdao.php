<?php
// write dao object for each class
include_once DR.'/common/class.common.php';
include_once DR.'/common/class.medical.php';
include_once DR.'/util/class.util.php';


Class giveMedicinesDao{
	private $_DB;
	private $_giveMDao;

	function __construct(){

		$this->_DB = DBUtil::getInstance();
		$this->_giveMDao = new Prescription();
		//$this->_createPrescriptnSpecificPatient = new Medical();

	}
	public function getPatientMedicinesInfoAll($prescriptionV){
		$DoctorID=$prescriptionV->getDoctorID();
		$PatientID=$prescriptionV->getPatientID();

		$MedicineInfoArray = array();

		$SQL = $this->_DB->doQuery("SELECT prescription_id FROM med_prescription where doctor_id='$DoctorID' and patient_id='$PatientID' ");

		//echo "<br>ID : ".$SQL;

		$row = $this->_DB->getTopRow() or die("got busted");
		$prescriptionID = $row['prescription_id'];

		$SQL = $this->_DB->doQuery("SELECT * FROM med_prescribed_medicines where  prescription_id='$prescriptionID' ");
		$rows = $this->_DB->getAllRows() or die("got busted");
		

		//echo "<br>ID : ".$row['prescription_id']."<br>";
		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_mStock = new Prescription();

		    $this->_mStock->setSrlNo ( $row['srl_no']);
		    $this->_mStock->setMedicineName ( $row['medicine_name']);
		    $this->_mStock->setQuantity( $row['quantity'] );

		    $MedicineInfoArray[] = $this->_mStock;
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($MedicineInfoArray);

		return $Result;

	}
	public function getPatientTestsInfoAll($prescriptionV2){
		$DoctorID = $prescriptionV2->getDoctorID();
		$PatientID = $prescriptionV2->getPatientID();

		$TestInfoArray = array();

		$SQL = $this->_DB->doQuery("SELECT prescription_id FROM med_prescription where doctor_id='$DoctorID' and patient_id='$PatientID' ");

		//echo "<br>ID : ".$SQL;

		$row = $this->_DB->getTopRow() or die(0);
		$prescriptionID = $row['prescription_id'];
		//echo "<br>DAO OK ID".$prescriptionID;

		$SQL = $this->_DB->doQuery("SELECT * FROM med_tests where prescription_id='$prescriptionID' ");
		//echo "<br>OK";
		if($rows = $this->_DB->getAllRows()){
			//echo "<br>DAO OK Size : ".$rows;

			//echo "<br>ID : ".$row['prescription_id']."<br>";
			for($i = 0; $i < sizeof($rows); $i++) {
				$row = $rows[$i];
				$this->_mStock = new Prescription();

			    $this->_mStock->setSrlNo ( $row['srl_no']);
			    $this->_mStock->setTestName ( $row['test_name']);

			    $TestInfoArray[] = $this->_mStock;
			}
		}

		//todo: LOG util with level of log
		//echo "<br>DAO OK<br>";

		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($TestInfoArray);

		return $Result;

	}

	public function giveMedicines($giveMedicinesV){
		$srlNO=$giveMedicinesV->getSrlNo();
		$givenQuantity=$giveMedicinesV->getQuantity();

		$SQL="UPDATE med_prescribed_medicines SET given_quantity='$givenQuantity' WHERE srl_no='$srlNO' ";

		$SQL = $this->_DB->doQuery($SQL) or die("aiii hayeeeeeeee");		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}
	public function assignNurse($assignNurseV){
		$srlNO=$assignNurseV->getSrlNo();
		$NurseID=$assignNurseV->getNurseID();

		$SQL="UPDATE med_tests SET nurse_id='$NurseID' WHERE srl_no='$srlNO' ";

		$SQL = $this->_DB->doQuery($SQL) or die("aiii hayeeeeeeee");		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}
}

?>