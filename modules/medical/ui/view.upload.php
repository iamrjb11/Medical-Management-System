
<?php
	include_once DR."/common/class.medical.php";
	include_once "blade/view.med_p_prescription.blade.php";
	$med = new Medical();

	$target_dir = __DIR__."/../../../uploadFiles/";
	$target_file = $target_dir.basename($_FILES['file']["name"]);
	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

	$filename;
	$testName = $_POST['testname'];
	$pname = $_POST['patientid'];
	$seq = $_POST['seq'];

	$newlink = "uploadFiles/";

	$filename = $med->genFileName($pname,$testName);

	echo "shh = " .$filename[1].'.'.$fileType."fck";
	echo "shh = " .$filename[1]."fck";
	$prescriptionClass = new Prescription();
	$prescriptionClass->setReportLink($filename[1].'.'.$fileType);
	$prescriptionClass->setTestName($testName);
	$_prescriptionListBao_blade->AddReportLink($prescriptionClass);

	if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
	}
	else if(move_uploaded_file($_FILES["file"]["tmp_name"], $filename[0].'.'.$fileType))
	{ 
		echo "<br>Success.<br>";
	}
	else
	{
		echo "Failed.";
	}
	
	// echo "<script>";
	// echo "var seq = ".$seq.";";
	// echo "var fname = "."'".$filename[0].'.'.$fileType."'"." ;";
	// echo 'var reqid = "innerlink"+seq; var req = document.getElementById(reqid); var lnk = "http://localhost/medical/uploadFiles/" + fname; req.setAttribute("href",lnk);';
	// echo "console.log(seq + fname + lnk);";
	// echo '</script>';

?>
	
