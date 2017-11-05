<?php

include_once './util/class.util.php';
include_once '/../../bao/class.mostRecentbao.php';

$_MostRecentBAO = new MostRecentBAO();
$_DB = DBUtil::getInstance();
$Discussion = new Discussion();


//echo '<br> log:: exit blade.searchDiscussion.php';

?>