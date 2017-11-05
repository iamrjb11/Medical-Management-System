<?php

	include_once DR.'/util/class.util.php'; 
	include_once __DIR__.'/../../bao/class.med_prescription_historybao.php';

	$_prescriptionHistoryBao_blade = new prescriptionHistoryBao();
	
	$_DB = DBUtil::getInstance();
	
?>