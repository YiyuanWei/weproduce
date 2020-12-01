<?php
defined('IN_DESTOON') or exit('Access Denied');

function label($content, $l, $c='', $id = null){
	$id = isset($id) ? 'id' : '';
	$eid = $c.$l.$id;
    echo("<label for='$eid'>".$content.": </label>");
}

function get_types($mid){
    global $DT_PRE;
    $table = $DT_PRE.'category';
    $results = DB::query("SELECT * FROM {$table} WHERE moduleid=$mid and letter='r' ORDER BY catid asc");
    while( $r = DB::fetch_array($results) ){
        $list[] = $r;
    }
    return $list;
}

function send_request($content){
    global $_username,$DT;
    $subject = 'New Request From '.$_username;
    $mail_body = form_mail($content);
    send_mail($DT['sys_email'],$subject,$mail_body);
}

function form_mail($content){
    global $_username, $_contact_email, $_contact_mobile, $email;
    $_contact_email or $_contact_email = $email;
    $name = ($_first_name!='' && $_last_name!='') ? $_first_name.' '.$_last_name : $_username;
    $mail_body = line("Name of Client: ",$name);
    $mail_body .= line("Email: ",$_contact_email);
    $mail_body .= line("Mobile: ",$_contact_mobile);
    foreach( $content as $k=>$v ){
        $mail_body .= line($k.': ',$v);
    }
    return $mail_body;
}

function line(...$str){
    $results = "";
    foreach( $str as $s ){
        $results .= $s;
    }
    $results.="<br>";
    return $results;
}

/* 
deocde the content from database into array
*/
function decode_content($content){
    $carray = array('f'=>'Fabric','z'=>'Zipper','b'=>'Button');
    $larray = array('m'=>'Material','c'=>'Type','n'=>'Number','t'=>'Thickness','w'=>'Weight','d'=>'Diameter');
    $fields = array('Fabric Material','Fabric Weight','Fabric Type','Button Material','Button Diameter','Button Thickness','Zipper Material','Zipper Number','Zipper Thickness','Fabric Thickness','Requirements');
    // decode the content with the corresponding value of the id
    foreach ($content as $key => $value) {
        if(($i = stripos($key,'id'))){
            $k = substr($key, 0, $i);
            $v = get_cat($value)['catname'];
            $content[$k] = ($content[$k] == '') ? $v : $content[$k];
            unset($content[$key]);
        }
        if( in_array($key[0], array_keys($carray)) && in_array($key[1], array_keys($larray)) ){
            $newk = $carray[$key[0]].' '.$larray[$key[1]];
            $content[$newk] = $content[$key];
            unset($content[$key]);
        }
    }
    $results = array();
    foreach($fields as $k){
        if( $content[$k]){
            $results[$k] = $content[$k];
        }
    }
    return $results;
}

/**
 * decode one entry of the content
 */
function encode_content_entry($k){
    $carray = array('f'=>'Fabric','z'=>'Zipper','b'=>'Button');
    $larray = array('m'=>'Material','c'=>'Type','n'=>'Number','t'=>'Thickness','w'=>'Weight','d'=>'Diameter');
    $arr = array_flip(array_merge($carray,$larray));
    $karr = explode(" ",$k);
    $str = '';
    foreach($karr as $v){
        $str.= $arr[$v];
    }
    return $str;
}

function rearrange( $arr ){
    $new = array();
    foreach( $arr as $k=>$all ){
        foreach ( $all as $i=>$v ){
            $new[$i][$k] = $v;
        }
    }
    return $new;
}

?>