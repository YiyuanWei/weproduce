<?php
defined('DT_ADMIN') or exit('Access Denied');
$MCFG['module'] = 'request';
$MCFG['name'] = 'request';
$MCFG['author'] = 'DESTOON';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = true;
$MCFG['uninstall'] = true;
$MCFG['moduleid'] = 100;

$RT = array();
$RT['file']['index'] = 'manage request';
$RT['file']['html'] = 'refresh webpage';

$RT['action']['index']['add'] = 'Create New Request';
$RT['action']['index']['edit'] = 'Change Request Information';
$RT['action']['index']['delete'] = 'Delete Request';
$RT['action']['index']['check'] = 'Check Request';
$RT['action']['index']['expire'] = 'Expire Request';
$RT['action']['index']['reject'] = 'Rejected Request';
$RT['action']['index']['recycle'] = '回收站';
$RT['action']['index']['level'] = '信息级别';

$CT = 1;
?>