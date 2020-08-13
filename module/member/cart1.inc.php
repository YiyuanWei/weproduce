<?php 
defined('IN_DESTOON') or exit('Access Denied');
login();
if($mid < 5) {
	foreach($MODULE as $v) {
		if(in_array($v['module'], array('mall', 'sell'))) {
			$mid = $v['moduleid'];
			break;
		}
	}
}
if(isset($MODULE[$mid]) && in_array($MODULE[$mid]['module'], array('mall', 'sell'))) {
	$moduleid = $mid;
	$MOD = cache_read('module-'.$moduleid.'.php');
	$module = $MOD['module'];
} else {
	dheader($DT_PC ? DT_PATH : DT_MOB);
}
if(is_array($itemid) && !$_userid) {
	$DT_URL = $MODULE[2]['linkurl'].'cart.php?action=add&mid='.$mid;
	foreach($itemid as $id) {
		$DT_URL .= '&itemid[]='.$id;
	}
}
require DT_ROOT.'/module/mall/global.func.php';
require DT_ROOT.'/module/member/cart.class.php';
include load('misc.lang');
$do = new cart();
$do->max = intval($DT['max_cart']);
$cart = $do->get();
if($itemid) $action = 'add';
$lists = array();
switch($action) {
	case 'add':
		$code = $do->add($cart, $mid, $itemid);
		$id = is_array($itemid) ? end($itemid) : $itemid;
		dheader('?action=show&mid='.$mid.'&id='.$id);
	break;
	case 'show':
		$id = isset($id) ? intval($id) : 0;
	break;
	case 'clear':
		$do->clear();
		dheader('?mid='.$mid.'&rand='.$DT_TIME);
	break;
	case 'delete':
		isset($key) or $key = '';
		$keys = is_array($key) ? $key : array($key);
		foreach($keys as $key) {
			if(isset($cart[$key])) {
				unset($cart[$key]);
				$do->set($cart);
			}
		}
		if(isset($ajax)) exit('1');
		dheader('?mid='.$mid.'&rand='.$DT_TIME);
	break;
	default:
		$lists = $do->get_list($cart);
	break;
}
$CSS = array('cart');
$head_title = $L['cart_title'];
if($DT_PC) {
	if($EXT['mobile_enable']) $head_mobile = str_replace($MODULE[2]['linkurl'], $MODULE[2]['mobile'], $DT_URL);
} else {
	$foot = '';
	if($action == 'show') {
		$back_link = DT_MOB.'api/redirect.php?mid='.$moduleid.'&itemid='.$code;
	} else {		
		$back_link = $MODULE[$mid]['mobile'];
	}
}
include template('cart', 'member');
?>