<?php 
defined('IN_DESTOON') or exit('Access Denied');
login();
require DT_ROOT.'/module/'.$module.'/common.inc.php';
require DT_ROOT.'/include/post.func.php';
switch($action) {
	case 'edit':
		$query='';
		if($submit){
			foreach ($post as $k=>$v){
				if($v != '' && $k != 'userid') $query.=", $k='$v'";
			}
			$_truename = $post['first_name'].' '.$post['last_name'];
			$query = "truename='$_truename'".$query;
			$db->query("UPDATE {$DT_PRE}member SET $query WHERE userid=$_userid");
		}
		dheader('?action=success');
	break;
	case 'line':
		$forward or $forward = $DT_PC ? DT_PATH : DT_MOB;
		$online = $_online ? 0 : 1;
		$db->query("UPDATE {$DT_PRE}member SET online=$online WHERE userid=$_userid");
		$db->query("UPDATE {$DT_PRE}online SET online=$online WHERE userid=$_userid");
		dheader($forward);
	break;
	case 'promo':
		$code = dhtmlspecialchars(trim($code));
		if($code) {
			$p = $db->get_one("SELECT * FROM {$DT_PRE}finance_promo WHERE number='$code' AND totime>$DT_TIME");
			if($p && ($p['reuse'] || (!$p['reuse'] && !$p['username']))) {
				if($p['type']) {
					exit(lang($L['grade_msg_time_promo'], array($p['amount'])));
				} else {
					exit(lang($L['grade_msg_money_promo'], array($p['amount'])));
				}
			}
		}
		exit($L['grade_msg_bad_promo']);
	break;
	default:
		$user = $db->get_one("SELECT * FROM {$DT_PRE}member WHERE userid='$_userid'");
		extract($user);
		$expired = $totime && $totime < $DT_TIME ? true : false;
		$havedays = $expired ? 0 : ceil(($totime-$DT_TIME)/86400);
		$head_title = $L['profile_title'];
	break;
}
if($DT_PC) {
	//
} else {
	$foot = '';
	if($action == 'grade' || $action == 'vip') {
		$back_link = '?action=index';
	} else {
		$back_link = 'index.php';
	}
}
include template('account', $module);
?>