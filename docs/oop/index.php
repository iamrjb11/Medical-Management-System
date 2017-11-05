<?php
include_once 'inc/class.crud.php';
$crud = new CRUD();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
<title>php oops crud tutorial part-2 by cleartuts</title>
</head>
<body>

<div id="header">
<label>php oops crud tutorial part-2 by cleartuts</label>
</div>

<center>
<table id="dataview">
<tr>
<td colspan="5"><a href="add_records.php">add new</a></td>
</tr>
<?php
$res = $crud->read();
if(mysqli_num_rows($res)>0)
{
	while($row = mysqli_fetch_array($res))
	{
	?>
    <tr>
    <td><?php echo $row['first_name']; ?></td>
    <td><?php echo $row['last_name']; ?></td>
    <td><?php echo $row['user_city']; ?></td>
    <td><a href="edit_records.php?edt_id=<?php echo $row['user_id']; ?>">edit</a></td>
    <td><a href="dbcrud.php?del_id=<?php echo $row['user_id']; ?>">delete</a></td>
    </tr>
    <?php
	}
}
else
{
	?><tr><td colspan="5">Nothing here... add some new</td></tr><?php
}
?>
</table>

<footer>
<label>Visit <a href="http://cleartuts.blogspot.com/">cleartuts</a> for more tutorials...</label>
</footer>

</center>
</body>
</html>