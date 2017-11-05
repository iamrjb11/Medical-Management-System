<?php


include_once DR.'/common/class.common.php';
include_once DR.'/common/class.medical.php';
include_once DR.'/util/class.util.php';

class medicalSerialListDao{
	private $_DB;
	private $_SerialList;

	function __construct(){

		$this->_DB = DBUtil::getInstance();
		$this->_SerialList = new Medical();

	}
	public function getSeriallist($global_user_doctorN){
		$SerialListArray = array();

		$this->_DB->doQuery("SELECT * FROM med_serial s,tbl_user u where s.doctor_id='$global_user_doctorN' and s.patient_id=u.ID ");

		$rows = $this->_DB->getAllRows() or die("got busted");
		echo "<br>Size Rows : ".sizeof($rows)."<br>";
		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_SerialList = new Medical();

		    $this->_SerialList->setDoctorEmail ( $row['doctor_id']);
		    $this->_SerialList->setPatientEmail ( $row['patient_id']);
		    $this->_SerialList->setPatientFirstName ( $row['FirstName']);
		    $this->_SerialList->setPatientLastName ( $row['LastName']);
		    $this->_SerialList->setPatientEmail ( $row['Email']);
		    $this->_SerialList->setAge ( $row['Age']);
		    $this->_SerialList->setSex ( $row['Sex']);

		    $this->_SerialList->setDoctorDayShedule( $row['day_shedule'] );
		    $this->_SerialList->setDate( $row['date'] );
		   


		    $SerialListArray[]=$this->_SerialList;
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SerialListArray);

		return $Result;
	}
	public function getSpeciDateSeriallist($global_user_doctorN,$date){
		$SerialListArray = array();

		$sql = "SELECT * FROM med_serial s,tbl_user u where s.doctor_id='$global_user_doctorN' and s.patient_id=u.ID and s.date='$date' ;";
		$this->_DB->doQuery($sql);
		// echo $sql;

		$rows = $this->_DB->getAllRows() or die("got busted");
		echo "<br>Size Rows : ".sizeof($rows)."<br>";
		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_SerialList = new Medical();

		    $this->_SerialList->setDoctorEmail ( $row['doctor_id']);
		    $this->_SerialList->setPatientEmail ( $row['patient_id']);
		    $this->_SerialList->setPatientFirstName ( $row['FirstName']);
		    $this->_SerialList->setPatientLastName ( $row['LastName']);
		    $this->_SerialList->setPatientEmail ( $row['Email']);
		    $this->_SerialList->setAge ( $row['Age']);
		    $this->_SerialList->setSex ( $row['Sex']);

		    $this->_SerialList->setDoctorDayShedule( $row['day_shedule'] );
		    $this->_SerialList->setDate( $row['date'] );
		   


		    $SerialListArray[]=$this->_SerialList;
		}

		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SerialListArray);

		return $Result;
	}

}

?>