 <?php

echo "<script>console.log("."'"."log:: touch body.php"."'".");</script>";
 ?>
<div class="row">
	<div class="col-sm-12">
		<?php
			//TODO: check whether routing is active
			if(isset($page) && apply_routing($page)){
				//echo 'test again:'.$page;
				include $page;
			}
			else
			{
				echo "not set page<br>";
			}
		?>
	</div>
</div>
