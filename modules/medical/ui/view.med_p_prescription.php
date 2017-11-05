<?php
echo "<script>console.log("."'"."log:: touch view.nurse.php"."'".");</script>";
?>
<?php

// echo __DIR__;	

include_once __DIR__.'/blade/view.med_p_prescription.blade.php';
include_once DR.'/common/class.common.php';
include_once DR.'/common/class.medical.php';

$Result = $_prescriptionListBao_blade->getAllPrescriptionList($_SESSION['globalUser']->getID());

?>


<div class="panel panel-default">
    
    <div class="panel-heading" style="text-align: center;font-size: 32px;background-color: #00138e;color: white;">My Prescriptions</div>
    
    <div class="panel-body">
    <?php
    if($Result->getIsSuccess()){

		$GetResultPrescriptionList = $Result->getResultObject();
    ?>
    <table class="table table-bordered" style="text-align: center;">
    	<tr class="danger">
    		<th style="text-align: center;">Srl No.</th>
    		<th style="text-align: center;">Doctor Profile</th>
    		<th style="text-align: center;">Date</th>
    		<th style="text-align: center;">Details</th>
    	</tr>
    	<?php
		for($i = 0; $i < sizeof($GetResultPrescriptionList); $i++) {
			$prescriptionList = $GetResultPrescriptionList[$i];
			?>
    	<tr class="info">
    		<td> <?php echo $i+1;?> </td>
    		<td>
    			<label name="firstNameLbl"><?php echo $prescriptionList->getDoctorFirstName(); ?>  </label>
			<label name="lastNameLbl"><?php echo $prescriptionList->getDoctorLastName(); ?></label><br>
			<label>
				<?php echo $prescriptionList->getDoctorDegrees(); ?>
			</label><br>
			<label name="specialistLbl">
				<?php echo $prescriptionList->getDoctorSpecialist(); ?> 
			</label>
    		</td>
    		<td><br> <?php echo $prescriptionList->getDate(); ?> </td>
    		<td><br><br><a href="http://localhost/medical/med_p_prescription.php?doctorEmail=<?php echo $prescriptionList->getDoctorEmail(); ?>&dateT=<?php echo $prescriptionList->getDate(); ?>">Click</a></td>
    	</tr>
    	<?php
    	}
    	?>
    </table>
    <?php
	}
	if (isset($_GET['dateT'])) {
		//echo "<br>URL : ".$_SERVER['REQUEST_URI'];
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		//echo "<br>URL : ".$actual_link;
		$prescriptionClass=new Prescription();
		$prescriptionClass->setDoctorID($_DB->secureInput($_GET['doctorEmail']));
		$prescriptionClass->setPatientID($_DB->secureInput($_SESSION['globalUser']->getID()));
		$prescriptionClass->setDate($_DB->secureInput($_GET['dateT']));

		$Result = $_prescriptionListBao_blade->getDoctorDetails($_GET['doctorEmail']);

		$GetResultDoctor = $Result->getResultObject();
		$Result = $_prescriptionListBao_blade->getMedicinesDetails($prescriptionClass);

    if($Result->getIsSuccess()){

		$GetResultMedicineDetails = $Result->getResultObject();
    ?>
    <div style="background-color: gray;padding-top: 20px;"></div>
	<div style="padding-top: 10px;text-align: center;font-size: 20px;background-color: #62c6d1;color: white;"><br>
    	<label><?php echo $GetResultDoctor->getDoctorFirstName(); ?></label>
    	
    	<label><?php echo " ".$GetResultDoctor->getDoctorLastName(); ?></label>
    	<br>

    	<label>
				<?php echo $prescriptionList->getDoctorDegrees(); ?>
					
			</label><br>
    	<label>
				<?php echo $prescriptionList->getDoctorSpecialist(); ?>
					
		</label><br>
    	
    	<label>
				<?php echo $_GET['dateT']; ?>
					
				</label><br><br><br>
    	
	</div>
    	<div class="panel-heading" style="font-size: 25px;background-color: green;color: white;">Medicine Information</div>

		<table id="tbl" class="table table-bordered" style="text-align: center;">
			<tr class="danger">
				<th style="text-align: center;">Srl No.</th>
				<th style="text-align: center;">Medicine Name</th>
				<th style="text-align: center;">Before Eat</th>
				<th style="text-align: center;">After Eat</th>
				<th style="text-align: center;">Quantity</th>
				<th style="text-align: center;">Given Quantity</th>
			</tr>
			<?php
				for ($i=0; $i <sizeof($GetResultMedicineDetails) ; $i++) { 
					$MedicineDetails=$GetResultMedicineDetails[$i];
				
			?>
			<tr class="info">
				<td><?php echo $i+1; ?></td>
				<td><?php echo $MedicineDetails->getMedicineName(); ?></td>
				<td><?php echo $MedicineDetails->getBeforeEat(); ?></td>
				<td><?php echo $MedicineDetails->getAfterEat(); ?></td>
				<td><?php echo $MedicineDetails->getQuantity(); ?></td>
				<td><?php echo $MedicineDetails->getGivenQuantity(); ?></td>
			</tr>
			<?php
			}
			?>
		</table>

		




	<?php
	}

	$Result = $_prescriptionListBao_blade->getTestsDetails($prescriptionClass);

    if($Result->getIsSuccess()){

		$GetResultTestDetails = $Result->getResultObject();
		//echo "<br>Size : ".sizeof($GetResultTestDetails);
		if(sizeof($GetResultTestDetails)){
	?>
	<div class="panel-heading" style="font-size: 25px;background-color: green;color: white;">Test Information</div>

		<table id="tbl" class="table table-bordered" style="text-align: center;">
			<tr class="danger">
				<th style="text-align: center;">Srl No.</th>
				<th style="text-align: center;">Test Name</th>
				<th style="text-align: center;">Assign Nurse</th>
				<th style="text-align: center;">Attach Report </th>
				<th style="text-align: center;">Report Link</th>
			</tr>
			<?php
				for ($i=0; $i <sizeof($GetResultTestDetails) ; $i++) { 
					$TestDetails=$GetResultTestDetails[$i];
				
			?>
			<tr class="info">
				<td><?php echo $i+1; ?></td>
				<td><?php echo $TestDetails->getTestName(); ?></td>
				<td><?php echo $TestDetails->getNurseID(); ?></td>
				<td> 
				<form enctype="multipart/form-data" method="post" id="uploads">
				<input id="<?php echo 'rep'.$i; ?>" type="file" name="fileUpload">
				<input type="hidden" id="<?php echo 'tst'.$i; ?>" name="<?php echo 'tst'.$i; ?>" class="x" value="<?php echo $TestDetails->getTestName(); ?>">
				<input type="hidden" id="<?php echo 'pat'.$i; ?>" name="<?php echo 'pat'.$i; ?>" class="y" value="<?php echo $_SESSION['globalUser']->getID(); ?>">
				<input type="button" id="<?php echo $i; ?>" name="<?php echo 'up'.$i; ?>" value="Upload" onclick="uploadFile(<?php echo $i; ?>);">
				<br>
				<p id="<?php echo 'stat'.$i; ?>"></p>
				</form>
				</td>
				<td id="<?php echo 'link'.$i; ?>"><?php
					$link = $TestDetails->getReportLink();
					$path = "http://localhost/medical/uploadFiles/".$link;
					if(empty($link)) 
					{
						echo "Not Uploaded.";
					}
					else
					{
						echo "<a id="."'".'innerlink'.$i."'"." href='$path'".">Download</a>";
					}
				 ?></td>
			</tr>
			<?php
			}
			?>
		</table>

	<?php
		
		}
	}
}
    ?>
	</div>
</div>