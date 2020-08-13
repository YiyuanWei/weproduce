<?php 
defined('IN_DESTOON') or exit('Access Denied');
class address {
	var $itemid;
	var $table;
	var $fields;
	var $errmsg = errmsg;

    function __construct() {
		$this->table = DT_PRE.'address';
		$this->fields = array('areaid','address','postcode','truename','telephone','mobile','username','addtime','editor','edittime','listorder','note','city','address_2');
    }

    function address() {
		$this->__construct();
    }

	function pass($post) {
		global $L;
		if(!is_array($post)) return false;
		$tests = array('areaid','address','postcode','truename','mobile','city');
		foreach ($tests as $k => $v) {
			if(!$post[$v]) return $this->_($L["pass_$v"].$v);
		}
		return true;
	}

	function set($post) {
		global $_username;
		$pos = area_pos($post['areaid'], '');
		if(substr($post['address'], 0, strlen($pos)) == $pos) $post['address'] = substr($post['address'], strlen($pos));
		$post['edittime'] = DT_TIME;
		$post['editor'] = $_username;
		$tests = DB::query("SELECT itemid, listorder from {$this->table} WHERE username='$_username' AND listorder=0");
		if( count($tests) ){
			if( intval($post['listorder']) == 0 ){
				foreach($tests as $k=>$test){
					DB::query("UPDATE {$this->table} SET listorder=1 WHERE itemid={$test['itemid']}");
				}
			}
		}
		$post['listorder'] = intval($post['listorder']);
		if($this->itemid) {
			// $post['editor'] = $_username;
		} else {
			$post['addtime'] = DT_TIME;
		}
		$post = dhtmlspecialchars($post);
		return array_map("trim", $post);
	}

	function get_one($condition = '') {
        return DB::get_one("SELECT * FROM {$this->table} WHERE itemid=$this->itemid $condition");
	}

	function get_list($condition, $order = 'listorder ASC,itemid ASC') {
		global $MOD, $pages, $page, $pagesize, $offset, $items, $sum;
		if($page > 1 && $sum) {
			$items = $sum;
		} else {
			$r = DB::get_one("SELECT COUNT(*) AS num FROM {$this->table} WHERE $condition");
			$items = $r['num'];
		}
		$pages = pages($items, $page, $pagesize);
		if($items < 1) return array();
		$lists = array();
		$result = DB::query("SELECT * FROM {$this->table} WHERE $condition ORDER BY $order LIMIT $offset,$pagesize");
		while($r = DB::fetch_array($result)) {
			$r['adddate'] = timetodate($r['addtime'], 5);
			$r['editdate'] = timetodate($r['edittime'], 5);
			$r['truename'] = str_replace("/"," ",$r['truename']);
			$lists[] = $r;
		}
		return $lists;
	}

	function add($post) {
		$post = $this->set($post);
		$sqlk = $sqlv = '';
		foreach($post as $k=>$v) {
			if(in_array($k, $this->fields)) { 
				$sqlk .= ','.$k; 
				$sqlv .= ",'$v'"; 
			}
		}
        $sqlk = substr($sqlk, 1);
        $sqlv = substr($sqlv, 1);
		DB::query("INSERT INTO {$this->table} ($sqlk) VALUES ($sqlv)");
		$this->itemid = DB::insert_id();		
		return $this->itemid;
	}

	function edit($post) {
		$post = $this->set($post);
		$sql = '';
		foreach($post as $k=>$v) {
			if(in_array($k, $this->fields)) $sql .= ",$k='$v'";
		}
        $sql = substr($sql, 1);
	    DB::query("UPDATE {$this->table} SET $sql WHERE itemid=$this->itemid");
		return true;
	}

	function delete($itemid, $all = true) {
		if(is_array($itemid)) {
			foreach($itemid as $v) { $this->delete($v); }
		} else {
			$this->itemid = $itemid;
			DB::query("DELETE FROM {$this->table} WHERE itemid=$itemid");
		}
	}

	function _($e) {
		$this->errmsg = $e;
		return false;
	}
}
?>