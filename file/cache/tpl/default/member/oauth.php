<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<?php if($action=='bind') { ?>
<div style="text-align:center;">
<img src="<?php if($U['avatar']) { ?><?php echo $U['avatar'];?><?php } else { ?><?php echo DT_PATH;?>api/oauth/avatar.png<?php } ?>
" width="50" style="margin:30px 0 10px 0;border-radius:50%;"/>
<div style="color:#005590;"><?php echo $U['nickname'];?></div>
<div style="padding:20px 0;color:#999999;">只差一步，绑定后就可以用<a href="<?php echo DT_PATH;?>api/oauth/<?php echo $U['site'];?>/connect.php" class="b"><?php echo $OAUTH[$U['site']]['name'];?></a>自动登录<a href="<?php echo DT_PATH;?>" class="b"><?php echo $DT['sitename'];?></a>了</div>
<div style="padding:20px 0;"><input type="button" value=" 已是会员，请登录自动绑定 " class="btn_b" style="width:200px;" onclick="Go('<?php echo $DT['file_login'];?>');"/></div>
<div><input type="button" value=" 不是会员，请注册自动绑定 " class="btn_g" style="width:200px;" onclick="Go('<?php echo $DT['file_register'];?>');"/></div>
<div style="padding:20px 0;"><a href="<?php echo $DT['file_login'];?>" class="b" onclick="return confirm('确定要取消本次绑定吗？');">取消绑定</a></div>
</div>
<script type="text/javascript">Dh('side');Dh('side_oh');</script>
<?php } else { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab_on" id="action"><a href="?action=index"><span>一键登录</span></a></td>
</tr>
</table>
</div>
<div class="bd">
<table cellpadding="10" cellspacing="0" class="tb">
<tr>
<th width="70">头像</th>
<th>昵称</th>
<th width="130">绑定时间</th>
<th width="130">上次登录</th>
<th>登录次数</th>
<th>平台</th>
<th width="120">操作</th>
</tr>
<?php if(is_array($OAUTH)) { foreach($OAUTH as $k => $v) { ?>
<?php if($v['enable']) { ?>
<tr align="center">
<?php if(isset($lists[$k])) { ?>
<td><?php if($lists[$k]['url']) { ?><a href="<?php echo $lists[$k]['url'];?>" target="_blank"><?php } ?>
<img src="<?php if($lists[$k]['avatar']) { ?><?php echo $lists[$k]['avatar'];?><?php } else { ?><?php echo DT_PATH;?>api/oauth/avatar.png<?php } ?>
" width="50" style="margin:10px;"/><?php if($lists[$k]['url']) { ?></a><?php } ?>
</td>
<td><?php if($lists[$k]['url']) { ?><a href="<?php echo $lists[$k]['url'];?>" target="_blank" class="b"><?php } ?>
<?php echo $lists[$k]['nickname'];?><?php if($lists[$k]['url']) { ?></a><?php } ?>
</td>
<td><?php echo $lists[$k]['adddate'];?></td>
<td><?php echo $lists[$k]['logindate'];?></td>
<td><?php echo $lists[$k]['logintimes'];?></td>
<td height="30"><?php echo $v['name'];?></td>
<td><img src="<?php echo DT_PATH;?>api/oauth/<?php echo $k;?>/ico.png" align="absmiddle"/> <a href="?action=delete&itemid=<?php echo $lists[$k]['itemid'];?>" class="b" onclick="return confirm('确定要解除绑定吗？');">解除绑定</a></td>
<?php } else { ?>
<td>-</td>
<td>-</td>
<td>未绑定</td>
<td>-</td>
<td>-</td>
<td height="30"><?php echo $v['name'];?></td>
<td><img src="<?php echo DT_PATH;?>api/oauth/<?php echo $k;?>/ico.png" align="absmiddle"/> <a href="<?php echo DT_PATH;?>api/oauth/<?php echo $k;?>/connect.php" class="b">立即绑定</a></td>
<?php } ?>
</tr>
<?php } ?>
<?php } } ?>
</table>
</div>
<?php } ?>
<script type="text/javascript">s('oauth');</script>
<?php include template('footer', 'member');?>