<?php
defined('IN_DESTOON') or exit('Access Denied');
class feedback{
    var $itemid;
    var $table;
    var $fields;

    function __construct(){
        global $table;
        $this->table = $table;
        $this->fields = array('subject','content','fromuser','addtime','status','email','phone');
    }

    function feedback(){
        $this->__construct();
    }

    function set($post){
        $post['addtime'] = DT_TIME;
        $post['status'] = 0;
        return $post;
    }

    function add($post){
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

}
?>