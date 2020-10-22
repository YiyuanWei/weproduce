<?php
defined('IN_DESTOON') or exit('Access Denied');
function get_relate($M) {
	global $table, $MOD, $DT_PC;
	$lists = $tags = array();
	if($M['relate_id'] && $M['relate_name']) {
		$ids = $M['relate_id'];
		$result = DB::query("SELECT itemid,title,linkurl,thumb,username,status,relate_id,relate_name,relate_title FROM {$table} WHERE itemid IN ($ids)");
		while($r = DB::fetch_array($result)) {
			if($r['username'] != $M['username']) continue;
			if($r['relate_id'] != $M['relate_id']) continue;
			if($r['relate_name'] != $M['relate_name']) continue;
			if($r['status'] != 3) continue;
			if(!$r['relate_title']) $r['relate_title'] = $r['title'];
			$tags[$r['itemid']] = $r;
		}
		foreach(explode(',', $ids) as $v) {
			if(isset($tags[$v])) $lists[] = $tags[$v];
		}
		return count($lists) > 1 ? $lists : array();
	}
}

function get_nv($n, $v) {
	$p = array();
	if($n && $v) $p = explode('|', $v);
	return count($p) > 1 ? $p : array();
}

function get_price($amount, $price, $step) {
	if($step) {
		$s = unserialize($step);
		if($s['a3'] && $amount > $s['a3']) return $s['p3'];
		if($s['a2'] && $amount > $s['a2']) return $s['p2'];
	}
	return $price;
}

function get_promos($username) {
	$lists = array();
	$result = DB::query("SELECT * FROM ".DT_PRE."finance_promo WHERE username='$username' AND fromtime<".DT_TIME." AND totime>".DT_TIME." AND number<amount ORDER BY price ASC LIMIT 10", 'CACHE');
	while($r = DB::fetch_array($result)) {
		$lists[] = $r;
	}
	return $lists;
}

function get_coupons($username, $seller) {
	$lists = array();
	$result = DB::query("SELECT * FROM ".DT_PRE."finance_coupon WHERE username='$username' AND (seller='$seller' OR seller='') AND fromtime<".DT_TIME." AND totime>".DT_TIME." AND oid=0 ORDER BY price ASC LIMIT 10", 'CACHE');
	while($r = DB::fetch_array($result)) {
		$lists[] = $r;
	}
	return $lists;
}

function view_log($item) {
	global $table_view, $_username;
	if($item && $_username) {
		$uid = $_username.'|'.$item['itemid'];
		$itemid = $item['itemid'];
		$seller = $item['username'];
		if($itemid > 0 && check_name($seller)) DB::query("REPLACE INTO {$table_view} (uid,itemid,username,seller,lasttime) VALUES ('$uid','$itemid','$_username','$seller','".DT_TIME."')");
	}
}

function view_txt($date) {
	global $L;
	if($date == timetodate(DT_TIME, 3)) return $L['view_txt_0'];
	if($date == timetodate(strtotime('-1 day'), 3)) return $L['view_txt_1'];
	if($date == timetodate(strtotime('-2 day'), 3)) return $L['view_txt_2'];
	return $date;
}

function connectAPI($from,$to){

	$curl = curl_init();
	
	curl_setopt_array($curl, [
		CURLOPT_URL => "https://rapidapi.p.rapidapi.com/convert/10/".$from."/".$to."",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
			"x-rapidapi-host: currency13.p.rapidapi.com",
			"x-rapidapi-key: 39c8c0a6damsh0d9ec206f51bd6fp11d2f6jsn59e6f79f3c39"
		],
	]);
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) {
		return array('error'=>"cURL Error #:" . $err);
	} else {
		return json_decode($response);
	}
}

function currency($from='CNY', $to='AUD'){
	global $DT_PRE, $DT_TIME;
	$table_currency = $DT_PRE.'currency';
	$from = urlencode($from);
	$to = urlencode($to);
	$record = DB::get_one("SELECT * FROM {$table_currency} WHERE fromunit='$from' and tounit='$to'");
	if($record){
		if(($DT_TIME-intval($record['edittime'])) > 12*3600){
			$newrecord['itemid'] = $record['itemid'];
			$newrecord['value'] = connectAPI($from, $to)->amount;
		}
		else return $record['value'];
	}else{
		$newrecord['value'] = connectAPI($from, $to)->amount;
	}
	$newrecord['fromunit'] = $from;
	$newrecord['tounit'] = $to;
	$newrecord['edittime'] = $DT_TIME;
	$newrecord['editdate'] = timetodate($DT_TIME, 3);
	
	$query = arraytoquery($newrecord);
	$query = "REPLACE INTO {$table_currency} ".$query;
	DB::query($query);
	return $newrecord['value'];
}

function calculatePrice($p, $c){
	if( $p == 0 ) return $p;
	$p *= $c;
	$p = number_format($p, 2,',','');
	$p = substr($p, 0, -1);
	return $p.'9';
}
?>