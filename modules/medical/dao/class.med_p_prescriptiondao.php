<?php
 
global $prescriptionID;
$_SESSION['pid'] = null;

include_once DR.'/common/class.common.php';
include_once DR.'/common/class.medical.php';
include_once DR.'/util/class.util.php';

class prescriptionListDao{
	private $_DB;
	private $_prescriptionList;
	

	function __construct(){

		$this->_DB = DBUtil::getInstance();
		$this->_medicalClass = new Medical();
		$this->_prescriptionClass = new Prescription();

	}






public function getAllPrescriptionList($PrescriptionV){
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
	public function getMedicinesDetails($DetailsV){
		$doctorID=$DetailsV->getDoctorID();
		$patientID=$DetailsV->getPatientID();
		$date=$DetailsV->getDate();
		$DetailsListArray = array();
		$this->_DB->doQuery("SELECT prescription_id FROM med_prescription where doctor_id='$doctorID' and patient_id='$patientID' and prescribed_date='$date' ");

		$row = $this->_DB->getTopRow() or die("got busted");
		$prescriptionID=$row['prescription_id'];
		$_SESSION['pid'] = $prescriptionID;
		echo "<br>P ID : ".$prescriptionID;
		$this->_DB->doQuery("SELECT * FROM med_prescribed_medicines where prescription_id='$prescriptionID' ");

		$rows = $this->_DB->getAllRows() or die("got busted");
		echo "<br>Size Rows : ".sizeof($rows)."<br>";
		
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

		return $Result;
	}
	public function getTestsDetails($TestDetailsV){
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
	
	public function getDoctorDetails($doctorV){	
		
		$this->_DB->doQuery("SELECT * FROM tbl_user where ID='$doctorV' ");
		$toprow = $this->_DB->getTopRow() or die("aiii hayeeee");

		$this->_prescriptionList = new Medical();

		$this->_prescriptionList->setDoctorFirstName ( $toprow['FirstName']);
	    $this->_prescriptionList->setDoctorLastName ( $toprow['LastName']);


	    $this->_prescriptionList->setDoctorDegrees( $toprow['Degrees'] );
	    $this->_prescriptionList->setDoctorSpecialist( $toprow['Specialist'] );
		   
		

		$Result = new Result();
		$Result->setIsSuccess(1);
		//echo "<br>Echo";
		$Result->setResultObject($this->_prescriptionList);
		return $Result;
	}
	public function AddReportLink($reportLink){

		$Link=$reportLink->getReportLink();
		$TestN=$reportLink->getTestName();
		$prescriptionID = $_SESSION['pres_id'];
		echo $Link." & ".$TestN." & ".$prescriptionID."<br>";
		$sql = "UPDATE med_tests SET report_link='$Link' WHERE prescription_id=$prescriptionID AND test_name='$TestN' ;";
		echo $sql;
		$SQL=$this->_DB->doQuery($sql);
		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;
	}


}


	?>