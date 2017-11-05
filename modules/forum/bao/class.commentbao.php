<?php

include_once './util/class.util.php';
include_once '/../dao/class.commentdao.php';


/*
	Comment Business Object 
*/
Class CommentBAO{

	private $_DB;
	private $_CommentDAO;

	function CommentBAO(){

		$this->_CommentDAO = new CommentDAO();

	}

	//get all Comments value
	public function getAllComments(){

		$Result = new Result();	
		$Result = $this->_CommentDAO->getAllComments();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in CommentDAO.getAllComments()");		

		return $Result;
	}

	//create Comment funtion with the Comment object
	public function createComment($Comment){

		$Result = new Result();	
		$Result = $this->_CommentDAO->createComment($Comment);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in CommentDAO.createComment()");		

		return $Result;

	
	}


	public function readCreator($CreatorID){


		$Result = new Result();	
		$Result = $this->_CommentDAO->readCreator($CreatorID);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in CommentDAO.readCreator()");		

		return $Result;


	}

	public function readDiscussionCreator($CreatorID){


		$Result = new Result();	
		$Result = $this->_CommentDAO->readDiscussionCreator($CreatorID);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in CommentDAO.readDiscussionCreator()");		

		return $Result;


	}

	//read an Comment object based on its id form Comment object
	public function readComment($Comment){


		$Result = new Result();	
		$Result = $this->_CommentDAO->readComment($Comment);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in CommentDAO.readComment()");		

		return $Result;


	}

	public function readDiscussion($Discussion){


		$Result = new Result();	
		$Result = $this->_CommentDAO->readDiscussion($Discussion);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in CommentDAO.readDiscussion()");		

		return $Result;


	}

	//update an Comment object based on its current information
	public function updateComment($Comment){

		$Result = new Result();	
		$Result = $this->_CommentDAO->updateComment($Comment);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in CommentDAO.updateComment()");		

		return $Result;
	}

	//delete an existing Comment
	public function deleteComment($Comment){

		$Result = new Result();	
		$Result = $this->_CommentDAO->deleteComment($Comment);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in CommentDAO.deleteComment()");		

		return $Result;

	}

}

//echo '<br> log:: exit the class.Commentbao.php';

?>