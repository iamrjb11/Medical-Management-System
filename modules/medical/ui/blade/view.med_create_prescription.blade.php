<?php
	include_once DR.'/util/class.util.php';
	include_once __DIR__.'/../../bao/class.med_create_prescriptionbao.php';

	$_prescriptionBao = new createPrescriptionBao();
	$_DB = DBUtil::getInstance();

	$createPrescriptionClass = new Prescription();
 	/*if(isset($_POST['submit'])) {
 		echo "<br>Cookie Value : ".$_COOKIE['medicineSrlN'];
 		echo "<br>Cookie Value Test : ".$_COOKIE['testSrlN'];
 	}*/
	if ( (isset($_POST['submit'])) || (isset($_POST['update'])) ) {
		if(isset($_POST['submit'])){
			$prescribeID=$_prescriptionBao->getPrescriptionIDValue();
			$prescribeID++;
			$createPrescriptionClass->setPrescriptionID($_DB->secureInput($prescribeID));
			$createPrescriptionClass->setDoctorID($_DB->secureInput($_SESSION["globalUser"]->getID()));
			$createPrescriptionClass->setPatientID($_DB->secureInput($_POST['patientEmailTxt']));
			$createPrescriptionClass->setDate($_DB->secureInput($_POST['dateTxt']));

			$_prescriptionBao->createPrescription($createPrescriptionClass);
		}
		if(isset($_POST['update'])){


			$prescribeID=$_prescriptionBao->getPrescriptionIDValue();
			$_prescriptionBao->deleteInfo($prescribeID);
			echo "<br>P ID : ".$prescribeID;
		}
		//$presID=1;
		
		
		$medicinesrlNo=$_COOKIE['medicineSrlN'];
		//echo "<br>Medicine : ".$medicinesrlNo;
		//echo "<br>PresID : ".$prescribeID;
	for ($i=1; $i <=$medicinesrlNo ; $i++) {
		$createPrescriptionClass->setPrescriptionID($_DB->secureInput($prescribeID));
		$createPrescriptionClass->setMedicineName($_DB->secureInput($_POST['medicineN'.$i]));
		$createPrescriptionClass->setQuantity($_DB->secureInput($_POST['quantity'.$i]));

		$createPrescriptionClass->setBeforeEat($_DB->secureInput($_POST['beforeEat'.$i]));
		$createPrescriptionClass->setAfterEat($_DB->secureInput($_POST['afterEat'.$i]));


		$_prescriptionBao->createPrescriptionMedicine($createPrescriptionClass);

		/*$be = $_DB->secureInput($_POST['be']);
		$ae = $_DB->secureInput($_POST['ae']);

		$bes = explode("-",$be);
		$aes = explode("-",$ae);

		var_dump($bes);
		var_dump($aes);

		$createPrescriptionClass->setBeforeEatMorning($bes[0]);
		$createPrescriptionClass->setBeforeEatNoon($bes[1]);
		$createPrescriptionClass->setBeforeEatNight($bes[2]);

		$createPrescriptionClass->setAfterEatMorning($aes[0]);

*/			
	}
	$testsrlNo=$_COOKIE['testSrlN'];
	echo "<br>Test Srl : ".$testsrlNo;
	if(!isset($_POST['testCheckBox'])){
		echo "<br>Check : <br>";
		for ($i=1; $i <=$testsrlNo ; $i++) {
			$createPrescriptionClass->setPrescriptionID($_DB->secureInput($prescribeID));
			$createPrescriptionClass->setTestName($_DB->secureInput($_POST['testN'.$i]));

			$_prescriptionBao->createPrescriptionTest($createPrescriptionClass);	
		}
	}
}

 ?>