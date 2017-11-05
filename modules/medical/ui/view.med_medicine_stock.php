<?php

// echo __DIR__;	

include_once __DIR__.'/blade/view.med_medicine_stock.blade.php';
include_once DR.'/common/class.common.php';
include_once DR.'/common/class.medical.php';
$Result = $_mStockBao->getAllmedicines();
?>

<div class="panel panel-default">

<div class="panel-heading" style="text-align: center;font-size: 32px;background-color: #00138e;color: white;">Medicine Stock</div><br>
<div class="panel-heading" style="text-align: center;font-size: 25px;background-color: green;color: white;">All Medicines</div>
<?php
    if($Result->getIsSuccess()){

        $GetResulMedicines = $Result->getResultObject();
?> 

        <table class="table table-bordered" style="text-align: center;">
            <tr class="danger">
                <th style="text-align: center;">Medicine ID</th>
                <th style="text-align: center;">Medicine Name</th>
                <th style="text-align: center;">Medicine Stock</th>
                <th style="text-align: center;">Edit Medicine</th>
            </tr>
            <?php
            for($i = 0; $i < sizeof($GetResulMedicines); $i++) {
                $MedicineInfo = $GetResulMedicines[$i];
                ?>
            <tr class="info">
                <td><?php echo $MedicineInfo->getMedicineID(); ?></td>
                <td><?php echo $MedicineInfo->getMedicineName(); ?></td>
                <td><?php echo $MedicineInfo->getMedicineStock(); ?></td>
                <td><a class="btn btn-danger"  href="http://localhost/medical/med_medicine_stock.php?medID=<?php echo $MedicineInfo->getMedicineID(); ?>&medName=<?php echo $MedicineInfo->getMedicineName(); ?>&medStock=<?php echo $MedicineInfo->getMedicineStock(); ?> ">Edit</a> </td>
            </tr>


        <?php
            }
        }
        ?>

        </table>


    <form method="post"><br><br>

    <p style="font-size: 20px;color: #0d9135;font-weight: bold;">Add Medicine : </p>
    <div style="padding-top: 10px;text-align: center;" class="form-inline">
    <label style="padding-left: 30px;">Medicine ID :  </label>
        <input class="form-control" type="text" placeholder="Medicine ID" name="add_medicineIDTxt">
    <label style="padding-left: 30px;">Medicine Name :  </label>
    	<input class="form-control" type="text" placeholder="Medicine Name" name="add_medicineNameTxt">
	<label style="padding-left: 30px;">Medicine Stock :  </label>
    	<input class="form-control" type="text" placeholder="Medicine Stock" name="add_medicineStockTxt" >
    	
	<input type="submit" name="addBtn" class="btn btn-success" value="Add">

	</div>
    <br>
    <br>

    <p style="font-size: 20px; color: #991d1d;font-weight: bold;">Update Medicine : </p>
    <div style="padding-top: 10px;text-align: center;"  class="form-inline">
    <label style="padding-left: 30px;">Medicine ID :  </label>
        <input  class="form-control" type="text" placeholder="read" name="update_medicineIDTxt" value="<?php if(isset($_GET['medID'])) echo $_GET['medID']; ?>" readonly>
    <label style="padding-left: 30px;">Medicine Name :  </label>
        <input class="form-control" type="text" placeholder="Medicine Name" name="update_medicineNameTxt" value="<?php if(isset($_GET['medName'])) echo $_GET['medName']; ?>">
    <label style="padding-left: 30px;">Medicine Stock :  </label>
        <input class="form-control" type="text" placeholder="Medicine Stock" name="update_medicineStockTxt" value="<?php if(isset($_GET['medStock'])) echo $_GET['medStock']; ?>" >
        
    <input type="submit" name="updateBtn" class="btn btn-danger" value="Update">

    </div>
    </form>
</div>