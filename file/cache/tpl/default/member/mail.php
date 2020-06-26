<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="my"><a href="?action=index"><span>我的订阅</span></a></td>
<td class="tab" id="list"><a href="?action=list"><span>邮件列表</span></a></td>
</tr>
</table>
</div>
<?php if($action == 'list') { ?>
<div class="ls">
<table cellpadding="10" cellspacing="0" class="tb">
<tr>
<th width="40">&nbsp;</th>
<th>标 题</th>
<th>类 别</th>
<th>添加时间</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr align="center">
<td><img src="image/message_0.gif" width="16" height="16" alt=""/></td>
<td align="left"><a href="?action=show&itemid=<?php echo $v['itemid'];?>" class="t"><?php echo $v['title'];?></a></td>
<td><?php echo $TYPE[$v['typeid']]['typename'];?></td>
<td class="f_gray" title="更新时间 <?php echo $v['editdate'];?>"><?php echo $v['adddate'];?></td>
</tr>
<?php } } ?>
</table>
</div>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('mail');m('list');</script>
<?php } else if($action == 'show') { ?>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">邮件标题</td>
<td class="tr f_b"><?php echo $r['title'];?></td>
</tr>
<tr>
<td class="tl">邮件正文</td>
<td class="tr" style="line-height:180%;padding:10px;font-size:13px;"><?php echo $r['content'];?></td>
</tr>
<tr>
<td class="tl">添加时间</td>
<td class="tr f_gray"><?php echo $r['adddate'];?></td>
</tr>
<tr>
<td class="tl">更新时间</td>
<td class="tr f_gray"><?php echo $r['editdate'];?></td>
</tr>
</table>
<script type="text/javascript">s('mail');m('list');</script>
<?php } else { ?>
<form method="post" action="?">
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">订阅说明</td>
<td class="tr f_gray">
1、选择您感兴趣的分类，点击订阅即可将你的注册邮件添加至订阅列表，系统会定期发送订阅内容至您的邮箱。<br/>
2、取消某个分类先去掉其选中（新增某个分类直接将其选中），然后点击订阅即可更新。<br/>
3、点击退订，系统会取消您所有的订阅，并将您的邮件地址从订阅列表中移除。<br/>
4、订阅分类可能会定期更新，请随时关注。<br/>
5、如果无法正常收到邮件，请将 <span class="f_blue"><?php echo $DT['mail_sender'];?></span> 加入您的邮件白名单。<br/>
</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 商机分类</td>
<td class="tr">
<?php if($TYPE) { ?>
<table cellspacing="2" cellpadding="3" width="100%">
<?php if(is_array($TYPE)) { foreach($TYPE as $k => $v) { ?>
<?php if($k%4==0) { ?><tr><?php } ?>
<td><input type="checkbox" name="typeids[]" value="<?php echo $v['typeid'];?>" id="type_<?php echo $v['typeid'];?>" <?php if(in_array($v['typeid'], $mytypeids)) { ?>checked<?php } ?>
/><label for="type_<?php echo $v['typeid'];?>"> <?php echo $v['typename'];?></label></td>
<?php if($k%4==3) { ?></tr><?php } ?>
<?php } } ?>
</table>
<?php } else { ?>
<span class="f_red">无法完成订阅，系统暂无商机分类</span>
<?php } ?>
</td>
</tr>
<tr>
<td class="tl">邮件地址</td>
<td class="tr"><strong><?php echo $_email;?></strong></td>
</tr>
<?php if($r) { ?>
<tr>
<td class="tl">订阅时间</td>
<td class="tr"><?php echo $addtime;?></td>
</tr>
<tr>
<td class="tl">上次更新</td>
<td class="tr"><?php echo $edittime;?></td>
</tr>
<?php } ?>
<tr>
<td class="tl"> </td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 订 阅 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 退 订 " class="btn" onclick="if(confirm('确定要退订所有订阅吗？')) Go('?action=cancel');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">s('mail');m('my');</script>
<?php } ?>
<?php include template('footer', 'member');?>