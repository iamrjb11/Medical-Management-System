<?php

	include_once DR.'/util/class.util.php'; 
	include_once __DIR__.'/../../bao/class.med_p_prescriptionbao.php';
	$_prescriptionListBao_blade = new prescriptionListBao();
	$_DB = DBUtil::getInstance();


	// if (isset($_POST['fileUpload'])) {
	// 		$target_dir = "./uploads/";


	// 		$target_file = $target_dir.basename($_FILES['report']["name"]) ;

	// 		$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

	// 		$target_fileFull = $target_dir.$target_file.'.'.$fileType;
	// 		if(move_uploaded_file($_FILES["report"]["tmp_name"], $target_fileFull)){ 
	// 		echo "<br>Success<br>";
	// 		}


	// 		$prescriptionClass = new Prescription();
	// 		$prescriptionClass->setReportLink($target_fileFull);
	// 		$prescriptionClass->setTestName("Report");
	// 		$_prescriptionListBao_blade->AddReportLink($prescriptionClass);
	// 		//$File->setLink($target_file);

	// 	}
?>