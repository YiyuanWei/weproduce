<?php 
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
if($DT_PC) {
	$itemid or dheader($MOD['linkurl']);
	if(!check_group($_groupid, $MOD['group_show'])) include load('403.inc');
	$item = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid");
	if($item['groupid'] == 2) include load('404.inc');
	if($item && $item['status'] > 2) {
		if($MOD['show_html'] && is_file(DT_ROOT.'/'.$MOD['moduledir'].'/'.$item['linkurl'])) d301($MOD['linkurl'].$item['linkurl']);
		extract($item);
	} else {
		include load('404.inc');
	}
	$CAT = get_cat($catid);
	if(!check_group($_groupid, $CAT['group_show'])) include load('403.inc');
	$content_table = content_table($moduleid, $itemid, $MOD['split'], $table_data);
	$t = $db->get_one("SELECT content FROM {$content_table} WHERE itemid=$itemid");
	$content = $t['content'];
	$content = parse_video($content);
	if($MOD['keylink']) $content = keylink($content, $moduleid);
	if($lazy) $content = img_lazy($content);
	$CP = $MOD['cat_property'] && $CAT['property'];
	if($CP) {
		require DT_ROOT.'/include/property.func.php';
		$options = property_option($catid);
		$values = property_value($moduleid, $itemid);
	}
	$RL = $relate_id ? get_relate($item) : array();
	$P1 = get_nv($n1, $v1);
	$P2 = get_nv($n2, $v2);
	$P3 = get_nv($n3, $v3);
	if($step) {
		extract(unserialize($step));
	} else {
		$a1 = 1;
		$p1 = $item['price'];
		$a2 = $a3 = $p2 = $p3 = '';
	}
	$unit or $unit = $L['unit'];
	$adddate = timetodate($addtime, 3);
	$editdate = timetodate($edittime, 3);
	$linkurl = $MOD['linkurl'].$linkurl;
	$item['thumbs'] = strpos($item['thumbs'], 'true') == 0 ? explode('|', $item['thumbs']) : array_merge(array(''),decode_thumb($item['thumbs']));
	array_splice($item['thumbs'],0,1);
	$thumbs = get_albums($item,0,true);
	$albums = get_big(get_albums($item, 1,true));
	$promos = get_promos($username);
	$fee = get_fee($item['fee'], $MOD['fee_view']);
	$update = '';
	$currency = $moneyunit ? currency() : 1;
	$p1 = calculatePrice($p1, $currency);
	$p2 = calculatePrice($p2, $currency);
	$p3 = calculatePrice($p3, $currency);
	if(check_group($_groupid, $MOD['group_contact'])) {
		if($fee) {
			$user_status = 4;
			$destoon_task = "moduleid=$moduleid&html=show&itemid=$itemid";
		} else {
			$user_status = 3;
			$member = $item['username'] ? userinfo($item['username']) : array();
			if($member) {
				$update_user = update_user($member, $item);
				if($update_user) $db->query("UPDATE LOW_PRIORITY {$table} SET ".substr($update_user, 1)." WHERE username='$username'", 'UNBUFFERED');
			}
		}
	} else {
		$user_status = $_userid ? 1 : 0;
		if($_username && $item['username'] == $_username) {
			$member = userinfo($item['username']);
			$user_status = 3;
		}
	}
	view_log($item);
	if($EXT['mobile_enable']) $head_mobile = str_replace($MOD['linkurl'], $MOD['mobile'], $linkurl);
	$last = last($itemid);
} else {
	$itemid or dheader($MOD['mobile']);
	$item = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid");
	($item && $item['status'] > 2) or message($L['msg_not_exist']);
	if($item['groupid'] == 2) message($L['msg_not_exist']);
	extract($item);
	$CAT = get_cat($catid);
	if(!check_group($_groupid, $MOD['group_show']) || !check_group($_groupid, $CAT['group_show'])) message($L['msg_no_right']);
	$member = array();
	$fee = get_fee($item['fee'], $MOD['fee_view']);
	include DT_ROOT.'/mobile/api/contact.inc.php';
	$content_table = content_table($moduleid, $itemid, $MOD['split'], $table_data);
	$t = $db->get_one("SELECT content FROM {$content_table} WHERE itemid=$itemid");
	$content = video5($t['content']);
	if($MOD['keylink']) $content = keylink($content, $moduleid, 1);
	if($share_icon) $share_icon = share_icon($thumb, $content);
	$editdate = timetodate($edittime, 5);
	$unit or $unit = $L['unit'];
	$RL = $relate_id ? get_relate($item) : array();
	$P1 = get_nv($n1, $v1);
	$P2 = get_nv($n2, $v2);
	$P3 = get_nv($n3, $v3);
	if($step) {
		extract(unserialize($step));
	} else {
		$a1 = 1;
		$p1 = $item['price'];
		$a2 = $a3 = $p2 = $p3 = '';
	}
	view_log($item);
	$update = '';
	$back_link = $MOD['mobile'].$CAT['linkurl'];
	$head_name = $CAT['catname'];
	$foot = '';
	$last = last($itemid);
}
if(!$DT_BOT) include DT_ROOT.'/include/update.inc.php';
$seo_file = 'show';
include DT_ROOT.'/include/seo.inc.php';
$template = $item['template'] ? $item['template'] : ($CAT['show_template'] ? $CAT['show_template'] : ($MOD['template_show'] ? $MOD['template_show'] : 'show'));
include template($template, $module);
function last($itemid){
	global $table,$db;
	$last_item = $db->get_one("SELECT * FROM {$table} ORDER BY itemid DESC LIMIT 1");
	$last_id = $last_item['itemid'];
	return $last_id == $itemid;
}
function get_big($albums){
	foreach ($albums as $k => $album) {
		$albums[$k] = substr($album,0,strlen($album)-strlen(".middle.jpg"));
	}
	return $albums;
}
?>