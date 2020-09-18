<?php
defined('IN_DESTOON') or exit('Access Denied');
login();
require DT_ROOT.'/module/'.$module.'/common.inc.php';
require DT_ROOT.'/include/post.func.php';
require DT_ROOT.'/module/'.$module.'/'.$module.'.class.php';
$do = new $module($moduleid);
if($DT_PC) {
	if(!check_group($_groupid, $MOD['group_index'])) include load('403.inc');
	$typeid = isset($typeid) ? intval($typeid) : 99;
	isset($TYPE[$typeid]) or $typeid = 99;
	$step = isset($step) ? intval($step) : 1;
	$dtype = $typeid != 99 ? " AND typeid=$typeid" : '';
	$maincat = get_maincat($catid ? $CAT['parentid'] : 0, $moduleid);
	if($catid) $seo_title = $seo_catname.$seo_title;
	if($typeid != 99) $seo_title = $TYPE[$typeid].$seo_delimiter.$seo_title;
	if($page == 1) $head_canonical = $MOD['linkurl'];
	$destoon_task = "moduleid=$moduleid&html=index";
	if($EXT['mobile_enable']) $head_mobile = $MOD['mobile'].($page > 1 ? 'index.php?page='.$page : '');
	switch($step){
		case 1:
			break;
		case 2:
			if( $submit ){
				$post['title'] = "Express";
				isset($post['totime']) or $post['totime'] = 0;
				if($do->pass($post)){
					if($itemid=$do->add($post)){
						$subject = "Sample has been sent.";
						$mail = "Customer {$post['username']} has sent a sample. Please check.<br>";
						$mail .= "The tracking number is {$post['note']}.";
						send_mail($DT['sys_email'],$subject,$mail);
					}
				}
			}
			break;
		case 3:
			if( $submit ){
				$content['files'] = $_FILES['content'];
				$content['fm'] = $content['fm'] ? $content['fm'] : get_cat($content['fmid'])['catname'];
				$content['fc'] = $content['fc'] ? $content['fc'] : get_cat($content['fcid'])['catname'];
				unset($content['fmid']);unset($content['fcid']);
				$post['content'] = $content;
				$post['amount'] = $content['Quantity'];
				$catname = get_cat($post['catid'])['catname'];
				$post['title'] = $catname."_request";
				isset($post['totime']) or $post['totime'] = 0;
				if($do->pass($post)){
					if( $itemid = $do->add($post) ){
						dheader('?step=4&itemid='.$itemid);
					}
				}
			}
			break;
		case 4:
			break;
		case 5:
			break;
		default:
			dheader("?step=1");
			break;
	}
} else {
	$condition = "status=3";
	if($cityid) {
		$areaid = $cityid;
		$ARE = $AREA[$cityid];
		$condition .= $ARE['child'] ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
	}
	$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $condition", 'CACHE');
	$items = $r['num'];
	$pages = mobile_pages($items, $page, $pagesize);
	$lists = array();
	if($items) {
		$order = $MOD['order'];
		$time = strpos($MOD['order'], 'add') !== false ? 'addtime' : 'edittime';
		$result = $db->query("SELECT ".$MOD['fields']." FROM {$table} WHERE $condition ORDER BY $order LIMIT $offset,$pagesize");
		while($r = $db->fetch_array($result)) {
			$r['title'] = str_replace('style="color:', 'style="font-size:16px;color:', set_style($r['title'], $r['style']));
			$r['linkurl'] = $MOD['mobile'].$r['linkurl'];
			$r['date'] = timetodate($r[$time], 3);
			$lists[] = $r;
		}
		$db->free_result($result);
	}
	$back_link = DT_MOB.'channel.php';
	$head_name = $MOD['name'];
}
$seo_file = 'index';
include DT_ROOT.'/include/seo.inc.php';
include template($MOD['template_index'] ? $MOD['template_index'] : 'index', $module);

?>