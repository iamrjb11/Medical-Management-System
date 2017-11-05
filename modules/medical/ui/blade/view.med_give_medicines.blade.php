<?php
	include_once DR.'/util/class.util.php';
	include_once __DIR__.'/../../bao/class.med_give_medicinesbao.php';

	$_giveMBao = new giveMedicinesBao();
	$_DB = DBUtil::getInstance();

    $prescriptionClass = new Prescription();
   
    
    
	if(isset($_POST['submitBtn'])){
		//$prescriptionClass = new Prescription();
        $prescriptionClass->setDoctorID($_POST['doctorIDTxt']);
        $prescriptionClass->setPatientID($_POST['patientIDTxt']);
        $prescriptionClass->setDate($_POST['dateTxt']);

        $Resut = $_giveMBao->getPatientMedicinesInfoAll($prescriptionClass);

        if($Resut->getIsSuccess()){
            $GetPatientAllInfo = $Resut->getResultObject();
            
			for ($i=0; $i < sizeof($GetPatientAllInfo); $i++) {
				$GetInfo=$GetPatientAllInfo[$i];
				//echo "<br>R : ".$GetInfo->getSrlNo(); 
				$j=$i+1;
				$prescriptionClass->setSrlNo($_DB->secureInput( $GetInfo->getSrlNo() ));
				$prescriptionClass->setQuantity($_DB->secureInput($_POST['takeMedicineTxt'.$j]));
				$_giveMBao->giveMedicines($prescriptionClass);
			}

		}

        $Resut = $_giveMBao->getPatientTestsInfoAll($prescriptionClass);

        if($Resut->getIsSuccess()){
            $GetPatientAllInfo = $Resut->getResultObject();

            for ($i=0; $i < sizeof($GetPatientAllInfo); $i++) { 
            	$GetInfo=$GetPatientAllInfo[$i];
				//echo "<br>R : ".$GetInfo->getSrlNo(); 
				$j=$i+1;
				$prescriptionClass->setSrlNo($_DB->secureInput( $GetInfo->getSrlNo() ));
				$prescriptionClass->setNurseID($_DB->secureInput($_POST['assignNurseID'.$j]));
				$_giveMBao->assignNurse($prescriptionClass);
            }
        }
	}




?>