<?php
// write dao object for each class
include_once './common/class.common.php';
include_once './common/class.common.forum.php';
include_once './util/class.util.php';
include_once 'class.discussionCategorydao.php';

Class DiscussionDAO{

	private $_DB;
	private $_Cat;

	function DiscussionDAO(){

		$this->_DB = DBUtil::getInstance();
		$this->_Cat = new DiscussionCategory();

	}

	// get all the Discussions from the database using the database query
	public function getAllDiscussions(){

		$DiscussionList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_discussion");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_Discussion = new Discussion();

		    $this->_Discussion->setID ( $row['ID']);
		    $this->_Discussion->setName( $row['Title'] );
		    $this->_Discussion->setCategory( $row['CategoryID'] );
		    $this->_Discussion->setDescription( $row['Description'] );
		    $this->_Discussion->setTag( $row['Tag'] );
		    $this->_Discussion->setCreationDate( $row['CreationDate'] );
		    $this->_Discussion->setCreator( $row['CreatorID'] );


		    $DiscussionList[]=$this->_Discussion;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($DiscussionList);

		return $Result;
	}
	public function getAllDiscussionCategorys(){

		$DiscussionCategoryList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_discussion_category");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_DiscussionCategory = new DiscussionCategory();

		    $this->_DiscussionCategory->setID ( $row['ID']);
		    $this->_DiscussionCategory->setName( $row['Name'] );


		    $DiscussionCategoryList[]=$this->_DiscussionCategory;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($DiscussionCategoryList);

		return $Result;
	}

	public function getNameFromCatagoryID($CatagoryID){

		$SQL = "SELECT * FROM tbl_discussion_category
				WHERE ID='".$CatagoryID."'";
		$SQL = $this->_DB->doQuery($SQL);

		$row = $this->_DB->getTopRow();

		$this->_DiscussionCategory = new DiscussionCategory();

		$this->_DiscussionCategory->setID ( $row['ID']);
		$this->_DiscussionCategory->setName( $row['Name'] );
		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_DiscussionCategory);

		return $Result;
	}

	public function readCreator($CreatorID){

		$SQL = "SELECT * FROM tbl_user
				WHERE ID ='".$CreatorID."'";
		$SQL = $this->_DB->doQuery($SQL);

		$row = $this->_DB->getTopRow();

		$this->_useradd = new User();

		$this->_useradd->setID ( $row['ID']);
		$this->_useradd->setUniversityID( $row['UniversityID'] );
		$this->_useradd->setEmail ( $row['Email']);
		$this->_useradd->setPassword( $row['Password'] );
		$this->_useradd->setFirstName ( $row['FirstName']);
		$this->_useradd->setLastName( $row['LastName'] );
		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_useradd);

		return $Result;
	}

	//create Discussion funtion with the Discussion object
	public function createDiscussion($Discussion){

		$ID=$Discussion->getID();
		$Name=$Discussion->getName();
		$Category=$Discussion->getCategory();
		$Description=$Discussion->getDescription();
		$Tag=$Discussion->getTag();
	
		$Creator=$_SESSION["globalUser"]->getID ();

		$SQL = "INSERT INTO tbl_discussion(ID,Title,CategoryID,Description,Tag,CreationDate,CreatorID) 
				VALUES('$ID','$Name','$Category','$Description','$Tag',now(),'$Creator')";

		$SQL = $this->_DB->doQuery($SQL);		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;
	}

	public function readDiscussionCategory($DiscussionCategory){
		
		
		$SQL = "SELECT p.ID,p.Name FROM tbl_discussion as r,tbl_discussion_category as p 
				WHERE r.CategoryID='".$DiscussionCategory."'";
		$this->_DB->doQuery($SQL);

		//reading the top row for this Discussion Category from the database
		$row = $this->_DB->getTopRow();

		$this->_DiscussionCategory= new DiscussionCategory();

		//preparing the Discussion Category object
	    $this->_DiscussionCategory->setID ( $row['ID']);
	    $this->_DiscussionCategory->setName( $row['Name'] );



	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_DiscussionCategory);

		return $Result;
	}


	//read an Discussion object based on its id form Discussion object
	public function readDiscussion($Discussion){
		
		
		$SQL = "SELECT * FROM tbl_discussion WHERE ID='".$Discussion->getID()."'";
		$this->_DB->doQuery($SQL);

		//reading the top row for this Discussion from the database
		$row = $this->_DB->getTopRow();

		$this->_Discussion= new Discussion();

		//preparing the Discussion object
	    $this->_Discussion->setID ( $row['ID'] );
	    $this->_Discussion->setName( $row['Title'] );
	    $this->_Discussion->setCategory( $row['CategoryID'] );
		$this->_Discussion->setDescription( $row['Description'] );
		$this->_Discussion->setTag( $row['Tag'] );
		$this->_Discussion->setCreationDate( $row['CreationDate'] );
		$this->_Discussion->setCreator( $row['CreatorID'] );




	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_Discussion);

		return $Result;
	}

	

	//update an Discussion object based on its 
	public function updateDiscussion($Discussion){

		$SQL = "UPDATE tbl_discussion SET Title='".$Discussion->getName()."',
				CategoryID = '".$Discussion->getCategory()."',
				Description='".$Discussion->getDescription()."',
				Tag='".$Discussion->getTag()."'
				WHERE ID='".$Discussion->getID()."'";

		$this->_DB->getConnection()->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

	//delete an Discussion based on its id of the database
	public function deleteDiscussion($Discussion){


		$SQL = "DELETE from tbl_discussion where ID ='".$Discussion->getID()."'";
	
		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

}

//echo '<br> log:: exit the class.discussiondao.php';

?>