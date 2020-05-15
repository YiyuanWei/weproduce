<?php 
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/include/module.func.php';
require DT_ROOT.'/module/'.$module.'/global.func.php';
$REQ = 'requirement';
$table = $DT_PRE.$module.'_'.$moduleid;
$table_data = $DT_PRE.$module.'_data_'.$moduleid;
$table_garment = $DT_PRE.$module.'_garment_'.$moduleid;
$table_fabric = $DT_PRE.$module.'_fabric_'.$moduleid;

$table_req_fabric = $DT_PRE.'_fabric_'.$REQ;
$table_req_button = $DT_PRE.'_button_'.$REQ;
$table_req_zipper = $DT_PRE.'_zipper_'.$REQ;

$TYPE = explode('|', trim($MOD['type']));
?>