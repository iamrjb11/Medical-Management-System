<?php
// write dao object for each class
include_once DR.'/common/class.common.php';
include_once DR.'/common/class.medical.php';
include_once DR.'/util/class.util.php';


Class createPrescriptionDao{
	private $_DB;
	private $_createPrescriptn;
	private $_createPrescriptnSpecificPatient;

	function __construct(){

		$this->_DB = DBUtil::getInstance();
		$this->_createPrescriptn = new Prescription();
		$this->_createPrescriptnSpecificPatient = new Medical();

	}

	public function createPrescription($createPrescriptionV){
		$PrescriptionID=$createPrescriptionV->getPrescriptionID();
		$DoctorID=$createPrescriptionV->getDoctorID();
		$PatientID=$createPrescriptionV->getPatientID();
		$Date=$createPrescriptionV->getDate();
		//echo "<br>Ok2   <br>";

		$SQL="INSERT INTO med_prescription(prescription_id,doctor_id,patient_id,prescribed_date) VALUES('$PrescriptionID','$DoctorID','$PatientID','$Date') ";

		$SQL = $this->_DB->doQuery($SQL) or die("ai haiiiiii");		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;


	}
	public function getPrescriptionIDValue(){
		$this->_DB->doQuery("SELECT * FROM med_prescription ");

		$rows = $this->_DB->getAllRows() or 0;
		$size=sizeof($rows);
		return $size;
	}
	public function deleteInfo($pID){

		$SQL="DELETE FROM `med_prescribed_medicines` WHERE `med_prescribed_medicines`.`prescription_id` = $pID;";
		$SQL = $this->_DB->doQuery($SQL) or die("ai haiiiiii");		
		
		$pql = "DELETE FROM `med_tests` WHERE `med_tests`.`prescription_id` = $pID";
		$pql = $this->_DB->doQuery($pql) or die("died");

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		//$Result->setResultObject($SQL);

		return $Result;

	}
	
	public function getPrescriptionID($DetailsV){
		$doctorID=$DetailsV->getDoctorID();
		$patientID=$DetailsV->getPatientID();
		$date=$DetailsV->getDate();
		//echo "<br>P ".$patientID;
		$DetailsListArray = array();
		$this->_DB->doQuery("SELECT prescription_id FROM med_prescription where doctor_id='$doctorID' and patient_id='$patientID' and prescribed_date='$date' ");

		$row = $this->_DB->getTopRow() or die("got busted");
		$prescriptionID=$row['prescription_id'];
		return $prescriptionID;
	}
	public function createPrescriptionMedicine($createPrescriptionMedicineV){
		$PrescriptionID=$createPrescriptionMedicineV->getPrescriptionID();
		$MedicineName=$createPrescriptionMedicineV->getMedicineName();
		$BeforeEat=$createPrescriptionMedicineV->getBeforeEat();
		$AfterEat=$createPrescriptionMedicineV->getAfterEat();
		$Quantity=$createPrescriptionMedicineV->getQuantity();
		$SQL="INSERT INTO med_prescribed_medicines(prescription_id,medicine_name,before_eat,after_eat,quantity) VALUES('$PrescriptionID','$MedicineName','$BeforeEat','$AfterEat','$Quantity') ";

		$SQL = $this->_DB->doQuery($SQL) or die("ai haiiiiii");		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;
	}
	public function createPrescriptionTest($createPrescriptionTestV){
		$PrescriptionID=$createPrescriptionTestV->getPrescriptionID();
		$TestName=$createPrescriptionTestV->getTestName();
		$SQL="INSERT INTO med_tests (prescription_id,test_name) VALUES('$PrescriptionID','$TestName')";
		$SQL = $this->_DB->doQuery($SQL) or die("ai haiiiiii");		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}
	public function findSpecificPatient($patientEmailID){


		$this->_DB->doQuery("SELECT * FROM tbl_user where ID='$patientEmailID' ");

		$rows = $this->_DB->getAllRows() or die("got busted");
		$row=$rows[0];
		//echo "<br>Dao Name : ".$row['FirstName'];
		$this->_createPrescriptnSpecificPatient = new Medical();

	    $this->_createPrescriptnSpecificPatient->setID($row['Email']);
	    $this->_createPrescriptnSpecificPatient->setPatientEmail($row['Email']);
	    $this->_createPrescriptnSpecificPatient->setPatientFirstName($row['FirstName']);
	    $this->_createPrescriptnSpecificPatient->setPatientLastName($row['LastName']);
	    $this->_createPrescriptnSpecificPatient->setAge($row['Age']);
	    $this->_createPrescriptnSpecificPatient->setSex($row['Sex']);


	    $PatientInfo=$this->_createPrescriptnSpecificPatient;
		

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($PatientInfo);

		return $Result;
	}
	public function getMedicinesDetailsForPrescription($DetailsV){
		
		$doctorID=$DetailsV->getDoctorID();
		$patientID=$DetailsV->getPatientID();
		$date=$DetailsV->getDate();
		//echo "<br>P ".$patientID;
		$DetailsListArray = array();
		$this->_DB->doQuery("SELECT prescription_id FROM med_prescription where doctor_id='$doctorID' and patient_id='$patientID' and prescribed_date='$date' ");

		$row = $this->_DB->getTopRow() or die("got busted");
		$prescriptionID=$row['prescription_id'];
		$_SESSION['pid'] = $prescriptionID;
		//echo "<br>P ID : ".$prescriptionID;
		$this->_DB->doQuery("SELECT * FROM med_prescribed_medicines where prescription_id='$prescriptionID' ");

		$rows = $this->_DB->getAllRows() or die("got busted");
		//echo "<br>Size Rows : ".sizeof($rows)."<br>";
		
		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			//$doctorID=$row['doctor_id'];
			//$this->_DB->doQuery("SELECT * FROM tbl_user where ID='$doctorID' ");
			//$toprows = $this->_DB->getTopRow() or die("aiii hayeeee");
			
			$this->_prescriptionClass = new Prescription();

		    $this->_prescriptionClass->setMedicineName ( $row['medicine_name']);
		    $this->_prescriptionClass->setBeforeEat ( $row['before_eat']);
		    $this->_prescriptionClass->setAfterEat ( $row['after_eat']);
		    $this->_prescriptionClass->setQuantity ( $row['quantity']);
		    
		    $this->_prescriptionClass->setGivenQuantity ( $row['given_quantity']);
		   


		    $DetailsListArray[]=$this->_prescriptionClass;
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($DetailsListArray);
		//echo "<br>Me OK1<br>";

		return $Result;
	}
	public function getTestsDetailsForPrescription($TestDetailsV){
		$doctorID=$TestDetailsV->getDoctorID();
		$patientID=$TestDetailsV->getPatientID();
		$date=$TestDetailsV->getDate();

		$TestDetailsArray = array();

		$this->_DB->doQuery("SELECT prescription_id FROM med_prescription where doctor_id='$doctorID' and patient_id='$patientID' and prescribed_date='$date' ");
		$row = $this->_DB->getTopRow() or die("got busted");
		$prescriptionID=$row['prescription_id'];
		$_SESSION['pres_id'] = $prescriptionID;
		//echo "<br>P ID : ".$prescriptionID;
		$this->_DB->doQuery("SELECT * FROM med_tests where prescription_id='$prescriptionID' ");
		
		if($rows = $this->_DB->getAllRows()){
			//echo "<br>Size Rows : ".sizeof($rows)."<br>";
			
			for($i = 0; $i < sizeof($rows); $i++) {
				$row = $rows[$i];
				//$doctorID=$row['doctor_id'];
				//$this->_DB->doQuery("SELECT * FROM tbl_user where ID='$doctorID' ");
				//$toprows = $this->_DB->getTopRow() or die("aiii hayeeee");
				
				$this->_prescriptionClass = new Prescription();

			    $this->_prescriptionClass->setTestName ( $row['test_name']);
			    $this->_prescriptionClass->setNurseID ( $row['nurse_id']);
			    $this->_prescriptionClass->setReportLink ( $row['report_link']);
			    


			    $TestDetailsArray[]=$this->_prescriptionClass;
			}

		//todo: LOG util with level of log
		}

		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($TestDetailsArray);

		return $Result;
	}

	
}




?>