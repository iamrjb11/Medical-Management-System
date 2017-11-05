<?php
 
global $prescriptionID;
$_SESSION['pid'] = null;

include_once DR.'/common/class.common.php';
include_once DR.'/common/class.medical.php';
include_once DR.'/util/class.util.php';

class prescriptionHistoryDao{
	private $_DB;
	private $_prescriptionHistory;
	

	function __construct(){

		$this->_DB = DBUtil::getInstance();
		$this->_medicalClass = new Medical();
		$this->_prescriptionClass = new Prescription();

	}






public function getPrescriptionHistoryList($PrescriptionV){
		$prescriptionListArray = array();

		$this->_DB->doQuery("SELECT * FROM med_prescription where patient_id='$PrescriptionV' ");

		$rows = $this->_DB->getAllRows() or die("got busted");
		echo "<br>Size Rows : ".sizeof($rows)."<br>";
		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$doctorID=$row['doctor_id'];
			$this->_DB->doQuery("SELECT * FROM tbl_user where ID='$doctorID' ");
			$toprows = $this->_DB->getTopRow() or die("aiii hayeeee");
			
			$this->_medicalClass = new Medical();

		    $this->_medicalClass->setDoctorEmail ( $toprows['Email']);
		    $this->_medicalClass->setDoctorFirstName ( $toprows['FirstName']);
		    $this->_medicalClass->setDoctorLastName ( $toprows['LastName']);


		    $this->_medicalClass->setDoctorDegrees( $toprows['Degrees'] );
		    $this->_medicalClass->setDoctorSpecialist( $toprows['Specialist'] );
		   
		    $this->_medicalClass->setDate( $row['prescribed_date'] );
		   


		    $prescriptionListArray[]=$this->_medicalClass;
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($prescriptionListArray);

		return $Result;
	}
	public function getDoctorDetailsForHistory($doctorV){	
		//echo "<br>Doctor OK0<br>";
		$this->_DB->doQuery("SELECT * FROM tbl_user where ID='$doctorV' ");
		$toprow = $this->_DB->getTopRow() or die("aiii hayeeee");

		$this->_prescriptionList = new Medical();

		$this->_prescriptionList->setDoctorFirstName ( $toprow['FirstName']);
	    $this->_prescriptionList->setDoctorLastName ( $toprow['LastName']);


	    $this->_prescriptionList->setDoctorDegrees( $toprow['Degrees'] );
	    $this->_prescriptionList->setDoctorSpecialist( $toprow['Specialist'] );
		   
		

		$Result = new Result();
		$Result->setIsSuccess(1);
		//echo "<br>Doctor OK<br>";
		$Result->setResultObject($this->_prescriptionList);
		return $Result;
	}
	public function getMedicinesDetailsForHistory($DetailsV){
		
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
	public function getTestsDetailsForHistory($TestDetailsV){
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