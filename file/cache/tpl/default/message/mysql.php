<?php defined('IN_DESTOON') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="<?php echo DT_CHARSET;?>"/>
<title>数据库连接失败<?php echo $DT['seo_delimiter'];?><?php echo $DT['sitename'];?></title>
<meta name="robots" content="noindex,nofollow"/>
<style type="text/css">
*{font-size:14px;font-family:Arial,Verdana;}
body{background:#FFFFFF;}
div {width:500px;padding:50px 0 0 60px;line-height:300%;}
</style>
</head>
<body>
<div>
<strong>数据库连接失败(Can not connect to MySQL server)</strong><br/>
系统无法<span style="color:red;">连接</span>到MySQL服务器。<a href="https://www.destoon.com/doc/skill/61.html" target="_blank">点此查看此问题的解决方案</a><br/>
<a href="<?php echo DT_PATH;?>"><?php echo $DT['sitename'];?></a><br/>
</div>
</body>
</html>