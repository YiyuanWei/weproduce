<?php
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
if ($submit){

    $itemid = new_item();
    // handling files
    $newpost=$_POST;
    unset($newpost['submit']);

    require DT_ROOT.'/include/upload.class.php';
    
    //upload images
    $newpost['fimg'] = uploadImage('f');
    
    require DT_ROOT.'/module/'.$module.'/fabric.class.php';
    $fabric = new fabric($moduleid,$itemid);
    
    if($fabric->add($newpost)){
        dheader('?action=complete&itemid='.$itemid);
    }
}
else{
    include template('fabric_info',$module);
}
function upload($file, $catname, $i=-1){
    if( !$file['name'] ) return ;
    global $_userid, $itemid, $DT;
    $ext = file_ext($file['name']);
    $exts = '';
    $nameid = '';
    // uploading images
    if( $i+1 ){
        $nameid = '_'.($i+1);
        $exts = 'jpg|jpeg|gif|png';
    }
    $name = $catname.'_'.$_userid.$nameid.'.'.$ext;
    $temp = DT_ROOT.'/file/temp/'.$name;
    if( is_file($temp) ) file_del($temp);
    $upload = new upload([$file],'file/temp/',$name, $exts);
    $upload->adduserid = false;
    $md5 = md5(DT_TIME+$_userid+$itemid);
    if($upload->save()){
        $temp = DT_ROOT.'/file/temp/'.$name;
        
        $dir = DT_ROOT.'/file/fabric/'.substr($md5, 0, 2).'/'.substr($md5, 2, 2).'/'.$itemid.'/';

        $f = $dir.$name;
        file_copy($temp,$f);
        file_del($temp);

        if($DT['ftp_remote'] && $DT['remote_url']){
            require DT_ROOT.'/include/ftp.class.php';
            $ftp = new dftp($DT['ftp_host'], $DT['ftp_user'],$DT['ftp_pass'],$DT['ftp_port'],$DT['ftp_path'],$DT['ftp_pasv'],$DT['ftp_ssl']);
            if($ftp->connected){
                $t = explode("/file/", $f);
                $ftp->dftp_put('file/'.$t[1], $t[1]);
            }
        }

        if($i+1) return array($name,$f);
        return $f;

    }
    else{
        if($DT_PC) message($upload->errmsg);
			exit('{"error":1,"message":"'.$upload->errmsg.'"}');
    }
}
function uploadFile( $catname ){
    $catname = 'f'.$catname;
    $file = $_FILES[$catname];
    
    return upload($file,$catname);
    
}
function uploadImage( $catname ){
    $catname.= 'img';
    $files = rearrange($_FILES[$catname]);
    $names = array();
    for( $i = 0 ; $i < count($files); $i++ ){
        list($name, $f) = upload($files[$i],$catname,$i);
        $names[$name] = $f;
    }
    return $names;
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
