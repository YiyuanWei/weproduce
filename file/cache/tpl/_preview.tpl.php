<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m m1">
<div class="m1l">
<h1 class="title bd-b"><?php echo $title;?></h1>
<div class="content" id="content"><?php echo $content;?></div>
</div>
<div class="m1r side">
<ul>
<?php $tags=tag("table=webpage&condition=item='$_item'&areaid=$cityid&pagesize=99&order=listorder desc,itemid desc&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<li class="side_li" id="webpage_<?php echo $t['itemid'];?>"><a href="<?php if($t['domain']) { ?><?php echo $t['domain'];?><?php } else { ?><?php echo linkurl($t['linkurl'], 1);?><?php } ?>
"><?php echo $t['title'];?></a></li>
<?php } } ?>
</ul>
</div>
<div class="c_b"></div>
</div>
<script type="text/javascript">$(function(){$('#webpage_<?php echo $itemid;?>').attr('class', 'side_on');});</script>
<?php include template('footer');?>