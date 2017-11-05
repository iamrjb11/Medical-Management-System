<?php

include_once 'blade/view.home.blade.php';

?>



<div class="col-sm-12">

<?php
			if(isset($globalMenu)){
				echo print_dashboard_body_tab($globalMenu);
			}
			//Medical Service
			$_SESSION['dateT']="";
			$_SESSION['pagePBLM']=0; //create_prescription.php
			//medicine_stock.php
			$_SESSION['showS']=0;
			
			$_SESSION['doctorID']=""; //give_medicines.php
			$_SESSION['patientID']=""; //give_medicines.php and doctor see prescription using this






?>	        

</div>






