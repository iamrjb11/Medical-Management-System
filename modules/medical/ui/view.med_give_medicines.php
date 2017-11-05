<?php

// echo __DIR__;	

include_once __DIR__.'/blade/view.med_give_medicines.blade.php';
include_once DR.'/common/class.common.php';
include_once DR.'/common/class.medical.php';

if(isset($_POST['showBtn'])){

    $_SESSION['doctorID'] = $_POST['doctorIDTxt'];
    $_SESSION['patientID'] = $_POST['patientIDTxt'];
    $_SESSION['dateT'] = $_POST['dateTxt'];
}
if(isset($_POST['submitBtn'])){

    $_SESSION['doctorID'] = "";
    $_SESSION['patientID'] = "";
    $_SESSION['dateT'] = "";
}


?>

<div class="panel panel-default">

<div class="panel-heading" style="text-align: center;font-size: 32px;background-color: #00138e;color: white;">Medicine Stock Service</div>
    <form method="post">
    <div class="form-inline" style="padding-top: 10px;text-align: center;">
        <br>
        <label style="padding-left: 150px;">Doctor's ID :  </label>
    	<input class="form-control" type="text" placeholder="Doctor's ID" name="doctorIDTxt" value="<?php echo $_SESSION['doctorID']; ?>" required>
    	<label>Patient's ID :  </label>
    	<input class="form-control" type="text" placeholder="Patient's ID" name="patientIDTxt" value="<?php echo $_SESSION['patientID']; ?>" required>
    	
    	<label >Date :  </label>
    	<input class="datepicker" style="width: 25dx;" type="text" placeholder="Date" name="dateTxt" value="<?php echo $_SESSION['dateT']; ?>" required><br><br>
    	<input class="btn btn-danger" style="width: 150px;" type="submit" name="showBtn" value="Show">

	</div>
    <?php
    if(isset($_POST['showBtn'])){

        $prescriptionClass = new Prescription();
        $prescriptionClass->setDoctorID($_POST['doctorIDTxt']);
        $prescriptionClass->setPatientID($_POST['patientIDTxt']);
        $prescriptionClass->setDate($_POST['dateTxt']);

        $Resut = $_giveMBao->getPatientMedicinesInfoAll($prescriptionClass);

        if($Resut->getIsSuccess()){
            $GetPatientAllInfo = $Resut->getResultObject();
            $_SESSION['medicineSrlNo']=$GetPatientAllInfo;
            $_SESSION['numOfmedicine']=sizeof($GetPatientAllInfo);
    ?>
    <br>
    <div  class="panel-heading" style="font-size: 25px;background-color: green;color: white;">  Medicine Information :</div>
    <table class="table table-bordered" style="text-align: center;">
        <tr class="danger">
            <th style="text-align: center;">Srl No.</th>
            <th style="text-align: center;">Medicine Name</th>
            <th style="text-align: center;">Quantity</th>
            <th style="text-align: center;">Give</th>
        </tr>
        <?php
            for ($i=0; $i <sizeof($GetPatientAllInfo) ; $i++) {
                $GetInfo=$GetPatientAllInfo[$i]; 
                //srlNo($i,$GetInfo->getSrlNo());
            ?>
        <tr class="info">
            <td><?php echo $i+1; ?></td>
            <td><?php echo $GetInfo->getMedicineName(); ?></td>
            <td><?php echo $GetInfo->getQuantity(); ?></td>
            <td><input class="form-control" type="text" name="takeMedicineTxt<?php echo $i+1; ?>"></td>
        </tr>
        <?php
            }
        ?>





    </table>

    

    <?php

        }

        $Resut = $_giveMBao->getPatientTestsInfoAll($prescriptionClass);
        //echo "<br>OK<br>"; 
        if($Resut->getIsSuccess()){
            $GetPatientAllInfo = $Resut->getResultObject();
            if(sizeof($GetPatientAllInfo)!=0){

    ?>

    <div  class="panel-heading" style="font-size: 25px;background-color: green;color: white;">  Test Information :</div>
    <table class="table table-bordered" style="text-align: center;">
        <tr class="danger">
            <th style="text-align: center;">Srl No.</th>
            <th style="text-align: center;">Test Name</th>
            <th style="text-align: center;">Assign Nurse</th>
        </tr>
        <?php
            for ($i=0; $i <sizeof($GetPatientAllInfo) ; $i++) {
                $GetInfo=$GetPatientAllInfo[$i]; 
                //srlNo($i,$GetInfo->getSrlNo());
            ?>
        <tr class="info">
            <td><?php echo $i+1; ?></td>
            <td><?php echo $GetInfo->getTestName(); ?></td>
            <td><input  class="form-control" type="text" name="assignNurseID<?php echo $i+1; ?>"></td>
        </tr>
        <?php
            }
        ?>





    </table>

    <?php

            }
        }
    ?>
    

    
    <div style="text-align: center;"><input class="btn btn-info" style="width: 250px;" type="submit" name="submitBtn" value="Submit"></div>
    <?php
    }
    ?>
    


    </form>

</div>
