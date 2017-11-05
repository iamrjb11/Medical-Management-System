<?php
//echo "<script>console.log("."'"."log:: touch view.medical_doctors_list.php"."'".");</script>";
?>
<?php

// echo __DIR__;	

include_once __DIR__.'/blade/view.med_doctors_list.blade.php';
include_once DR.'/common/class.common.php';
include_once DR.'/common/class.medical.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


?>
<style>
	.links
	{
		cursor: pointer;
	}
</style>
<script type="text/javascript">
	var i1=0;
	document.cookie = "i1 = " + i1;
	function doOnClick_forDropDownList($val){
		if($val==0){
			i1=0;
		}
		else i1=1;
		document.cookie = "i1 = " + i1;
		//document.write(i1);
		return false;
	}
	var doctors = [];
	var arb = [];

</script>
<div class="panel panel-default">

	<!-- <a href="">Get User</a> -->
    
    <div class="panel-heading" style="text-align: center;font-size: 32px;background-color: #00138e;color: white;">Doctors List</div><br>
    <form method="post" class="form-inline">
    <div style="padding-top: 10px;text-align: center;">
    	<label>Dr Name :  </label>
    	<input class="form-control" type="text" placeholder="Dr. Name" name="drSearchTxt">
    	<input type="submit" name="searchBtn" class="btn btn-success" value="Search">

		
	<label style="padding-left: 30px;">Dr Specialization :   </label>
	<select class="form-control" name="ddlCat" onmousedown="this.value='';" onclick="doOnClick_forDropDownList(this.value)" style="height: : 50px;width:150px;">
		
		<option value="0" >All</option>
		<option value="Medicine Specialist" >Medicine Specialist</option>
		<option value="Eye Specialist" >Eye Specialist</option>
		<option value="Skin Specialist" >Skin Specialist</option>
		<option value="Heart Specialist" >Heart Specialist</option>
	</select>
	<input type="submit" class="btn btn-success" name="submitBtn" value="Show">
    </div>
    </form>
    
    <div class="panel-body">
    <?php
    $day="";
    $i1_php = 0;
    if(isset($_COOKIE['i1']))
    {
    	$i1_php = $_COOKIE['i1'];
    }
    //echo "Value : ".$i1_php;

    if (isset($_SESSION["globalUser"])){
	//retreving the logged user from the session 
		$globalUser = $_SESSION["globalUser"];
		//echo "current user id : ".$globalUser->getID()."<br>";
	}
    
	//$this->$_doctorList = new medicalkonBao();
	if(!isset($_POST['searchBtn']) && $i1_php==0){
		$Result = $_doctorListBao->getAlldoctorslist();
	}
	if(isset($_POST['submitBtn'])){
		//echo "<br>2nd Value : ".$i1_php;
		if($i1_php==0){
			$Result = $_doctorListBao->getAlldoctorslist();
		}
		else{ 
			$ddlCategory=$_POST['ddlCat'];
			//echo "<br>Cat : ".$ddlCategory."<br>";
			$Result = $_doctorListBao->getSpecificcategory($ddlCategory);
		}
	}

	if(isset($_POST['searchBtn'])){
		$searchValue=$_POST['drSearchTxt'];
		//echo "<br>Search : ".$searchValue."<br>";
		$Result = $_doctorListBao->getSpecificdoctor($searchValue);

	}
	//if DAO access is successful to load all the Terms then show them one by one
	if($Result->getIsSuccess()){

		$GetResultDoctorList = $Result->getResultObject();
	?> 

		<table class="table table-bordered" style="text-align: center;">
		<tr class="danger">
			<th style="text-align: center;">Email</th>
			<th style="text-align: center;">Profile</th>
			<th style="text-align: center;">Shedule</th>
			<th style="text-align: center;">Select</th>
			<th style="text-align: center;">Get Serial</th>
		</tr>
		<?php
		for($i = 0; $i < sizeof($GetResultDoctorList); $i++) {
			$DoctorsList = $GetResultDoctorList[$i];
			?>
		<tr class="info">
			<td><br><br><?php echo $DoctorsList->getID(); ?></td>
			<td>
			<label name="firstNameLbl"><?php echo $DoctorsList->getDoctorFirstName(); ?>  </label>
			<label name="lastNameLbl"><?php echo $DoctorsList->getDoctorLastName(); ?></label><br>
			<label>
				<?php echo $DoctorsList->getDoctorDegrees(); ?>
			</label><br>
			<label name="specialistLbl">
				<?php echo $DoctorsList->getDoctorSpecialist(); ?> 
			</label><br>
			<label name="placeLbl"> 
				<?php echo $DoctorsList->getDoctorWorkAddress(); ?>
				
			</label><br>
			</td>
			<td><br>
			<label><?php echo $DoctorsList->getDoctorDayShedule(); ?></label><br> 
			<label><?php echo $DoctorsList->getDoctorTimeShedule(); ?></label>
			 </td>
			<td>
				<br>
				<div class="docs" id="daysTag">
					<input type="text" class="datepicker" class="form-control" placeholder="Select Date">
				</div>
			</td>
			<td><br> <br>
				<div class="links" id="serialTag" >
					<a  id="getSerial"  onclick="check(this);" class="danger">Done</a>
				</div>
			</td>
			
			<script>
				// var radio = document.getElementsByName('days');
				// var datee = document.getElementsByName('dateTxt');
				// var sdate = datee.value;
				// console.log(sdate);
				// var len = radio.length;
				// var chck = "Nothin";
				// console.log(radio);
				<?php echo "var dname = "."'".$DoctorsList->getID()."'".";"; ?>
				doctors.push(dname);
				var docs = document.getElementsByClassName('docs');
				var duck = document.getElementsByClassName('links');
				var idx = doctors.length;
				console.log("id so far = "+idx);
				console.log("length = "+docs.length);
				docs[idx-1].setAttribute('id',idx-1);
				duck[idx-1].setAttribute('id',idx-1);
				var link = document.getElementById('getSerial');
				var hrf = window.location.href;
				// //Buji Nai
				// hrf = hrf.indexOf("?") ? hrf.substring(0,hrf.indexOf("?")): hrf;
				// for(var i = 0; i < len; ++i)
				// {
				// 	radio[i].onclick = function()
				// 	{
				// 		chck = this.value;
				// 		console.log(chck);
				// 		var nlink = hrf + "?did=" + dname + "&day=" + chck;
				// 		// link.href = nlink;
				// 	}
				// }
				
				
 				//alert(chck);
			</script>
			
		</tr>
		
		<?php
		}
	}
		?>
		</table>
	</div>
</div>
<?php
if(isset($_GET['did'])){
		$globalUser = $_SESSION["globalUser"];
		//echo $globalUser->getID()."<br>";
		/*echo "Day : ".$_GET['day'];
		echo "<br>doc : ".$_GET['did'];
		echo "<br>date : ".$_GET['date'];
		echo "<br>ALl DONE!";
		*/
		$_prescriptionClass=new Prescription();
		$_prescriptionClass->setDoctorID($_DB->secureInput($_GET['did']));
		$_prescriptionClass->setPatientID($_DB->secureInput($globalUser->getID()));
		$_prescriptionClass->setDay($_DB->secureInput($_GET['day']));
		$_prescriptionClass->setDate($_DB->secureInput($_GET['date']));
		$_doctorListBao->getSerial($_prescriptionClass);
		echo "<script>alert('Success..');</script>";
	}

?>