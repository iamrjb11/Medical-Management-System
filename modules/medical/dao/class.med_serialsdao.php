<?php


include_once DR.'/common/class.common.php';
include_once DR.'/common/class.medical.php';
include_once DR.'/util/class.util.php';

class medicalSerialsDao{
	private $_DB;
	private $_SerialList;

	function __construct(){

		$this->_DB = DBUtil::getInstance();
		$this->_SerialList = new Medical();

	}
	public function getSeriallist($global_user_p){
		$SerialListArray = array();

		$this->_DB->doQuery("SELECT * FROM med_serial where patient_id='$global_user_p';");
		$db = DBUtil::getInstance();
		$rows = $this->_DB->getAllRows() or die("got busted");
		echo "<br>Size Rows : ".sizeof($rows)."<br>";
		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_SerialList = new Medical();
		    $this->_SerialList->setDoctorEmail ( $row['doctor_id']);
		    $this->_SerialList->setPatientEmail ( $row['patient_id']);
		    $this->_SerialList->setDoctorDayShedule( $row['day_shedule'] );
		    $this->_SerialList->setDate( $row['date'] );
		    $email = $row['doctor_id'];
		    $db->doQuery("SELECT FirstName, LastName FROM tbl_user WHERE ID='$email'");
		    $res = $db->getAllRows();
		    $fname = $res[0]['FirstName'];
		    $lname = $res[0]['LastName'];
		    $this->_SerialList->setDoctorFirstName($fname);
		    $this->_SerialList->setDoctorLastName($lname);
		    $SerialListArray[]=$this->_SerialList;
		}


		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SerialListArray);

		return $Result;
	}

}

?>