<?php

include_once './util/class.util.php';
include_once '/../dao/class.answereddao.php';


/*
	Discussion Business Object 
*/
Class AnsweredBAO{

	private $_DB;
	private $_AnsweredDAO;

	function AnsweredBAO(){

		$this->_AnsweredDAO = new AnsweredDAO();

	}

	//get all Discussions value
	public function getAllDiscussions(){

		$Result = new Result();	
		$Result = $this->_AnsweredDAO->getAllDiscussions();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in AnsweredDAO.getAllDiscussions()");		

		return $Result;
	}
	public function getAllDiscussionCategorys(){

		$Result = new Result();	
		$Result = $this->_AnsweredDAO->getAllDiscussionCategorys();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in AnsweredDAO.getAllDiscussionCategorys()");		

		return $Result;
	}

	
	public function getNameFromCatagoryID($Discussion){


		$Result = new Result();	
		$Result = $this->_AnsweredDAO->getNameFromCatagoryID($Discussion);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in AnsweredDAO.readDiscussionCategory()");		

		return $Result;


	}


	public function readDiscussionCategory($Discussion){


		$Result = new Result();	
		$Result = $this->_AnsweredDAO->readDiscussionCategory($Discussion);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in AnsweredDAO.readDiscussionCategory()");		

		return $Result;


	}

}

//echo '<br> log:: exit the class.discussionbao.php';

?>