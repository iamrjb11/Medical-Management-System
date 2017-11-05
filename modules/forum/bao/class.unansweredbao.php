<?php

include_once './util/class.util.php';
include_once '/../dao/class.unanswereddao.php';


/*
	Discussion Business Object 
*/
Class UnansweredBAO{

	private $_DB;
	private $_UnansweredDAO;

	function UnansweredBAO(){

		$this->_UnansweredDAO = new UnansweredDAO();

	}

	//get all Discussions value
	public function getAllDiscussions(){

		$Result = new Result();	
		$Result = $this->_UnansweredDAO->getAllDiscussions();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UnansweredDAO.getAllDiscussions()");		

		return $Result;
	}
	public function getAllDiscussionCategorys(){

		$Result = new Result();	
		$Result = $this->_UnansweredDAO->getAllDiscussionCategorys();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UnansweredDAO.getAllDiscussionCategorys()");		

		return $Result;
	}

	
	public function getNameFromCatagoryID($Discussion){


		$Result = new Result();	
		$Result = $this->_UnansweredDAO->getNameFromCatagoryID($Discussion);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UnansweredDAO.readDiscussionCategory()");		

		return $Result;


	}


	public function readDiscussionCategory($Discussion){


		$Result = new Result();	
		$Result = $this->_UnansweredDAO->readDiscussionCategory($Discussion);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UnansweredDAO.readDiscussionCategory()");		

		return $Result;


	}

}

//echo '<br> log:: exit the class.discussionbao.php';

?>