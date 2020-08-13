<?php 
defined('IN_DESTOON') or exit('Access Denied');
if($_userid) dheader($DT_PC ? $MOD['linkurl'] : $MOD['mobile']);
require DT_ROOT.'/module/'.$module.'/common.inc.php';
if(!$MOD['enable_register']) message($L['register_msg_close'], $DT_PC ? DT_PATH : DT_MOB);
if($MOD['defend_proxy']) {
	if($_SERVER['HTTP_X_FORWARDED_FOR'] || $_SERVER['HTTP_VIA'] || $_SERVER['HTTP_PROXY_CONNECTION'] || $_SERVER['HTTP_USER_AGENT_VIA'] || $_SERVER['HTTP_CACHE_INFO'] || $_SERVER['HTTP_PROXY_CONNECTION']) {
		message(lang('include->defend_proxy'));
	}
}
if($MOD['banagent']) {
	$banagent = explode('|', $MOD['banagent']);
	foreach($banagent as $v) {
		if(strpos($_SERVER['HTTP_USER_AGENT'], $v) !== false) message($L['register_msg_agent']);
	}
}
if($MOD['iptimeout'] && $action != 'success') {
	$timeout = $DT_TIME - $MOD['iptimeout']*3600;
	$r = $db->get_one("SELECT userid FROM {$DT_PRE}member WHERE regip='$DT_IP' AND regtime>'$timeout'");
	if($r) message(lang($L['register_msg_ip'], array($MOD['iptimeout'])), $DT_PC ? DT_PATH : DT_MOB);
}
require DT_ROOT.'/include/post.func.php';
require DT_ROOT.'/module/'.$module.'/member.class.php';
$do = new member;
$session = new dsession();
if($DT['mail_type'] == 'close' && ($MOD['checkuser'] == 2 || $MOD['checkuser'] == 4)) $MOD['checkuser'] = 0;
if(!$DT['sms'] && ($MOD['checkuser'] == 3 || $MOD['checkuser'] == 4)) $MOD['checkuser'] = 0;
$could_mail = ($MOD['checkuser'] == 2 || $MOD['checkuser'] == 4) ? 1 : 0;
$could_sms = ($MOD['checkuser'] == 3 || $MOD['checkuser'] == 4) ? 1 : 0;
$could_verify = $MOD['checkuser'] < 2 ? 1 : 0;
isset($sid) or $sid = '';
$_sid = md5(md5(session_id().DT_KEY));
$timeout = 180;
switch($action) {
	case 'success':
		$_auth = isset($auth) ? decrypt($auth, DT_KEY.'LOGIN') : '';
		substr($_auth, 0, 5) == 'LOGIN' or dheader($DT_PC ? DT_PATH : DT_MOB);
		$url = $DT['file_login'].'?auth='.$auth.'&forward='.urlencode($DT_PC ? $MOD['linkurl'] : DT_MOB.'my.php');
		dheader($url);
	break;
	case 'read':
		exit(include template('agreement', $module));
	break;
	default:
		$FD = $MFD = cache_read('fields-member.php');
		$CFD = cache_read('fields-company.php');
		isset($post_fields) or $post_fields = array();
		if($MFD || $CFD) require DT_ROOT.'/include/fields.func.php';
		$GROUP = cache_read('group.php');
		if($submit) {
			if($sid != $_sid) message($L['check_sign']);
			$post['passport'] = isset($post['passport']) && $post['passport'] ? $post['passport'] : $post['username'];
			$RG = array();
			foreach($GROUP as $k=>$v) {
				if($k > 4 && $v['vip'] == 0) $RG[] = $k;
			}
			in_array($post['regid'], $RG) or message($L['register_pass_groupid']);
			if(!$GROUP[$post['regid']]['type']) $post['company'] = $post['truename'];
			$post['groupid'] = $MOD['checkuser'] == 1 ? 4 : $post['regid'];
			$post['content'] = $post['introduce'] = $post['thumb'] = $post['banner'] = $post['catid'] = $post['catids'] = '';
			$post['edittime'] = 0;
			$inviter = get_cookie('inviter'); 
			$post['inviter'] = $inviter ? decrypt($inviter, DT_KEY.'INVITER') : '';
			check_name($post['inviter']) or $post['inviter'] = '';
			if($do->add($post)) {
				$userid = $do->userid;
				$username = $post['username'];
				$email = $post['email'];
				$mobile = $post['mobile'];
				if($MFD) fields_update($post_fields, $do->table_member, $userid, 'userid', $MFD);
				if($CFD) fields_update($post_fields, $do->table_company, $userid, 'userid', $CFD);
				if($MOD['passport'] == 'uc') {
					$uid = uc_user_register($passport, $post['password'], $post['email']);
					if($uid > 0 && $MOD['uc_bbs']) uc_user_regbbs($uid, $passport, $post['password'], $post['email']);
				}
				//send sms
				if($MOD['welcome_sms'] && $DT['sms'] && is_mobile($post['mobile'])) {
					$message = lang('sms->wel_reg', array($post['truename'], $DT['sitename'], $post['username'], $post['password']));
					$message = strip_sms($message);
					send_sms($post['mobile'], $message);
				}
				//send sms
				if($MOD['checkuser'] != 1) {
					if($MOD['welcome_message'] || $MOD['welcome_email']) {
						$title = $L['register_msg_welcome'];
						$content = ob_template('welcome', 'mail');
						if($MOD['welcome_message']) send_message($username, $title, $content);
						if($MOD['welcome_email'] && $DT['mail_type'] != 'close') send_mail($email, $title, $content);
					}
				}
				dheader('?action=success&auth='.encrypt('LOGIN|'.$username.'|'.$post['password'].'|'.$DT_TIME, DT_KEY.'LOGIN'));
			} else {
				message($do->errmsg);
			}
		}
		isset($auth) or $auth = '';
		$username = $password = $email = $passport = '';
		if($auth) {
			$auth = decrypt($auth, DT_KEY.'UC');
			$auth = explode('|', $auth);
			$passport = $auth[0];
			if(check_name($passport)) $username = $passport;
			$password = $auth[1];
			$email = is_email($auth[2]) ? $auth[2] : '';
			if($email) $_SESSION['regemail'] = md5(md5($email.DT_KEY.$DT_IP));
		}
		$areaid = $cityid;
		$stepid = 2;
	break;
}
if($DT_PC) {
	//
} else {
	$foot = '';
}
$head_title = $L['register_title'];
include template('register', $module);
?>