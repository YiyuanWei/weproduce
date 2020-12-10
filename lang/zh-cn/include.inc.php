<?php
/*
	[DESTOON B2B System] Copyright (c) 2008-2018 www.destoon.com
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_DESTOON') or exit('Access Denied');
/* fields.func.php */
$L['fields_input'] = 'Please input a value for the field {V0}.';
$L['fields_choose'] = 'Please choose a value for the field {V0}.';
$L['fields_valid'] = 'Please provide valid input for the field {V0}.';
$L['fields_area'] = 'Please select area.';
$L['fields_less'] = 'The field {V0} must have no less than {V1} characters.';
// $L['fields_more'] = '{V0}不能多于{V1}字符';
$L['fields_more'] = 'The field {V0} must have no more than {V1} characters.';
// $L['fields_match'] = '{V0}不符合填写规则';
$L['fields_match'] = '{V0} should follow the rules for inputs';
/* global.func.php */
$L['msg_ip_ban'] = 'IP {V0} has been banned by the website,<br>please contact with us if you have any problem.';
$L['msg_word_ban'] = 'There are banned characters in the submitted material.';
$L['captcha_missed'] = 'Please input verification code.';
$L['captcha_expired'] = 'The verification code is expired.';
$L['captcha_error'] = 'The verification code is not correct.';
$L['answer_missed'] = 'Please provide answers.';
$L['question_expired'] = 'The question is expired.';
$L['answer_error'] = 'The answer is not correct.';
/* module.func.php */
$L['mod_day'] = 'day(s)';
$L['mod_hour'] = 'hr(s)';
$L['mod_minute'] = 'min(s)';
$L['mod_second'] = 'sec(s)';
/* post.func.php */
$L['post_new'] = '[Create New]';
$L['post_edit'] = '[Edit]';
/* url.inc.php */
$L['url_php'] = '动态';
$L['url_htm'] = '静态';
$L['url_rewrite'] = '伪静态';
$L['url_eg'] = '例';
/* upload.class.php */
$L['upload_size_limit'] = 'The size of the uploaded file exceed the limits.';
$L['upload_not_allow'] = 'The format of the uploaded file is not allowed.';
$L['upload_unwritable'] = 'No write permission for file storage directory.';
$L['upload_failed'] = 'Uploadig Failed';
$L['upload_bad'] = 'Bad File Format';
// $L['upload_error_1'] = '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值';
// $L['upload_error_2'] = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
// $L['upload_error_3'] = '文件只有部分被上传';
// $L['upload_error_4'] = '没有文件被上传';
// $L['upload_error_5'] = '文件已经存在';
// $L['upload_error_6'] = '找不到临时文件夹';
// $L['upload_error_7'] = '文件写入失败';
$L['upload_error_1'] = 'The uploaded files exceed the number set by<br><i>upload_max_filesize<i> in <i>php.ini<i> in server.';
$L['upload_error_2'] = 'The size of the uploaded file exceed MAX_FILE_SIZE value.';
$L['upload_error_3'] = 'Only part of the file has been uploaded.';
$L['upload_error_4'] = 'No file has been uploaded.';
$L['upload_error_5'] = 'File is existed in the server.';
$L['upload_error_6'] = 'Cannot find temporary directory.';
$L['upload_error_7'] = 'File uploading fails';
/* defend.inc.php */
$L['defend_reload'] = '刷新太快，请间隔{V0}秒访问';
$L['defend_proxy'] = '请不要使用代理访问本站';
?>