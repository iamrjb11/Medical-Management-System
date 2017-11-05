<?php

include_once './util/class.util.php';
include_once '/../dao/class.discussionCategorydao.php';


/*
	Discussion Category Business Object 
*/
Class DiscussionCategoryBAO{

	private $_DB;
	private $_DiscussionCategoryDAO;

	function DiscussionCategoryBAO(){

		$this->_DiscussionCategoryDAO = new DiscussionCategoryDAO();

	}

	//get all Discussion Categorys value
	public function getAllDiscussionCategorys(){

		$Result = new Result();	
		$Result = $this->_DiscussionCategoryDAO->getAllDiscussionCategorys();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in DiscussionCategoryDAO.getAllDiscussionCategorys()");		

		return $Result;
	}

	//create Discussion Category funtion with the Discussion Category object
	public function createDiscussionCategory($DiscussionCategory){

		$Result = new Result();	
		$Result = $this->_DiscussionCategoryDAO->createDiscussionCategory($DiscussionCategory);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in DiscussionCategoryDAO.createDiscussionCategory()");		

		return $Result;

	
	}

	//read an Discussion Category object based on its id form Discussion Category object
	public function readDiscussionCategory($DiscussionCategory){


		$Result = new Result();	
		$Result = $this->_DiscussionCategoryDAO->readDiscussionCategory($DiscussionCategory);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in DiscussionCategoryDAO.readDiscussionCategory()");		

		return $Result;


	}

	//update an Discussion Category object based on its current information
	public function updateDiscussionCategory($DiscussionCategory){

		$Result = new Result();	
		$Result = $this->_DiscussionCategoryDAO->updateDiscussionCategory($DiscussionCategory);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in DiscussionCategoryDAO.updateDiscussionCategory()");		

		return $Result;
	}

	//delete an existing Discussion Category
	public function deleteDiscussionCategory($DiscussionCategory){

		$Result = new Result();	
		$Result = $this->_DiscussionCategoryDAO->deleteDiscussionCategory($DiscussionCategory);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in DiscussionCategoryDAO.deleteDiscussionCategory()");		

		return $Result;

	}

}

//echo '<br> log:: exit the class.discussionCategorybao.php';

?>