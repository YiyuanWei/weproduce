<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="?action=add"><span>添加商友</span></a></td>
<td class="tab" id="s3"><a href="?action=index"><span>我的商友</span></a></td>
<td class="tab" id="type"><a href="javascript:Dwidget('type.php?item=friend', '[商友分类]', 600, 300);"><span>商友分类</span></a></td>
</tr>
</table>
</div>
<?php if($action == 'add' || $action == 'edit') { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">分类</td>
<td class="tr"><span id="type_box"><?php echo $type_select;?></span>&nbsp; <a href="javascript:var type_item='friend-<?php echo $_userid;?>',type_name='post[typeid]',type_default='<?php echo $L['default_type'];?>',type_id=<?php echo $typeid;?>,type_interval=setInterval('type_reload()',500);Dwidget('type.php?item=friend', '[商友分类]', 600, 300);" class="t">[管理分类]</a></td>
</tr>
<tr>
<td class="tl">会员</td>
<td class="tr"><input type="text" size="20" name="post[username]" id="username" value="<?php echo $username;?>"/> <input type="button" class="btn" value="显示资料" onclick="Go('?action=add&username='+Dd('username').value);"/></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 姓名</td>
<td class="tr"><input type="text" size="20" name="post[truename]" id="truename" value="<?php echo $truename;?>"/> <span id="dtruename" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">公司</td>
<td class="tr"><input type="text" size="40" name="post[company]" id="company" value="<?php echo $company;?>"/> <?php echo dstyle('post[style]', $style);?></td>
</tr>
<tr>
<td class="tl">职位</td>
<td class="tr"><input type="text" size="20" name="post[career]" id="career" value="<?php echo $career;?>"/></td>
</tr>
<tr>
<td class="tl">电话</td>
<td class="tr"><input type="text" size="20" name="post[telephone]" id="telephone" value="<?php echo $telephone;?>"/></td>
</tr>
<tr>
<td class="tl">手机</td>
<td class="tr"><input type="text" size="20" name="post[mobile]" id="mobile" value="<?php echo $mobile;?>"/></td>
</tr>
<tr>
<td class="tl">主页</td>
<td class="tr"><input type="text" size="40" name="post[homepage]" id="homepage" value="<?php echo $homepage;?>"/></td>
</tr>
<tr>
<td class="tl">邮件</td>
<td class="tr"><input type="text" size="30" name="post[email]" id="email" value="<?php echo $email;?>"/></td>
</tr>
<?php if($DT['im_qq']) { ?>
<tr>
<td class="tl">QQ</td>
<td class="tr"><input type="text" size="20" name="post[qq]" id="qq" value="<?php echo $qq;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_wx']) { ?>
<tr>
<td class="tl">微信</td>
<td class="tr"><input type="text" size="20" name="post[wx]" id="wx" value="<?php echo $wx;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_ali']) { ?>
<tr>
<td class="tl">旺旺</td>
<td class="tr"><input type="text" size="20" name="post[ali]" id="ali" value="<?php echo $ali;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_skype']) { ?>
<tr>
<td class="tl">Skype</td>
<td class="tr"><input type="text" size="20" name="post[skype]" id="skype" value="<?php echo $skype;?>"/></td>
</tr>
<?php } ?>
<tr>
<td class="tl">备注</td>
<td class="tr"><input type="text" size="40" name="post[note]" id="note" value="<?php echo $note;?>"/></td>
</tr>
<tr>
<td class="tl">排序</td>
<td class="tr f_gray"><input type="text" size="3" name="post[listorder]" id="listorder" value="<?php echo $listorder;?>"/> 请填写数字，数字越大越靠前</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value="<?php if($action=='add') { ?>添 加<?php } else { ?>修 改<?php } ?>
" class="btn_g"/></td>
</tr>
</table>
</form>
<script type="text/javascript">s('friend');m(<?php if($action=='add') { ?>'add'<?php } else { ?>'s3'<?php } ?>
);</script>
<?php } else if($action=='show') { ?>
<table cellpadding="10" cellspacing="1" class="tb">
<?php if($typeid) { ?>
<tr>
<td class="tl">分类</td>
<td class="tr"><?php echo $TYPE[$typeid]['typename'];?></td>
</tr>
<?php } ?>
<?php if($username) { ?>
<tr>
<td class="tl">会员</td>
<td class="tr"><a href="message.php?action=send&touser=<?php echo $v['username'];?>"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/msg.gif" title="发送站内信" alt="" align="absmiddle"/></a>&nbsp;<?php if($DT['im_web']) { ?><?php echo im_web($username);?>&nbsp;<?php } ?>
<?php echo $username;?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">姓名</td>
<td class="tr"><?php echo $truename;?></td>
</tr>
<tr>
<td class="tl">公司</td>
<td class="tr"><?php echo $company;?></td>
</tr>
<tr>
<td class="tl">职位</td>
<td class="tr"><?php echo $career;?></td>
</tr>
<tr>
<td class="tl">电话</td>
<td class="tr"><?php echo $telephone;?></td>
</tr>
<tr>
<td class="tl">手机</td>
<td class="tr"><?php echo $mobile;?></td>
</tr>
<tr>
<td class="tl">主页</td>
<td class="tr"><a href="<?php echo DT_PATH;?>api/redirect.php?url=<?php echo urlencode($homepage);?>" class="t" target="_blank"><?php echo $homepage;?></a></td>
</tr>
<tr>
<td class="tl">邮件</td>
<td class="tr"><?php echo $email;?></td>
</tr>
<?php if($qq) { ?>
<tr>
<td class="tl">QQ</td>
<td class="tr"><?php echo im_qq($qq);?>&nbsp;<?php echo $qq;?></td>
</tr>
<?php } ?>
<?php if($wx) { ?>
<tr>
<td class="tl">微信</td>
<td class="tr"><?php echo im_wx($wx, $username);?>&nbsp;<?php echo $wx;?></td>
</tr>
<?php } ?>
<?php if($ali) { ?>
<tr>
<td class="tl">旺旺</td>
<td class="tr"><?php echo im_ali($ali);?>&nbsp;<?php echo $ali;?></td>
</tr>
<?php } ?>
<?php if($skype) { ?>
<tr>
<td class="tl">Skype</td>
<td class="tr"><?php echo im_skype($v['skype']);?>&nbsp;<?php echo $skype;?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">备注</td>
<td class="tr"><?php echo $note;?></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="button" value="返 回" class="btn_g" onclick="Go('?action=index');"/></td>
</tr>
</table>
<script type="text/javascript">s('friend');m('s3');</script>
<?php } else { ?>
<form action="?">
<div class="tt">
&nbsp;<?php echo $fields_select;?>&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<?php echo $type_select;?>&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>&nbsp;
<input type="button" value=" 重 搜 " class="btn" onclick="Go('?action=index');"/>
</div>
</form>
<table cellpadding="5" cellspacing="1" width="100%" bgcolor="#E8E8E8">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<?php if($k%2==0) { ?><tr><?php } ?>
<td valign="top" width="50%" bgcolor="#FFFFFF" onmouseover="this.style.backgroundColor='#F5F5F5';" onmouseout="this.style.backgroundColor='#FFFFFF';" title="<?php echo $v['note'];?>" style="padding:10px;">
<table cellpadding="2" cellspacing="2" width="100%">
<tr>
<td height="24"><span class="f_r"><a href="?action=edit&itemid=<?php echo $v['itemid'];?>"><img width="16" height="16" src="image/edit.png" title="修改" alt=""/></a>&nbsp; <a href="?action=delete&itemid=<?php echo $v['itemid'];?>" onclick="return confirm('确定要删除吗？此操作将不可撤销');"><img width="16" height="16" src="image/delete.png" title="删除" alt=""/></a></span><a href="?action=show&itemid=<?php echo $v['itemid'];?>"><strong><?php if($v['dcompany']) { ?><?php echo $v['dcompany'];?><?php } else { ?>个人<?php } ?>
</strong></a></td>
</tr>
<tr>
<td height="22"><?php echo $v['truename'];?><?php if($v['career']) { ?> (<?php echo $v['career'];?>)<?php } ?>
</td>
</tr>
<tr>
<td height="20">电话：<?php echo $v['telephone'];?></td>
</tr>
<tr>
<td height="20">手机：<?php echo $v['mobile'];?></td>
</tr>
<tr>
<td height="20">
<span class="f_r" title="添加时间 <?php echo $v['adddate'];?>"><a href="?typeid=<?php echo $v['typeid'];?>" class="t">[<?php echo $v['type'];?>]</a></span>
<?php if($v['homepage']) { ?><a href="<?php echo DT_PATH;?>api/redirect.php?url=<?php echo urlencode($v['homepage']);?>" target="_blank"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/homepage.gif" title="公司主页" alt="" align="absmiddle"/></a>&nbsp;<?php } ?>
<?php if($v['username']) { ?><a href="message.php?action=send&touser=<?php echo $v['username'];?>"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/msg.gif" title="发送站内信" alt="" align="absmiddle"/></a>&nbsp;<?php } ?>
<?php if($v['email']) { ?><a href="mailto:<?php echo $v['email'];?>"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/email.gif" title="发送邮件 <?php echo $v['email'];?>" alt="" align="absmiddle"/></a>&nbsp;<?php } ?>
<?php if($v['username'] && $DT['im_web']) { ?><?php echo im_web($v['username']);?>&nbsp;<?php } ?>
<?php if($v['qq'] && $DT['im_qq']) { ?><?php echo im_qq($v['qq']);?>&nbsp;<?php } ?>
<?php if($v['wx'] && $DT['im_wx']) { ?><?php echo im_wx($v['wx'], $v['username']);?>&nbsp;<?php } ?>
<?php if($v['ali'] && $DT['im_ali']) { ?><?php echo im_ali($v['ali']);?>&nbsp;<?php } ?>
<?php if($v['skype'] && $DT['im_skype']) { ?><?php echo im_skype($v['skype']);?>&nbsp;<?php } ?>
</td>
</tr>
</table>
</td>
<?php if($k%2==1) { ?></tr><?php } ?>
<?php } } ?>
</table>
<?php if($MG['friend_limit']) { ?>
<div class="limit">商友上限 <span class="f_b f_red"><?php echo $MG['friend_limit'];?></span> 人&nbsp;&nbsp;&nbsp;当前已加 <span class="f_b"><?php echo $limit_used;?></span> 人&nbsp;&nbsp;&nbsp;还可以加 <span class="f_b f_blue"><?php echo $limit_free;?></span> 人</div>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('friend');m('s3');</script>
<?php } ?>
<?php if($action=='add' || $action=='edit') { ?>
<script type="text/javascript">
function check() {
if(Dd('truename').value.length < 2) {
Dmsg('请填写姓名', 'truename');
return false;
}
return true;
}
</script>
<?php } ?>
<?php include template('footer', 'member');?>