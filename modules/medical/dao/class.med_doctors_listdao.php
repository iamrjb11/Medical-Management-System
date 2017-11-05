<?php
// write dao object for each class
include_once DR.'/common/class.common.php';
include_once DR.'/common/class.medical.php';
include_once DR.'/util/class.util.php';


Class medicalDoctorsListDao{
	private $_DB;
	private $_DoctorsList;

	function __construct(){

		$this->_DB = DBUtil::getInstance();
		$this->_DoctorsList = new Medical();

	}

	public function getAlldoctorslist(){

		$DoctorsListArray = array();

		$this->_DB->doQuery("SELECT * FROM tbl_user u,tbl_user_role ur where u.ID=ur.UserID and ur.RoleID='Doctor' ");

		$rows = $this->_DB->getAllRows() or die("got busted");
		echo "<br>Size Rows : ".sizeof($rows)."<br>";
		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_DoctorsList = new Medical();

		    $this->_DoctorsList->setID ( $row['Email']);
		    $this->_DoctorsList->setDoctorEmail ( $row['Email']);
		    $this->_DoctorsList->setDoctorFirstName( $row['FirstName'] );
		    $this->_DoctorsList->setDoctorLastName( $row['LastName'] );
		    $this->_DoctorsList->setAge ( $row['Age']);
		    $this->_DoctorsList->setSex ( $row['Sex']);

		    $this->_DoctorsList->setDoctorDegrees( $row['Degrees'] );
		    $this->_DoctorsList->setDoctorSpecialist( $row['Specialist'] );
		    $this->_DoctorsList->setDoctorWorkAddress( $row['WorkingAddress'] );
		    $this->_DoctorsList->setDoctorDayShedule( $row['DayShedule'] );

		    $this->_DoctorsList->setDoctorTimeShedule( $row['TimeShedule'] );


		    $DoctorsListArray[]=$this->_DoctorsList;
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($DoctorsListArray);

		return $Result;

	}
	public function getSpecificcategory($cat){

		$CategoryDoctorsListArray = array();

		$this->_DB->doQuery("SELECT * FROM tbl_user where Specialist='$cat' ");

		$rows = $this->_DB->getAllRows() or die("got busted");
		
		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_DoctorsList = new Medical();


		    $this->_DoctorsList->setID ( $row['ID']);
		    $this->_DoctorsList->setDoctorEmail ( $row['Email']);
		    $this->_DoctorsList->setAge ( $row['Age']);
		    $this->_DoctorsList->setSex ( $row['Sex']);
		    $this->_DoctorsList->setDoctorFirstName( $row['FirstName'] );
		    $this->_DoctorsList->setDoctorLastName( $row['LastName'] );

		    $this->_DoctorsList->setDoctorDegrees( $row['Degrees'] );
		    $this->_DoctorsList->setDoctorSpecialist( $row['Specialist'] );
		    $this->_DoctorsList->setDoctorWorkAddress( $row['WorkingAddress'] );
		    $this->_DoctorsList->setDoctorDayShedule( $row['DayShedule'] );

		    $this->_DoctorsList->setDoctorTimeShedule( $row['TimeShedule'] );


		    $CategoryDoctorsListArray[]=$this->_DoctorsList;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($CategoryDoctorsListArray);

		return $Result;

	}

	public function getSpecificdoctor($doctor){

		$DoctorsNameListArray = array();

		$this->_DB->doQuery("SELECT * FROM tbl_user u,tbl_user_role ur where u.ID=ur.UserID and u.FirstName like '%$doctor%' and ur.RoleID='Doctor' ");
		echo "<br>Rajib <br>";
		$rows = $this->_DB->getAllRows() or die("got busted");
		
		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_DoctorsList = new Medical();


		    $this->_DoctorsList->setID ( $row['ID']);
		    $this->_DoctorsList->setDoctorFirstName( $row['FirstName'] );
		    $this->_DoctorsList->setDoctorLastName( $row['LastName'] );
		    $this->_DoctorsList->setAge( $row['Age'] );
		    $this->_DoctorsList->setSex( $row['Sex'] );

		    $this->_DoctorsList->setDoctorDegrees( $row['Degrees'] );
		    $this->_DoctorsList->setDoctorSpecialist( $row['Specialist'] );
		    $this->_DoctorsList->setDoctorWorkAddress( $row['WorkingAddress'] );
		    $this->_DoctorsList->setDoctorDayShedule( $row['DayShedule'] );

		    $this->_DoctorsList->setDoctorTimeShedule( $row['TimeShedule'] );


		    $DoctorsNameListArray[]=$this->_DoctorsList;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($DoctorsNameListArray);

		return $Result;

	}
	public function getSerial($serialInfo){


		$doctorID=$serialInfo->getDoctorID();
		$patientID=$serialInfo->getPatientID();
		$day=$serialInfo->getDay();
		$datee=$serialInfo->getDate();
		//echo "<br>Ok2   <br>";

		$SQL="INSERT INTO med_serial (doctor_id,patient_id,day_shedule,date) VALUES('$doctorID','$patientID','$day','$datee') ";

		$SQL = $this->_DB->doQuery($SQL) or die("ai haiiiiii");

			
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;


	}
}

?>