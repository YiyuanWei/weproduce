<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<style type="text/css">
.qrcode {height:200px;background:#F2F2F2;text-align:center;padding:20px 0;display:none;}
.qrcode div {line-height:24px;font-size:12px;color:#666666;}
.shares {height:120px;text-align:center;}
.shares li {width:200px;float:left;padding:16px 0;cursor:pointer;}
.shares li:hover {background:#F2F2F2;}
.shares img {border-radius:16px;width:80px;height:80px;}
.shares span {display:block;font-size:14px;padding-top:16px;}
</style>
<div class="m">
<div class="nav bd-b"><span class="f_r"><a href="<?php echo $linkurl;?>" class="b">取消分享</a></span><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MODULE[$mid]['linkurl'];?>"><?php echo $MODULE[$mid]['name'];?></a> <i>&gt;</i> <a href="<?php echo $linkurl;?>"><?php echo $title;?></a> <i>&gt;</i> 分享好友</div>
<div class="b20"></div>
</div>
<div class="m">
<div class="qrcode">
<img src="<?php echo DT_PATH;?>api/qrcode.png.php?auth=<?php echo $auth;?>" width="140" height="140"/>
<div></div>
</div>
<div class="shares">
<ul>
<li onclick="$('.qrcode').hide();$('.qrcode div').html('请用微信扫一扫上面的二维码打开网址<br/>点右上方的分享按钮，选择发送给朋友');$('.qrcode').slideDown('fast');"><img src="<?php echo DT_STATIC;?>file/image/share-wx.png"/><span>微信好友</span></li>
<li onclick="$('.qrcode').hide();$('.qrcode div').html('请用微信扫一扫上面的二维码打开网址<br/>点右上方的分享按钮，选择分享到朋友圈');$('.qrcode').slideDown('fast');"><img src="<?php echo DT_STATIC;?>file/image/share-py.png"/><span>微信朋友圈</span></li>
<li onclick="$('.qrcode').hide();"><a href="http://connect.qq.com/widget/shareqq/index.html?url=<?php echo urlencode($linkurl);?>&title=<?php echo urlencode($title);?>&desc=<?php echo urlencode('我在'.$DT['sitename'].'看到的');?>" target="_blank" rel="external"><img src="<?php echo DT_STATIC;?>file/image/share-qq.png"/><span>QQ好友</span></a></li>
<li onclick="$('.qrcode').hide();"><a href="https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php echo urlencode($linkurl);?>&title=<?php echo urlencode($title);?>&desc=<?php echo urlencode('我在'.$DT['sitename'].'看到的');?>" target="_blank" rel="external"><img src="<?php echo DT_STATIC;?>file/image/share-qzone.png"/><span>QQ空间</span></a></li>
<li onclick="$('.qrcode').hide();"><a href="http://service.weibo.com/share/share.php?title=<?php echo urlencode($title);?>&url=<?php echo urlencode($linkurl);?>&pic=<?php echo urlencode($pic);?>" target="_blank" rel="external"><img src="<?php echo DT_STATIC;?>file/image/share-weibo.png"/><span>新浪微博</span></a></li>
</ul>
</div>
</div>
<?php include template('footer');?>