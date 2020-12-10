<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<script type="text/javascript">var module_id=<?php echo $moduleid;?>,item_id=<?php echo $itemid;?>,content_id='content',img_max_width=<?php echo $MOD['max_width'];?>;</script>
<style>
.m{
width: 1000px;
}
.fn{
color: var(--background-color) 
}
.progress-cir{
width: 1rem;
height: 1rem;
border-radius: 1rem;
z-index: 3;
background-color: white;
border: .25rem solid lightgrey;
color: white;
text-align: center;
cursor: default;
}
.progress-cir.complete{
background-color: green;
border: .25rem solid green;
}
</style>
<div class="m" style="color:var(--background-color); margin-top: 5rem;">
<table width="100%">
<tr>
<td valign="top">
<table width="100%">
<tr>
<td colspan="2"><h1 class="title_trade" id="title" style="color: var(--background-color);"><?php echo $CAT['catname'];?></h1></td>

<?php if($_admin) { ?>
<td width="300" valign="top">
<form action="?itemid=<?php echo $itemid;?>&action=update&step=status&admin=<?php echo $_admin;?>" method="POST">
<input type="hidden" name="email" value="<?php echo $email;?>">
<select name="status" value="<?php echo $status;?>">
<?php if(is_array($L['show_status'])) { foreach($L['show_status'] as $k => $v) { ?>
<option value="<?php echo $k;?>"<?php if($k==$status) { ?> selected<?php } ?>
><?php echo $v;?></option>
<?php } } ?>
</select>
<input type="submit" name="submit" value="Update Status">
</form>
</td>
<?php } ?>
</tr>
<tr>
<?php if($thumbs) { ?>
<td width="330" valign="top">
<div id="mid_pos"></div>
<div id="mid_div" onmouseover="SAlbum();" onmouseout="HAlbum();" onclick="PAlbum(Dd('mid_pic'));">
<img src="<?php echo $thumbs['0'];?>" width="320" height="240" id="mid_pic"/><span id="zoomer"></span>
</div>
<div class="b10"></div>
<div style="display: flex;">
<?php if(is_array($thumbs)) { foreach($thumbs as $k => $v) { ?><img src="<?php echo $v;?>" width="60" height="60" onmouseover="if(this.src.indexOf('nopic60.gif')==-1)Album(<?php echo $k;?>, '<?php echo $thumbs[$k];?>');" class="<?php if($k) { ?>ab_im<?php } else { ?>ab_on<?php } ?>
" id="t_<?php echo $k;?>"/><?php } } ?>
</div>
<div class="b10"></div>
<div onclick="PAlbum(Dd('mid_pic'));" class="c_b t_c c_p"><img src="<?php echo DT_SKIN;?>image/ico_zoom.gif" width="16" height="16" align="absmiddle"/> <span class="fn">Click to Preview</span></div>
</td>
<?php } ?>
<td valign="top">
<div id="big_div" style="display:none;"><img src="" id="big_pic"/></div>
<table width="100%" cellpadding="5" cellspacing="5">
<?php if($n1 && $v1) { ?>
<tr>
<td><?php echo $n1;?>：</td>
<td><?php echo $v1;?></td>
</tr>
<?php } ?>
<?php if($n2 && $v2) { ?>
<tr>
<td><?php echo $n2;?>：</td>
<td><?php echo $v2;?></td>
</tr>
<?php } ?>
<?php if($n3 && $v3) { ?>
<tr>
<td><?php echo $n3;?>：</td>
<td><?php echo $v3;?></td>
</tr>
<?php } ?>
<tr>
<td>Quantity: </td>
<td><?php echo $amount;?></td>
</tr>
<tr>
<td width="150">Last Updated: </td>
<td><?php echo $editdate;?></td>
</tr>
</table>
</td>
<td valign="top" width="330">
<table>
<?php if(is_array($L['show_status'])) { foreach($L['show_status'] as $k => $v) { ?>
<tr>
<td><?php echo $v;?></td>
<td><div class="progress-cir <?php if($k<=$status) { ?>complete<?php } ?>
">&#8730;</div></td>
</tr>
<?php } } ?>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<div class="m" style="margin-bottom: 5rem;">
<style>
.content span{
color: var(--background-color);
}
.content-n{
font-size: 14px;
}
.content-v{
font-size: 12px;
}
</style>
<div class="head-txt"><strong style="color: var(--background-color);">Details</strong></div>
<table class="content c_b" id="content">
<?php if(is_array($content)) { foreach($content as $t => $v) { ?>
<tr><td><span class="content-n"><?php echo $t;?></span></td><td width="50px">: </td><td><span class="content-v"><?php echo $v;?></span></td></tr>
<?php } } ?>
<?php if(is_array($filepath)) { foreach($filepath as $k => $v) { ?>
<?php if($k && $v) { ?>
<tr><td><span class="content-n"><?php echo $k;?></span></td><td width="50px">: </td><td><span onclick="if(Dd('file<?php echo $i?>').value) window.open(Dd('file<?php echo $i?>').value);" class="jt content-v">[View]</span></td></tr>
<?php } ?>
<?php } } ?>
</table>
</div>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/album.js"></script>
<?php if($content) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script><?php } ?>
<?php include template('footer');?>