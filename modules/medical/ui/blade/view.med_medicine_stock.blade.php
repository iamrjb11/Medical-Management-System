<?php
	include_once DR.'/util/class.util.php';
	include_once __DIR__.'/../../bao/class.med_medicine_stockbao.php';

	$_mStockBao = new medicineStockBao();
	$_DB = DBUtil::getInstance();

	$medicineStockClass = new MedicinesStock();

	if(isset($_POST['addBtn'])){


		$medicineStockClass->setMedicineID($_DB->secureInput($_POST['add_medicineIDTxt']));
		$medicineStockClass->setMedicineName($_DB->secureInput($_POST['add_medicineNameTxt']));
		$medicineStockClass->setMedicineStock($_DB->secureInput($_POST['add_medicineStockTxt']));

		$_mStockBao->addMedicine($medicineStockClass);
	}
	if(isset($_POST['updateBtn'])){


		$_SESSION['update_medicineName']=0;
		$_SESSION['update_medicineStock']=0;
		$medicineStockClass->setMedicineID($_DB->secureInput($_POST['update_medicineIDTxt']));

		if($_POST['update_medicineNameTxt']!=""){
			
			$_SESSION['update_medicineName']=1;
			$medicineStockClass->setMedicineName($_DB->secureInput($_POST['update_medicineNameTxt']));
		}
		if($_POST['update_medicineStockTxt']!=""){
			
			$_SESSION['update_medicineStock']=1;
			$medicineStockClass->setMedicineStock($_DB->secureInput($_POST['update_medicineStockTxt']));
		}
		$_mStockBao->updateMedicine($medicineStockClass);
	}



?>