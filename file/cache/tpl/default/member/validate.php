<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<?php if($action == 'email') { ?>
<?php if($itemid==1) { ?><div class="warn">尊敬的用户，为了保证信息的真实有效，请先<strong>认证</strong>您的<strong>Email</strong>，认证通过之后即可发布信息</div><?php } ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab"><a href="?action=index"><span>身份认证</span></a></td>
<td class="tab" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、发送邮件</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、邮件验证</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、通过认证</span></a></td>
</tr>
</table>
</div>
<?php if($step == 2) { ?>
<div class="ok">邮箱认证成功 <a href="?action=index" class="t">立即返回</a></div>
<?php } else if($step == 1) { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 邮件验证码</td>
<td class="tr"><input type="text" size="10" name="code" id="code" placeholder="已发送至邮箱"/> <span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value="立即认证" class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="重新发送" class="btn" onclick="Go('?action=<?php echo $action;?>&email=<?php echo $email;?>');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('code').value.length < 6) {
Dmsg('请填写邮件验证码', 'code');
return false;
}
return true;
}
</script>
<?php } else { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="1"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 电子邮件</td>
<td class="tr"><input type="text" size="30" name="email" id="email" value="<?php echo $email;?>"/> <span id="demail" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value="下一步" class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="返 回" class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('email').value.length < 6) {
Dmsg('请填写电子邮件', 'email');
return false;
}
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
</script>
<?php } ?>
<script type="text/javascript">m('Tab<?php echo $step;?>');</script>
<?php } else if($action == 'vemail') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab"><a href="?action=index"><span>身份认证</span></a></td>
<td class="tab_on" id="Tab0"><a href="?action=<?php echo $action;?>"><span>邮件认证</span></a></td>
</tr>
</table>
</div>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">邮件地址</td>
<td class="tr"><strong><?php echo $_email;?></strong> <a href="send.php?action=email" class="t">[修改]</a></td>
</tr>
<tr>
<td class="tl">认证状态</td>
<td class="tr f_green">已认证</td>
</tr>
</table>
<?php } else if($action == 'mobile') { ?>
<?php if($itemid==1) { ?><div class="warn">尊敬的用户，为了保证信息的真实有效，请先<strong>认证</strong>您的<strong>手机号码</strong>，认证通过之后即可发布信息</div><?php } ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab"><a href="?action=index"><span>身份认证</span></a></td>
<td class="tab" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、发送短信</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、短信验证</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、通过认证</span></a></td>
</tr>
</table>
</div>
<?php if($step == 2) { ?>
<div class="ok">手机号码认证成功 <a href="?action=index" class="t">立即返回</a></div>
<?php } else if($step == 1) { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 短信验证码</td>
<td class="tr"><input type="text" size="10" name="code" id="code" placeholder="已发送至手机"/> <span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" value="立即认证" class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="重新发送" class="btn" onclick="Go('?action=<?php echo $action;?>&mobile=<?php echo $mobile;?>');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('code').value.length < 6) {
Dmsg('请填写短信验证码', 'code');
return false;
}
return true;
}
</script>
<?php } else { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="1"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 手机号码</td>
<td class="tr"><input type="text" size="30" name="mobile" id="mobile" value="<?php echo $mobile;?>"/> <span id="dmobile" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit"  name="submit" value="下一步" class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="返 回" class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('mobile').value.length < 11) {
Dmsg('请填写手机号码', 'mobile');
return false;
}
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
</script>
<?php } ?>
<script type="text/javascript">m('Tab<?php echo $step;?>');</script>
<?php } else if($action == 'vmobile') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab"><a href="?action=index"><span>身份认证</span></a></td>
<td class="tab_on" id="Tab0"><a href="?action=<?php echo $action;?>"><span>手机认证</span></a></td>
</tr>
</table>
</div>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">手机号码</td>
<td class="tr"><strong><?php echo $_mobile;?></strong> <a href="send.php?action=mobile" class="t">[修改]</a></td>
</tr>
<tr>
<td class="tl">认证状态</td>
<td class="tr f_green">已认证</td>
</tr>
</table>
<?php } else if($action == 'truename') { ?>
<?php if($itemid==1) { ?><div class="warn">尊敬的用户，为了保证信息的真实有效，请先<strong>认证</strong>您的<strong>真实姓名</strong>，认证通过之后即可发布信息</div><?php } ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab"><a href="?action=index"><span>身份认证</span></a></td>
<td class="tab_on" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、提交证件</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、审核证件</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、通过认证</span></a></td>
</tr>
</table>
</div>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 真实姓名</td>
<td class="tr"><input type="text" size="10" name="truename" id="truename" value="<?php echo $user['truename'];?>"/> <span id="dtruename" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 证件图片</td>
<td class="tr"><input name="thumb" id="thumb" type="text" size="60" readonly/>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dthumb(<?php echo $moduleid;?>,0,0, Dd('thumb').value, true);" class="t">[上传]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="_preview(Dd('thumb').value);" class="t">[预览]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dd('thumb').value='';" class="t">[删除]</a>
<span id="dthumb" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">证件图片</td>
<td class="tr"><input name="thumb1" id="thumb1" type="text" size="60" readonly/>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dthumb(<?php echo $moduleid;?>,0,0, Dd('thumb1').value, true, 'thumb1');" class="t">[上传]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="_preview(Dd('thumb1').value);" class="t">[预览]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dd('thumb1').value='';" class="t">[删除]</a></td>
</tr>
<tr>
<td class="tl">证件图片</td>
<td class="tr"><input name="thumb2" id="thumb2" type="text" size="60" readonly/>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dthumb(<?php echo $moduleid;?>,0,0, Dd('thumb2').value, true, 'thumb2');" class="t">[上传]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="_preview(Dd('thumb2').value);" class="t">[预览]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dd('thumb2').value='';" class="t">[删除]</a></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">认证说明</td>
<td class="tr lh18">
请上传个人有效证件（身份证或护照等）电子版本，以便网站核实认证<br/>
证件上的姓名必须与填写的真实姓名一致，并且图片需要清晰可辨<br/>
最少需要上传1张，最多可上传3张
</td>
</tr>
</tbody>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value="确 定" class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="返 回" class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<?php echo load('clear.js');?>
<?php if($MOD['vfax']) { ?>
<br/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">传真认证</td>
<td class="tr">
您可以传真有效证件至 <?php echo $MOD['vfax'];?> 进行认证，复印件上需注明会员名
</td>
</tr>
</table>
<?php } ?>
<script type="text/javascript">
function check() {
if(Dd('truename').value.length < 2) {
Dmsg('请填写真实姓名', 'truename');
return false;
}
if(Dd('thumb').value.length < 15) {
Dmsg('请上传证件图片', 'thumb');
return false;
}
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
</script>
<?php } else if($action == 'vtruename') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab"><a href="?action=index"><span>身份认证</span></a></td>
<td class="tab_on" id="Tab0"><a href="?action=<?php echo $action;?>"><span>实名认证</span></a></td>
</tr>
</table>
</div>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">真实姓名</td>
<td class="tr f_b"><?php echo $user['truename'];?></td>
</tr>
<?php if($user['vtruename'] || $va['status'] == 3) { ?>
<tr>
<td class="tl">认证状态</td>
<td class="tr f_green">已认证</td>
</tr>
<?php } else { ?>
<tr>
<td class="tl">认证状态</td>
<td class="tr f_red">审核中</td>
</tr>
<?php } ?>
<?php if($va['thumb']) { ?>
<tr>
<td class="tl">证件图片</td>
<td class="tr"><a href="<?php echo DT_PATH;?>api/view.php?img=<?php echo $va['thumb'];?>" target="_blank"><img src="<?php echo $va['thumb'];?>" onload="if(this.width>400)this.width=400;"/></a></td>
</tr>
<?php } ?>
<?php if($va['thumb1']) { ?>
<tr>
<td class="tl">证件图片</td>
<td class="tr"><a href="<?php echo DT_PATH;?>api/view.php?img=<?php echo $va['thumb1'];?>" target="_blank"><img src="<?php echo $va['thumb1'];?>" onload="if(this.width>400)this.width=400;"/></a></td>
</tr>
<?php } ?>
<?php if($va['thumb2']) { ?>
<tr>
<td class="tl">证件图片</td>
<td class="tr"><a href="<?php echo DT_PATH;?>api/view.php?img=<?php echo $va['thumb2'];?>" target="_blank"><img src="<?php echo $va['thumb2'];?>" onload="if(this.width>400)this.width=400;"/></a></td>
</tr>
<?php } ?>
</table>
<?php } else if($action == 'company') { ?>
<?php if($itemid==1) { ?><div class="warn">尊敬的用户，为了保证信息的真实有效，请先<strong>认证</strong>您的<strong>公司信息</strong>，认证通过之后即可发布信息</div><?php } ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab"><a href="?action=index"><span>身份认证</span></a></td>
<td class="tab_on" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、提交证件</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、审核证件</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、通过认证</span></a></td>
</tr>
</table>
</div>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 公司名称</td>
<td class="tr"><input type="text" size="60" name="company" id="company" value="<?php echo $user['company'];?>"/> <span id="dcompany" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 证件图片</td>
<td class="tr"><input name="thumb" id="thumb" type="text" size="60" readonly/>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dthumb(<?php echo $moduleid;?>,0,0, Dd('thumb').value, true);" class="t">[上传]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="_preview(Dd('thumb').value);" class="t">[预览]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dd('thumb').value='';" class="t">[删除]</a>
<span id="dthumb" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">证件图片</td>
<td class="tr"><input name="thumb1" id="thumb1" type="text" size="60" readonly/>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dthumb(<?php echo $moduleid;?>,0,0, Dd('thumb1').value, true, 'thumb1');" class="t">[上传]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="_preview(Dd('thumb1').value);" class="t">[预览]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dd('thumb1').value='';" class="t">[删除]</a></td>
</tr>
<tr>
<td class="tl">证件图片</td>
<td class="tr"><input name="thumb2" id="thumb2" type="text" size="60" readonly/>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dthumb(<?php echo $moduleid;?>,0,0, Dd('thumb2').value, true, 'thumb2');" class="t">[上传]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="_preview(Dd('thumb2').value);" class="t">[预览]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dd('thumb2').value='';" class="t">[删除]</a></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">认证说明</td>
<td class="tr lh18">
请上传公司有效证件（营业执照、组织机构代码证、税务登记证等）电子版本，以便网站核实认证<br/>
证件上的公司名称必须与填写的公司名称一致，并且图片需要清晰可辨<br/>
最少需要上传1张，最多可上传3张
</td>
</tr>
</tbody>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value="确 定" class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="返 回" class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<?php echo load('clear.js');?>
<?php if($MOD['vfax']) { ?>
<br/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">传真认证</td>
<td class="tr">
您可以传真有效证件至 <?php echo $MOD['vfax'];?> 进行认证，传真件上需盖公司公章
</td>
</tr>
</table>
<?php } ?>
<script type="text/javascript">
function check() {
if(Dd('company').value.length < 2) {
Dmsg('请填写公司名称', 'company');
return false;
}
if(Dd('thumb').value.length < 15) {
Dmsg('请上传证件图片', 'thumb');
return false;
}
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
</script>
<?php } else if($action == 'vcompany') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab"><a href="?action=index"><span>身份认证</span></a></td>
<td class="tab_on" id="Tab0"><a href="?action=<?php echo $action;?>"><span>公司认证</span></a></td>
</tr>
</table>
</div>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">公司名</td>
<td class="tr f_b"><?php echo $user['company'];?></td>
</tr>
<?php if($user['vcompany'] || $va['status'] == 3) { ?>
<tr>
<td class="tl">认证状态</td>
<td class="tr f_green">已认证</td>
</tr>
<?php } else { ?>
<tr>
<td class="tl">认证状态</td>
<td class="tr f_red">审核中</td>
</tr>
<?php } ?>
<?php if($va['thumb']) { ?>
<tr>
<td class="tl">证件图片</td>
<td class="tr"><a href="<?php echo DT_PATH;?>api/view.php?img=<?php echo $va['thumb'];?>" target="_blank"><img src="<?php echo $va['thumb'];?>" onload="if(this.width>400)this.width=400;"/></a></td>
</tr>
<?php } ?>
<?php if($va['thumb1']) { ?>
<tr>
<td class="tl">证件图片</td>
<td class="tr"><a href="<?php echo DT_PATH;?>api/view.php?img=<?php echo $va['thumb1'];?>" target="_blank"><img src="<?php echo $va['thumb1'];?>" onload="if(this.width>400)this.width=400;"/></a></td>
</tr>
<?php } ?>
<?php if($va['thumb2']) { ?>
<tr>
<td class="tl">证件图片</td>
<td class="tr"><a href="<?php echo DT_PATH;?>api/view.php?img=<?php echo $va['thumb2'];?>" target="_blank"><img src="<?php echo $va['thumb2'];?>" onload="if(this.width>400)this.width=400;"/></a></td>
</tr>
<?php } ?>
</table>
<?php } else if($action == 'bank') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab"><a href="?action=index"><span>身份认证</span></a></td>
<td class="tab_on" id="Tab0"><a href="?action=<?php echo $action;?>"><span>银行帐号验证</span></a></td>
<td class="tab" id="Tab1"><a href="cash.php?action=setting"><span>银行帐号设置</span></a></td>
</tr>
</table>
</div>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">开户银行</td>
<td class="tr"><?php if($user['bank']) { ?><?php echo $user['bank'];?><?php } else { ?>未设置<?php } ?>
</td>
</tr> 
<tr>
<td class="tl">开户网点</td>
<td class="tr"><?php if($user['branch']) { ?><?php echo $user['branch'];?><?php } else { ?>未设置<?php } ?>
</td>
</tr>
<tr>
<td class="tl">收款帐号</td>
<td class="tr"><?php if($user['account']) { ?><?php echo $user['account'];?><?php } else { ?>未设置<?php } ?>
</td>
</tr>
<tr>
<td class="tl">收款户名</td>
<td class="tr"><?php if($user['banktype']) { ?><?php echo $user['company'];?><?php } else { ?><?php echo $user['truename'];?><?php } ?>
</td>
</tr>
<?php if($user['vbank']) { ?>
<tr>
<td class="tl">认证状态</td>
<td class="tr f_green">已认证</td>
</tr>
<?php } else { ?>
<tr>
<td class="tl">认证状态</td>
<td class="tr f_gray">未认证</td>
</tr>
<tr>
<td class="tl">认证说明</td>
<td class="tr f_red">银行帐号在申请提现后，由网站进行认证</td>
</tr>
<?php } ?>
</table>
<?php } else { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab_on" id="Tab0"><a href="?action=index"><span>身份认证</span></a></td>
</tr>
</table>
</div>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">认证类型</td>
<td class="tr">
<div style="line-height:40px;font-size:14px;padding-left:10px;">
<?php if($MOD['vemail']) { ?>
<a href="?action=email" class="t">邮件认证</a> &nbsp; <?php if($vemail) { ?><span class="f_green">已通过</span><?php } else { ?><span class="f_gray">未通过</span><?php } ?>
<br/>
<?php } ?>
<?php if($MOD['vmobile']) { ?>
<a href="?action=mobile" class="t">手机认证</a> &nbsp; <?php if($vmobile) { ?><span class="f_green">已通过</span><?php } else { ?><span class="f_gray">未通过</span><?php } ?>
<br/>
<?php } ?>
<?php if($MOD['vbank']) { ?>
<a href="?action=bank" class="t">银行认证</a> &nbsp; <?php if($vbank) { ?><span class="f_green">已通过</span><?php } else { ?><span class="f_gray">未通过</span><?php } ?>
<br/>
<?php } ?>
<?php if($MOD['vtruename']) { ?>
<a href="?action=truename" class="t">实名认证</a> &nbsp; <?php if($vtruename) { ?><span class="f_green">已通过</span><?php } else { ?><span class="f_gray">未通过</span><?php } ?>
<br/>
<?php } ?>
<?php if($MOD['vcompany'] && $MG['type']) { ?>
<a href="?action=company" class="t">公司认证</a> &nbsp; <?php if($vcompany) { ?><span class="f_green">已通过</span><?php } else { ?><span class="f_gray">未通过</span><?php } ?>
<br/>
<?php } ?>
</div>
</td>
</tr>
</table>
<?php } ?>
<script type="text/javascript">s('account');</script>
<?php if($seconds) { ?>
<script type="text/javascript">
Dd('send_code').disabled = true;
var i = <?php echo $seconds;?>;
var interval=window.setInterval(
function() {
if(i == 0) {
Dd('send_code').value = '下一步';
Dd('send_code').disabled = false;
clearInterval(interval);
} else {
Dd('send_code').value = '下一步('+i+'秒)';
i--;
}
},
1000);
</script>
<?php } ?>
<?php include template('footer', 'member');?>