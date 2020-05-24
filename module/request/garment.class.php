<?php
defined('IN_DESTOON') or exit('Access Denied');
class garment {

    var $moduleid;
    var $itemid;

    var $tables;

    public static $fields = array(
        'global'=>array('itemid','userid','addtime','adddate','sample','type'),
        'garment'=>array('quantity','saletime','ftid','others','fDesign','fSize','fLabel','photos', 'ftv', 'ftunit', 'fmid', 'fweight', 'fcatid', 'fimg', 'fm', 'fcat'),
        'button'=>array('bmid','bdiameter','btid','bimg', 'bm', 'btv', 'btunit'),
        'zipper'=>array('zmid','znumber','ztid','zimg', 'zm', 'ztv', 'ztunit')
    );


    static $sample = 0; # 0 for not sending sample, 1 for send sample
    static $type = 0; # 0 for garment, 1 for fabric

    function __construct($moduleid, $itemid)
    {   
        global $table, $table_garment, $table_req_button, $table_req_zipper;
        $this->moduleid = $moduleid;
        $this->itemid = $itemid;
        $this->tables = array(
            'global'=>$table, 
            'garment'=>$table_garment,
            'button'=>$table_req_button, 
            'zipper'=>$table_req_zipper
        );   
    }

    function garment($moduleid,$itemid){
        $this->__construct($moduleid,$itemid);
    }

    function set($post){
        global $_userid;
        
        $newpost['global'] = array(
            'userid' => $_userid,
            'addtime' => DT_TIME,
            'adddate' => timetodate(DT_TIME,3),
            'sample' => garment::$sample,
            'type' => garment::$type
        );

        foreach ($post as $k=>$v){
            if( is_array($v) ) {
                $v = json_encode($v);
            }
            if( $v=='default' ) $v = '0';
            $newpost[garment::search_table($k)][$k] = $v;
        }

        return $this->reorder($newpost);
    }

    function add($post){
        $post = $this->set($post);
        foreach( $post as $t=>$table ){
            $sqlk = 'itemid';
            $sqlv = $this->itemid;
            foreach($table as $k=>$v) {
                if(in_array($k, garment::$fields[$t])) { $sqlk .= ','.$k; $sqlv .= ",'$v'"; }
            }
            $sql = "INSERT INTO {$this->tables[$t]} ($sqlk) VALUES ($sqlv);";
            if( DB::query($sql) ) continue;
            else return false;
        }
        return true;
    }

    static function search_table($k){
        foreach( garment::$fields as $table=>$attrs ){
            if (in_array($k, $attrs)) return $table;
        }
    }

    function reorder($arr){
        $new = array();
        foreach( $this->tables as $k=>$v ){
            $new[$k] = $arr[$k];
        }
        return $new;
    }
}
?>