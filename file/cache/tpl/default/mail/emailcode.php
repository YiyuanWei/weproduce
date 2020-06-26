<?php defined('IN_DESTOON') or exit('Access Denied');?><table cellpadding="0" cellspacing="0" width="700" align="center">
<tr>
<td><a href="<?php echo DT_PATH;?>" target="_blank"><img src="<?php if($DT['logo']) { ?><?php echo $DT['logo'];?><?php } else { ?><?php echo DT_SKIN;?>image/logo.gif<?php } ?>
" style="margin:10px 0;border:none;" alt="<?php echo $DT['sitename'];?> LOGO" title="<?php echo $DT['sitename'];?>"/></a></td>
</tr>
<tr>
<td style="border-top:solid 1px #DDDDDD;border-bottom:solid 1px #DDDDDD;padding:10px 0;line-height:200%;font-family:'Microsoft YaHei',Verdana,Arial;font-size:14px;color:#333333;">
<strong>尊敬的会员</strong>：<br/>
您在<?php echo $DT['sitename'];?>请求的邮件验证码为 <strong style="color:#FF1100;"><?php echo $emailcode;?></strong> (有效期<?php echo $MOD['auth_days'];?>0分钟)<br/>请使用此验证码继续操作，切勿透露给他人。
</td>
</tr>
<tr>
<td style="line-height:22px;padding:10px 0;font-family:'Microsoft YaHei',Verdana,Arial;font-size:12px;color:#666666;">
请注意：此邮件系 <a href="<?php echo DT_PATH;?>" target="_blank" style="color:#005590;"><?php echo $DT['sitename'];?></a> 自动发送，请勿直接回复。如果此邮件不是您请求的，请忽略并删除
</td>
</tr>
</table>