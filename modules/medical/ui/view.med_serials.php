<?php
	include_once DR.'/util/class.util.php';
	include_once 'blade/view.med_serials.blade.php';
	$guser = $_SESSION['globalUser'];
	$Result = $serialList->getSeriallist($guser->getID());
	if($Result->getIsSuccess()){
		$res = $Result->getResultObject();
	

?>
<div class="panel panel-default table-responsive">

    <div class="panel-heading" style="text-align: center;font-size: 32px;background-color: #00138e;color: white;">My Serials</div>
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Doctor Name</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				for($i=0;$i<sizeof($res);$i++)
				{
					$serial = $res[$i];
				
			?> 
			<tr>
				<th scope="row"><?php echo $i+1; ?></th>
				<td><?php echo $serial->getDoctorFirstName()." ".$serial->getDoctorLastName(); ?></td>
				<td><?php echo $serial->getDate(); ?></td>
			</tr>
			<?php
			}
			}
			 ?>
		</tbody>
	</table>
</div>