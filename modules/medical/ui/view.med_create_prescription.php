<?php

// echo __DIR__;	

include_once __DIR__.'/blade/view.med_create_prescription.blade.php';
include_once DR.'/common/class.common.php';
include_once DR.'/common/class.medical.php';
$srlNo=1;
if($_SESSION['pagePBLM']){  //pblm means kon page theke ashse eita pblm=0 mane homepage,pblm=1 mane 									prescribe page theke
	//echo "<br>Ok Done<br>";
	$patientEmailID=$_GET['patientID'];
	$Result=$_prescriptionBao->findSpecificPatient($patientEmailID);
	//Get Object(Main)
	$_patientInfoClass = $Result->getResultObject();
	//echo "<br>Main Name : ".$_patientInfoClass->getAge();

}
if(isset($_GET['dateTT'])){
	$_SESSION['dateT']=$_GET['dateTT'];

	}
?>
<style type="text/css">
	.tableTxtBoxSize{
		width: 150px;
	}
</style>
<div class="panel panel-default">

    <div class="panel-heading" style="text-align: center;font-size: 32px;background-color: #00138e;color: white;">Create Prescription</div>
    <form method="post">
    <div style="padding-top: 10px;">
    <div class="center-block middle" style="margin-left: 400px;" >
    	<label>Patient's Name :  </label>
    	<input type="text" class="form-control" style="width: 50%;" placeholder="Patient's Name" name="patientNameTxt" value="<?php if($_SESSION['pagePBLM']) echo $_patientInfoClass->getPatientFirstName()." ".$_patientInfoClass->getPatientLastName(); ?>" required>
    	<label>Patient's Email :  </label>
    	<input type="text" class="form-control" style="width: 50%;" placeholder="Patient's Email" name="patientEmailTxt" value="<?php if($_SESSION['pagePBLM']) echo $_patientInfoClass->getPatientEmail(); ?>" required>

    	<label>Patient's Age :  </label>
    	<input type="text" class="form-control" style="width: 50%;" placeholder="Patient's Age" name="patientAgeTxt"  value="<?php if($_SESSION['pagePBLM']) echo $_patientInfoClass->getAge(); ?>" required>
    	<label>Patient's Sex :  </label>
    	<input type="text" class="form-control" style="width: 50%;" placeholder="Patient's Sex" name="patientSexTxt" value="<?php if($_SESSION['pagePBLM']) echo $_patientInfoClass->getSex(); ?>" required><br>
    	
    	<label >Date :  </label>
    	<input type="text" placeholder="Date" class="form-control" style="width: 25%;" name="dateTxt" value="<?php if($_SESSION['pagePBLM']) echo $_SESSION['dateT'];

    	 ?>" required><br><br><br>
    	
	</div>
    	<div class="panel-heading" style="text-align: center;font-size: 25px;background-color: green;color: white;">For Medicine</div>
		<table id="tbl" class="table center" style="text-align: center;">
			<tr class="danger">
				<th style="text-align: center;">Srl No.</th>
				<th style="text-align: center;">Medicine Name</th>
				<!-- <th style="text-align: center;">Before Eat Mo</th>
				<th style="text-align: center;">After Eat M</th>
				<th style="text-align: center;">Before Eat No</th>
				<th style="text-align: center;">After Eat No</th>
				<th style="text-align: center;">Before Eat Ni</th>
				<th style="text-align: center;">After Eat Ni</th> -->
				
				<th style="text-align: center;">Before Eat <p><span>*(morning-noon-night)</span></p></th>
				<th style="text-align: center;">After Eat <p><span>*(morning-noon-night)</span></p></th>
				<th style="text-align: center;">Quantity</th>
			</tr>
			<?php 
			if(isset($_GET['dateTT'])){
			?>
			
			<?php
			$prescriptionClass=new Prescription();
			$prescriptionClass->setDoctorID($_DB->secureInput($_GET['doctorID']));
			$prescriptionClass->setPatientID($_DB->secureInput($_SESSION['patientID']));
			$prescriptionClass->setDate($_DB->secureInput($_GET['dateTT']));

			$Result = $_prescriptionBao->getMedicinesDetailsForPrescription($prescriptionClass);
			 if($Result->getIsSuccess()){

				$GetResultMedicineDetails = $Result->getResultObject();
				$i;
				for ($i=0; $i <sizeof($GetResultMedicineDetails) ; $i++) { 
					$MedicineDetails=$GetResultMedicineDetails[$i];
				?>
				<tr class="">
					<td> <label><?php echo $i+1; ?></label></td>
					<td><input type="text" name="medicineN<?php echo $i+1; ?>" value="<?php echo $MedicineDetails->getMedicineName(); ?>" class="form-control"></td>
					<td>
						<input type="text" name="beforeEat<?php echo $i+1; ?>" value="<?php echo $MedicineDetails->getBeforeEat(); ?>" class="form-control" >
					</td>
					<td>
						<input type="text" name="afterEat<?php echo $i+1; ?>" value="<?php echo $MedicineDetails->getAfterEat(); ?>" class="form-control" >
					</td>
					<td><input type="text" name="quantity<?php echo $i+1; ?>" value="<?php echo $MedicineDetails->getQuantity(); ?>" class="form-control" required></td>

				</tr>
					<?php 
					}
					$vall = $i;
					echo "<script> setmedicineSrlN({$vall}) </script>";
					echo "<script> medicineSrlN = $vall ; </script>";
					//echo "<br>i= ".$_COOKIE['medicineSrlN'];
				}

			?>

				
				<?php
			}
			else {
			?>
			<tr class="">
				<td> <label>1</label></td>
				<td><input type="text" name="medicineN1" class="form-control" required></td>
				<!-- <td><input type="text" name="beforeMrng1" class="tableTxtBoxSize" required></td>
				<td><input type="text" name="afterMrng1" class="tableTxtBoxSize" required></td>
				<td><input type="text" name="beforeNoon1" class="tableTxtBoxSize" required></td>
				<td><input type="text" name="afterNoon1" class="tableTxtBoxSize" required></td>
				<td><input type="text" name="beforeNight1" class="tableTxtBoxSize" required></td>
				<td><input type="text" name="afterNight1" class="tableTxtBoxSize" required></td> -->
				
				<td>
					<input type="text" name="beforeEat1" class="form-control" >
				</td>
				<td>
					<input type="text" name="afterEat1" class="form-control" >
				</td>
				<td><input type="text" name="quantity1" class="form-control" required></td>
			</tr>
			<?php 
		}
		?>
		</table>
		
		<div class="panel-heading" style="text-align: center;"><input class="btn btn-success" type="button" name="addMbtn" value="Add Medicine" onclick="createMedicineInfo()"></div>
			
		<div class="panel-heading" style="text-align: center;font-size: 25px;background-color: green;color: white;">For Test</div>
		<div style="text-align: left;">IGNORE IT : <input type="checkbox" name="testCheckBox" checked></div>
		
		<table id="tbl2" class="table" style="text-align: center;">
			<tr class="danger">
				<th style="text-align: center;">Srl No.</th>
				<th style="text-align: center;">Test Name</th>
			</tr>
			<?php 
			if(isset($_GET['dateTT'])){
				$Result = $_prescriptionBao->getTestsDetailsForPrescription($prescriptionClass);

    			if($Result->getIsSuccess()){

				$GetResultTestDetails = $Result->getResultObject();
				//echo "<br>Size : ".sizeof($GetResultTestDetails);
				$i;
				if(sizeof($GetResultTestDetails)){
					for ($i=0; $i <sizeof($GetResultTestDetails) ; $i++) { 
					$TestDetails=$GetResultTestDetails[$i];
			?>
			<tr class="" style="text-align: center;">
				<td> <label><?php echo $i+1; ?></label></td>
				<td><input type="text" name="testN<?php echo $i+1; ?>" class="form-control" value="<?php echo $TestDetails->getTestName(); ?>"></td>
			</tr>
			<?php
					}
					$vall=$i;
					echo "<script> settestSrlN({$vall}) </script>";
					echo "<script> testSrlN = $vall ; </script>";
				}
			}
		}
		else
		{
		?>
		<tr class="" style="text-align: center;">
				<td> <label>1</label></td>
				<td><input type="text" name="testN1" class="form-control"></td>
			</tr>
		<?php
		}
		?>
		</table>
		
		<div class="panel-heading" style="text-align: center;"><input class="btn btn-success" type="button" name="addTbtn" value="Add Test" onclick="createTestInfo()"></div>
		<?php
		if(isset($_GET['dateTT'])){	
		?>
		<div class="panel-heading" style="text-align: center;"><input type="submit" name="update" value="Update" class="btn btn-primary" style="width: 700px;"></div>
		<?php
		}
		else{
		?>	
		<div class="panel-heading" style="text-align: center;"><input type="submit" name="submit" value="Submit" class="btn btn-primary" style="width: 700px;"></div>
		<?php
		}
		?>
		
    </div>
    </form>
	
</div>
<?php
if (isset($_GET['dateTT'])) {
	$createPrescriptionClass =new Prescription();
			$createPrescriptionClass->setDoctorID($_DB->secureInput($_GET["doctorID"]));
			$createPrescriptionClass->setPatientID($_DB->secureInput($_GET['patientID']));
			$createPrescriptionClass->setDate($_DB->secureInput($_GET['dateTT']));

			$prescribeID=$_prescriptionBao->getPrescriptionID($createPrescriptionClass);
			echo "<br>UI P ID ".$prescribeID;
}

?>