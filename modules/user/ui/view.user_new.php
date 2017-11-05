<?php

include_once __DIR__.'/blade/view.user_new.blade.php';
include_once DR.'/common/class.common.php';

?>


<div class="panel panel-default">

	<script type="text/javascript">



		function validatePassword(){

		var password = document.getElementById("txtPassword"); 
		var confirm_password = document.getElementById("txtConfirmPassword");

	
		  if(password.value != confirm_password.value) {
		    confirm_password.setCustomValidity("Passwords Don't Match");
		  } else {
		    confirm_password.setCustomValidity('');
		  }
		}
		function selectRole($roleN){
			var roleName=$roleN;
			document.write(roleName);
		}

		

	</script>
    
    <div class="panel-heading">Apply To Be a New User</div>
    
    <div class="panel-body">

	<div id="form" >
		<form id="innerform" method="post" class="form-horizontal">
			<div class="form-group">
              	<label class="control-label col-sm-4" for="selectRole">User Role::</label>
              	<div class="col-sm-6">		
						<select name="selectRole"  onchange="onChangeEvent(event,this);" class="form-control" id="select-from-roles" required>
							<option selected disabled>Select Role</option>
							<option value="Doctor">Doctor</option>
							<option value="Patient">Patient</option>
							<option value="Nurse">Nurse</option>
							<option value="Staff">Staff</option>
						</select>	
				</div>
			</div>
<!-- 
			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtUniversityID">University ID:</label>
              	<div class="col-sm-6">
              	<input type="text" name="txtUniversityID" class="form-control" placeholder="University Identity"/>
			  	</div>
			</div>
	
			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtFirstName">First Name:</label>
              	<div class="col-sm-6">  		
				<input type="text" name="txtFirstName" class="form-control" placeholder="First Name"  required/>
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtLastName">Last Name:</label>
              	<div class="col-sm-6">	
				<input type="text" name="txtLastName" class="form-control" placeholder="Last Name" required/>
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtEmail">Email:</label>
              	<div class="col-sm-6">
			  	<input type="email" name="txtEmail" class="form-control" placeholder="Email Address" required/>

			  	</div>
			</div>
			
			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtPassword">Password:</label>
              	<div class="col-sm-6">  		
				<input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Password" 
					onchange="validatePassword()" required/>
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtConfirmPassword">Confirm Password:</label>
              	<div class="col-sm-6">  		
				<input type="password" id="txtConfirmPassword" name="txtConfirmPassword" class="form-control" placeholder="Re-enter Password" 
					onchange="validatePassword()" 
					 required/>
				</div>
			</div>

			
	        <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">

						<button type="submit" value="request" name="request">Submit Request</button>

			    </div>
            </div>  -->
		</form>

	</div>
	</div>

</div>

