<?php
defined('IN_DESTOON') or exit('Access Denied');
#Request Management
login();
require DT_ROOT.'/module/'.$module.'/common.inc.php';
require DT_ROOT.'/include/post.func.php';
require DT_ROOT.'/module/'.$mod.'/global.func.php';
require DT_ROOT.'/module/'.$mod.'/'.$mod.'.class.php';
include load('buy.lang');
$status = $L['trade_status'];
$send_status = $L['send_status'];
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
$default_cat = DB::get_one("SELECT catid FROM {$table_category} WHERE catname='Garment' and moduleid='$mid'")['catid'];
$catid = $catid == 0 || !isset($catid) ? $default_cat: intval($catid);
switch ($action) {
	case 'edit':
		break;
	
	default:
		$condition = "editor='$_username' ";
		if( $catid ) $condition .= "and catid='$catid' ";
		$order = 'addtime DESC';
		$link = $MOD['linkurl'];$MOD['linkurl'] = $MODULE[$mid]['linkurl'];
		$list = $do->get_list($condition, $order);
		$MOD['linkurl'] = $link;
		foreach ($list as $k => $v) {
			$id = $v['itemid'];
			$content = DB::get_one("SELECT content FROM {$table_data} WHERE itemid='$id'")['content'];
			$content = decode_content($content);
			$files = $content['files']; unset($content['files']);
			foreach ($files as $key => $file) {
				$content[$key] = $file;
			}
			$list[$k]['content'] = $content;
			$list[$k]['thumb'] = $content['img']['img_0'];
		}
		break;
}
if($DT_PC) {
	//
} else {
	$foot = '';
	if($action == 'update') {
		$back_link = '?action=index';
	} else if($action == 'order') {
		$back_link = '?action=index';
	} else if($action == 'express') {
		$back_link = ($kw || $page > 1) ? '?action='.$action : '?action=index';
	} else {
		$back_link = ($kw || $page > 1) ? '?action=index' : 'index.php';
	}
}
include template('request', $module);
?>