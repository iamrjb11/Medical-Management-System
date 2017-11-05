<?php
	include_once DR.'/util/class.util.php';
	include_once __DIR__.'/../../bao/class.med_serialsbao.php';
	$serialList = new medicalSerialsBao();
	$_DB = DBUtil::getInstance();
?>