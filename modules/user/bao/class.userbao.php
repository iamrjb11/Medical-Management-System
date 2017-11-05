<?php
include_once DR.'/util/class.util.php';
include_once __DIR__.'/../dao/class.userdao.php';
//echo DR;

/*
	User Business Object 
*/
Class UserBAO{

	private $_DB;
	private $_UserDAO;

	function __construct(){

		$this->_UserDAO = new UserDAO();

	}

	//get all users value
	public function getAllUsers(){

		$Result = new Result();	
		$Result = $this->_UserDAO->getAllUsers();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UserDAO.getAllUsers()");		

		return $Result;
	}

	//get all users of a give Role
	public function getAllUsersOfRole($Role){

		$Result = new Result();	
		$Result = $this->_UserDAO->getAllUsersOfRole($Role);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UserDAO.getAllUsersOfRole()");		

		return $Result;
	}

	//create user funtion with the user object
	public function createUser($User){

		$Result = new Result();	
		$Result = $this->_UserDAO->createUser($User);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UserDAO.createUser()");		

		return $Result;

	
	}

	//user requesting for forgot password
	public function requestPassword($User){

		$Result = new Result();	
		$Result = $this->_UserDAO->requestPassword($User);
		
		return $Result;

	
	}

	//new user request funtion with the user object
	public function newUserRequest($User){

		$Result = new Result();	
		$Result = $this->_UserDAO->newUserRequest($User);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UserDAO.newUserRequest()");		

		return $Result;

	
	}



	//read an user object based on its id form user object
	public function readUser($User){


		$Result = new Result();	
		$Result = $this->_UserDAO->readUser($User);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UserDAO.readUser()");		

		return $Result;


	}

	//search an user object
	public function searchUser($Role,$SearchField,$SearchText){


		$Result = new Result();	
		$Result = $this->_UserDAO->searchUser($Role,$SearchField,$SearchText);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("No User found!!");		

		return $Result;


	}

	//read an user object based on its id form user object
	public function readUserDetails($UserDetails){


		$Result = new Result();	
		$Result = $this->_UserDAO->readUserDetails($UserDetails);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UserDAO.readUserDetails()");		

		return $Result;


	}

	//read an user with role information object based on its id form user object
	public function readUserRolesPositions($User){


		$Result = new Result();	
		$Result = $this->_UserDAO->readUserRolesPositions($User);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UserDAO.readUserRolesPositions()");		

		return $Result;


	}

	//read an user with role and permission information object based on the user email address
	public function readUserRolesPermissions($User){


		$Result = new Result();	
		$Result = $this->_UserDAO->readUserRolesPermissions($User);

		return $Result;
	}



	//update an user object based on its current information
	public function updateUser($User){

		$Result = new Result();	
		$Result = $this->_UserDAO->updateUser($User);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UserDAO.updateUser()");		

		return $Result;
	}

	//update an user details object based on its current information
	public function updateUserDetails($UserDetails){

		$Result = new Result();	
		$Result = $this->_UserDAO->updateUserDetails($UserDetails);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UserDAO.updateUserDetails()");		

		return $Result;
	}

	//delete an existing user
	public function deleteUser($User){

		$Result = new Result();	
		$Result = $this->_UserDAO->deleteUser($User);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UserDAO.deleteUser()");		

		return $Result;

	}

	//approve or reject a user
	public function approve_Reject_User($User,$Status){

		$Result = new Result();	
		$Result = $this->_UserDAO->approve_Reject_User($User,$Status);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in UserDAO.approve_Reject_User()");		
		else
			$Result->setResultObject("Operation Successful!!");		

		return $Result;

	}

}

echo '<br> log:: exit the class.userbao.php';

?>