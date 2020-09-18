<?php 
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/include/module.func.php';
require DT_ROOT.'/module/'.$module.'/global.func.php';
$table = $DT_PRE.$module.'_'.$moduleid;
$table_data = $DT_PRE.$module.'_data_'.$moduleid;
$table_category = $DT_PRE.'category';
$TYPE = explode('|', trim($MOD['type']));
$express_cat = DB::get_one("SELECT * FROM {$table_category} WHERE level=6")['catid'];
?>