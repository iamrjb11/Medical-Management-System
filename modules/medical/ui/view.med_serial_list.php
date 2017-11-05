<?php
include_once __DIR__.'/blade/view.med_serial_list.blade.php';
include_once DR.'/common/class.common.php';
include_once DR.'/common/class.medical.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['pagePBLM']=1;
//$setDate="";
?>
<script type="text/javascript">
	//var date="";
	
	/*document.cookie="date="date;
	function dateF($d) {

		document.cookie="date="$d;

		alret(date);
		return false;
	
	}*/
</script>
<div class="panel panel-default">

	<!-- <a href="">Get User</a> -->
    
    
	<?php
		

		$global_user_doctorN=$_SESSION['globalUser'];
		echo "<br>User : ".$global_user_doctorN->getID();
		if(isset($_POST['dateBtn'])){

			$_SESSION['dateT']=$_POST['dateTxt'];
			echo "<br>Date : ".$_SESSION['dateT'];
			$Result = $_serialListBao_blade->getSpeciDateSeriallist($global_user_doctorN->getID(),$_POST['dateTxt']);
		}
		else
		$Result = $_serialListBao_blade->getSeriallist($global_user_doctorN->getID());

		if($Result->getIsSuccess()){

		$GetResultSerialList = $Result->getResultObject();
	
	?>
	
	<div class="panel-heading" style="text-align: center;font-size: 32px;background-color: #00138e;color: white;">Patient's Serial List</div>
    <form method="post" class="form-horizontal">
    <div style="padding-top: 10px;text-align: center;">
    	<label>Date :  </label>
    	<input type="text" placeholder="Select Date" name="dateTxt" class="datepicker" class="form-control" value="<?php echo $_SESSION['dateT'] ;?>">
    	<input type="submit" name="dateBtn" class="btn btn-success" value="Show">
	</div>
	</form>
    <div class="panel-body">
    <table class="table" style="text-align: center;">
		<tr class="danger">
			<th style="text-align: center;">Patient's Profile</th>
			<th style="text-align: center;">Serial Date</th>
			<th style="text-align: center;">Prescribe</th>
			<th style="text-align: center;">History</th>
		</tr>
		<?php
		for($i = 0; $i < sizeof($GetResultSerialList); $i++) {
			$SerialList = $GetResultSerialList[$i];
			?>
		<tr class="info">
			<td><br>
			<label>Full Name : </label >
				<label name="firstNameLbl"><?php echo $SerialList->getPatientFirstName(); ?></label>
				<label name="lastNameLbl"><?php echo $SerialList->getPatientLastName(); ?></label><br>
			<label>Email : </label>
				<label name="emailLbl"><?php echo $SerialList->getPatientEmail(); ?></label><br>
			<label>Age : </label>
				<label name="ageLbl"><?php echo $SerialList->getAge(); ?></label><br>
			<label>Sex : </label>
				<label name="sexLbl"><?php echo $SerialList->getSex(); ?></label><br>
			</td>
			<td><br><br><label name="dateLbl"><?php echo $SerialList->getDate(); ?></label></td>
			<td><br><br><a class="btn btn-danger" href="http://localhost/medical/med_create_prescription.php?patientID=<?php echo $SerialList->getPatientEmail(); ?>">Click</a></td>
			<td><br><br><a class="btn btn-danger" href="http://localhost/medical/med_prescription_history.php?patientID=<?php echo $SerialList->getPatientEmail(); ?>">History</a></td>
		</tr>
		<?php
		}
	}  
		?>
	</table>
	</div>

		
</div>
<?php  

?>