<?php 
defined('IN_DESTOON') or exit('Access Denied');
login();
require DT_ROOT.'/module/'.$module.'/common.inc.php';
require DT_ROOT.'/include/post.func.php';
require DT_ROOT.'/module/'.$mod.'/global.func.php';
require DT_ROOT.'/module/'.$mod.'/'.$mod.'.class.php';
include load('buy.lang');
$timenow = timetodate($DT_TIME, 3);
$memberurl = $DT_PC ? $MOD['linkurl'] : $MOD['mobile'];
$myurl = userurl($_username);
$table_member = $table;
$table = $DT_PRE.$mod.'_'.$mid;
$table_data = $DT_PRE.$mod.'_data_'.$mid;
$table_category = $DT_PRE.'category';
$action = isset($action) ? $action : '';
$types = get_types($mid);
$do = new $mod($mid);
$condition = "editor='$_username'";
$order = "addtime DESC";
$link = $MOD['linkurl'];$MOD['linkurl'] = $MODULE[$mid]['linkurl'];
$list = $do->get_list($condition, $order);
$MOD['linkurl'] = $link;
foreach($list as $k=>$v){
    $v['note'] = str2arr($v['note']);
}
include template('status',$module);
?>