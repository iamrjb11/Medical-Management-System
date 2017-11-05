<?php
include_once 'inc/class.crud.php';
$crud = new CRUD();
if(isset($_GET['edt_id']))
{
	$res=mysqli_query($crud->getConnection(),"SELECT * FROM users WHERE user_id=".$_GET['edt_id']);
	$row=mysqli_fetch_array($res);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>php oops crud tutorial part-2 by cleartuts</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div id="header">
<label>php oops crud tutorial part-2 by cleartuts</label>
</div>

<center>
<form method="post" action="dbcrud.php?edt_id=<?php echo $_GET['edt_id'] ?>">
<table id="dataview">
<tr><td><input type="text" name="fname" placeholder="first name" value="<?php echo $row['first_name'] ?>" /><br /></td></tr>
<tr><td><input type="text" name="lname" placeholder="last name" value="<?php echo $row['last_name'] ?>" /></td></tr>
<tr><td><input type="text" name="city" placeholder="city" value="<?php echo $row['user_city'] ?>" /></td></tr>
<tr><td><button type="submit" name="update">update</button></td></tr>
</table>
</form>
</table>
</center>
</body>
</html>