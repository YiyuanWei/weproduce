<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
<div class="nav bd-b"><span class="f_r"><a href="javascript:window.close();" class="b">关闭窗口</a></span><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>&gt;</i> 查看大图</div>
<div class="b20"></div>
</div>
<div class="m">
<center><img src="<?php echo $img;?>" onerror="alert('图片不存在');try{window.close();}catch(e){Go(DTPath);}" onload="if(this.width>1180) this.width=1180;" ondblclick="window.close();" oncontextmenu="return false;" onmousewheel="return zoomimg(this);"/></center>
</div>
<script type="text/javascript">
function zoomimg(o) {
  var zoom = parseInt(o.style.zoom, 10) || 100;
  zoom += event.wheelDelta/12;
  if(zoom > 100) zoom = 100;
  if(zoom < 10) zoom = 10;
  o.style.zoom = zoom+'%';
  return false;
}
</script>
<?php include template('footer');?>