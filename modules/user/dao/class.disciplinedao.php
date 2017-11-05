<?php
// write dao object for each class
include_once './common/class.common.php';
include_once './common/class.common.course.php';
include_once './util/class.util.php';

Class DisciplineDAO{

	private $_DB;
	private $_Discipline;

	function DisciplineDAO(){

		$this->_DB = DBUtil::getInstance();
		$this->_Discipline = new Discipline();

	}

	// get all the Disciplines from the database using the database query
	public function getAllDisciplines(){

		$DisciplineList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_Discipline");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			
			$row = $rows[$i];
			
			$this->_Discipline = new Discipline();
		    $this->_Discipline->setID ( $row['ID']);
		    $this->_Discipline->setName( $row['Name'] );
		    $this->_Discipline->setShortCode( $row['ShortCode'] );
		
			$School = new School();
			$School->setID($row['SchoolID']);
					
			//get the school name
			$this->_DB->doQuery("SELECT * FROM tbl_School where ID='".$row['SchoolID']."'");
			$schoolRow = $this->_DB->getTopRow();
			$School->setName($schoolRow['Name']);


			$this->_Discipline->setSchool($School);	  

		    $DisciplineList[]=$this->_Discipline;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($DisciplineList);

		return $Result;
	}

	//create Discipline funtion with the Discipline object
	public function createDiscipline($Discipline){

		$ID=$Discipline->getID();
		$Name=$Discipline->getName();
		$SchoolID = $Discipline->getSchool()->getID();


		$SQL = "INSERT INTO tbl_Discipline(ID,Name,ShortCode,SchoolID) VALUES('$ID','$Name','$ShortCode','$SchoolID')";

		$SQL = $this->_DB->doQuery($SQL);		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;
	}

	//read an Discipline object based on its id form Discipline object
	public function readDiscipline($Discipline){
		
		
		$SQL = "SELECT * FROM tbl_Discipline where ID='".$Discipline->getID()."'";

		$this->_DB->doQuery($SQL);

		//reading the top row for this Discipline from the database
		$row = $this->_DB->getTopRow();

		$this->_Discipline = new Discipline();

		//preparing the Discipline object
	    $this->_Discipline->setID ( $row['ID']);
	    $this->_Discipline->setName( $row['Name'] );
	    $this->_Discipline->setShortCode( $row['ShortCode'] );


		$School = new School();
		$School->setID($row['SchoolID']);

		$this->_DB->doQuery("SELECT * FROM tbl_School where ID='".$row['SchoolID']."'");
		$schoolRow = $this->_DB->getTopRow();
		$School->setName($schoolRow['Name']);
 
		
		$this->_Discipline->setSchool($School);	    


	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_Discipline);

		return $Result;
	}

	//update an Discipline object based on its 
	public function updateDiscipline($Discipline){

		$SQL = "UPDATE tbl_Discipline SET Name='".$Discipline->getName()."', 
				ShortCode='".$Discipline->getShortCode()."', 
				SchoolID='".$Discipline->getSchool()->getID()."' 
				WHERE ID='".$Discipline->getID()."'";


		//echo $SQL;		
		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

	//delete an Discipline based on its id of the database
	public function deleteDiscipline($Discipline){


		$SQL = "DELETE from tbl_Discipline where ID ='".$Discipline->getID()."'";
	
		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

}

echo '<br> log:: exit the class.disciplinedao.php';

?>