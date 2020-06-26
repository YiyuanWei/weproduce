<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<style type="text/css">
.avatar_upload {overflow:hidden;position:relative;width:128px;height:128px;background:url('image/avatar_upload.gif') no-repeat center center;border:#DDDDDD 1px solid;}
.avatar_uploading {overflow:hidden;position:relative;width:128px;height:128px;background:url('image/avatar_uploading.gif') no-repeat center center;border:#DDDDDD 1px solid;}
.avatar_file {position:absolute;left:0;top:0;font-size:100px;margin:0 0 0 -1100px;opacity:0;filter:alpha(opacity=0);cursor:pointer;}
</style>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab_on" id="action"><a href="?action=index"><span>管理头像</span></a></td>
</tr>
</table>
</div>
<table cellpadding="0" cellspacing="0">
<tr>
<td valign="top" style="border-right:#DDDDDD 1px solid;padding-right:5px;" width="150" align="center">
<img src="<?php echo useravatar($_username, 'large');?>&time=<?php echo $DT_TIME;?>" width="128" height="128" title="大头像"/>
<?php if($avatar) { ?><br/><br/><a href="?action=delete<?php if($action=='html') { ?>&html=1<?php } ?>
" class="t" onclick="return confirm('确定要删除个人头像吗？');">[删除头像]</a><?php } ?>
</td>
<td width="650" height="450" valign="top">
<div id="avatarshow" style="display:;">&nbsp;</div>
<div id="avatartips" style="padding:20px 0 0 20px;color:#666666;display:;">如果无法上传或者上传界面不显示，请点这里<a href="?action=html" class="t">切换上传模式</a></div>
<div id="avatarupload" style="display:none;margin:0 0 0 20px;">
<form method="post" action="?" enctype="multipart/form-data" id="dform" onsubmit="return check();">
<input type="hidden" name="action" value="upload"/>
<div class="avatar_uploading" id="avatar_uploading" style="display:none;"></div>
<div class="avatar_upload" id="avatar_upload" style="display:;">
<input type="file" name="file" id="upfile" class="avatar_file" onchange="if(isImg('upfile', 'jpg|jpeg|gif|png')){Dh('avatar_upload');Ds('avatar_uploading');this.form.submit();}" /></div>
</form>
</div>
</td>
</tr>
</table>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/swfobject.js"></script>
<script type="text/javascript">
if(swfobject.hasFlashPlayerVersion("8") && <?php if($MOD['domain']||$action=='html') { ?>0<?php } else { ?>1<?php } ?>
) {
var flashVars = 
{
imgUrl: '<?php echo DT_PATH;?>api/avatar/bg.jpg',
uploadUrl: '<?php echo DT_PATH;?>api/avatar/upload.php?auth=<?php echo $auth;?>',
uploadSrc: false,
copyright: 'http://www.destoon.com'
};
swfobject.embedSWF('<?php echo DT_PATH;?>api/avatar/avatar.swf', 'avatarshow', '650', '450', '8.0.0', '<?php echo DT_STATIC;?>file/flash/expressInstall.swf', flashVars);
Ds('avatartips');
} else {
Dh('avatarshow');Dh('avatartips');Ds('avatarupload');
}
function uploadevent(status) {
switch(status) {
case -1:
Go('?action=cancel&reload=<?php echo $DT_TIME;?>');
break;
case 0:
alert('参数错误');
case 1:
Go('?action=update&reload=<?php echo $DT_TIME;?>');
break;
case 2:
alert('请选择图片或拍照');
break;
case 3:
alert('图像格式错误');
Go('?action=error');
break;
default:
alert('上传失败，请重试');
Go('?action=error&reload=<?php echo $DT_TIME;?>');
break;
}
}
s('edit');
<?php if(isset($reload)) { ?>
Dd('myavatar').src=Dd('myavatar').src+'&reload=<?php echo $DT_TIME;?>';
<?php } ?>
</script>
<?php include template('footer', 'member');?>