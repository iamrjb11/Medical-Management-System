<?php
	echo "<script>console.log("."'"."log:: touch view.medical_doctors_list.blade.php"."'".");</script>";
?>
<?php
	include_once DR.'/util/class.util.php'; 
	include_once __DIR__.'/../../bao/class.med_doctors_listbao.php';

	$_doctorListBao = new medicalDoctorsListBao();
	$_DB = DBUtil::getInstance();

	$DoctorsListClass = new Medical();

	

 ?>
 