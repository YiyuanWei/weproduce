<?php
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
if (!isset($_GET['type'])){
    header("Location: ".'../'.$module.'/index.php');
}
else{
    $type = $_GET['type'];
    header("Location: ".'../'.$module.'/'.$type.'.php');
}
?>