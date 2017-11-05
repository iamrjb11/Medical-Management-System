<?php

include_once './util/class.util.php';
include_once '/../../bao/class.unansweredbao.php';

$_UnansweredBAO = new UnansweredBAO();
$_DB = DBUtil::getInstance();
$Discussion = new Discussion();


//echo '<br> log:: exit blade.searchDiscussion.php';

?>