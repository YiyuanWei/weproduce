<?php
defined('IN_DESTOON') or exit('Access Denied');

function label($content, $l, $c='', $id = null){
	$id = isset($id) ? 'id' : '';
	$eid = $c.$l.$id;
    echo("<label for='$eid'>".$content.": </label>");
}

function content($content, $itemid){
    $_files = rearrange($content['files']);
    unset($content['files']);
    $_files = array_map('rearrange',$_files);
    $results = array();
    require_once DT_ROOT.'/include/upload.class.php';
    foreach( $_files as $key=>$files ){
        $results[$key] = upload($files, $key, $itemid);
    }
    $content['files'] = $results;
    return json_encode($content);
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
    $content = decode_content($content);
    $mail_body = form_mail($content);
    send_mail($DT['sys_email'],$subject,$mail_body);
}

function form_mail($content){
    global $_username, $_contact_email, $_contact_mobile;
    $name = ($_first_name!='' && $_last_name!='') ? $_first_name.' '.$_last_name : $_username;
    $files = $content['files'];
    unset($content['files']);
    $mail_body = line("Name of Client: ",$name);
    $mail_body .= line("Email: ",$_contact_email);
    $mail_body .= line("Mobile: ",$_contact_mobile);
    foreach( $content as $k=>$v ){
        $mail_body .= line(str_replace('_',' ',$k.': '),$v);
    }
    return $mail_body;
}

/* convert content in array into string form
*/
function content2str($content){
    $arr = decode_content($content);
    $str = '';
    foreach ($content as $k => $v) {
        $str .= line(str_replace('_',' ',$k.': '),$v);
    }
    return $str;
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
    $content = json_decode($content, true);
    $carray = array('f'=>'Fabric','z'=>'Zipper','b'=>'Button');
    $larray = array('m'=>'Material','c'=>'Type','n'=>'Number','t'=>'Thickness','w'=>'Weight','d'=>'Diameter');
    $fields = array('Fabric_Material','Fabric_Weight','Fabric_Type','Button_Material','Button_Diameter','Button_Thickness','Zipper_Material','Zipper_Number','Zipper_Thickness','Quantity','Estimated_Time','Fabric_Thickness','others','files');
    // decode the content with the corresponding value of the id
    foreach ($content as $key => $value) {
        if(($i = stripos($key,'id'))){
            $k = substr($key, 0, $i);
            $v = get_cat($value)['catname'];
            $content[$k] = ($content[$k] == '') ? $v : $content[$k];
            unset($content[$key]);
        }
        if( in_array($key[0], array_keys($carray)) && in_array($key[1], array_keys($larray)) ){
            $newk = $carray[$key[0]].'_'.$larray[$key[1]];
            $content[$newk] = $content[$key];
            unset($content[$key]);
        }
    }
    $results = array();
    foreach($fields as $k){
        if( isset($content[$k]) ){
            $results[$k] = $content[$k];
        }
    }
    return $results;
}

/*
upload files in the same structure as $_FILES,
parameters: $file: take the same structure as standard $_FILES
return: the path of the picture in the array with the key which is the same as the input
*/
function upload($files, $name, $itemid){
    global $DT,$module;
    $results = array();
    $exts= $name == 'img' ? 'jpg|jpeg|gif|png' : '';
    foreach ($files as $key => $file) {
        $f_name = $name.'_'.$key.'.'.file_ext($file['name']);
        $tmp = DT_ROOT.'/file/temp/'.$f_name;
        if( is_file($tmp) ) file_del($tmp);
        $upload = new upload([$file], 'file/temp/', $f_name, $exts);
        $upload->adduserid = false;
        $md5 = md5(md5($itemid));
        if($upload->save()){
            $dir = DT_ROOT.'/file/'.$module.'/'.substr($md5,0,2).'/'.substr($md5,2,2).'/'.$itemid.'/';

            $f = $dir.$f_name;
            file_copy($tmp,$f);
            file_del($tmp);
            $results[$name.'_'.$key] = $f;
        }
    }
    return $results;
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