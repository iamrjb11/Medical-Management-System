<?php
include_once 'inc/class.crud.php';
$crud = new CRUD();
if(isset($_POST['save']))
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$city = $_POST['city'];
	
	// insert
    $crud->create($fname,$lname,$city);
	// insert
	header("Location: index.php");
}


if(isset($_GET['del_id']))
{
	$id = $_GET['del_id'];
	$crud->delete($id);
	header("Location: index.php");
}

if(isset($_POST['update']))
{
	$id = $_GET['edt_id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$city = $_POST['city'];
	
	$crud->update($fname,$lname,$city,$id);
	header("Location: index.php");
}
?>