<?php

include_once './util/class.util.php';
include_once '/../../bao/class.answeredbao.php';

$_AnsweredBAO = new AnsweredBAO();
$_DB = DBUtil::getInstance();
$Discussion = new Discussion();


//echo '<br> log:: exit blade.searchDiscussion.php';

?>