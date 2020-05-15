<?php
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
$type = $_GET['type'];

include template($type.'_info',$module);
?>