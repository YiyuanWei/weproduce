<?php
define('DT_REWRITE', true);
require '../common.inc.php';
$table = $DT_PRE.'feedback';
require 'feedback.class.php';
$do = new feedback();
if( $submit ){
    $do->add($post);
    echo "feedback submitted";
}
include template('index','about');
?>