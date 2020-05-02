<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE>
<html>
<head>
<meta charset="<?php echo DT_CHARSET;?>"/>
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?>
<?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $DT['sitename'];?><?php } ?>
<?php } ?>
</title>
<?php if($head_keywords) { ?>
<meta name="keywords" content="<?php echo $head_keywords;?>"/>
<?php } ?>
<?php if($head_description) { ?>
<meta name="description" content="<?php echo $head_description;?>"/>
<?php } ?>
<?php if($head_mobile) { ?>
<meta http-equiv="mobile-agent" content="format=html5;url=<?php echo $head_mobile;?>">
<?php } ?>
<meta name="generator" content="DESTOON B2B - www.destoon.com"/>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DT_STATIC;?>favicon.ico"/>
<link rel="bookmark" type="image/x-icon" href="<?php echo DT_STATIC;?>favicon.ico"/>
<?php if($head_canonical) { ?>
<link rel="canonical" href="<?php echo $head_canonical;?>"/>
<?php } ?>
<?php if($EXT['archiver_enable']) { ?>
<link rel="archives" title="<?php echo $DT['sitename'];?>" href="<?php echo $EXT['archiver_url'];?>"/>
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>style.css"/>
<?php if($moduleid>1) { ?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?><?php echo $module;?>.css"/>
<?php } ?>
<?php if($CSS) { ?>
<?php if(is_array($CSS)) { foreach($CSS as $css) { ?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?><?php echo $css;?>.css"/>
<?php } } ?>
<?php } ?>
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>ie6.css"/>
<![endif]-->
<?php if(!DT_DEBUG) { ?><script type="text/javascript">window.onerror=function(){return true;}</script><?php } ?>
<script type="text/javascript" src="<?php echo DT_STATIC;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
<!--[if lte IE 9]><!-->
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery-1.5.2.min.js"></script>
<!--<![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery-2.1.1.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/page.js"></script>
<?php if($lazy) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery.lazyload.js"></script><?php } ?>
<?php if($JS) { ?>
<?php if(is_array($JS)) { foreach($JS as $js) { ?>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/<?php echo $js;?>.js"></script>
<?php } } ?>
<?php } ?>
<?php $searchid = ($moduleid > 3 && $MODULE[$moduleid]['ismenu'] && !$MODULE[$moduleid]['islink']) ? $moduleid : 5;?>
<script type="text/javascript">
<?php if($head_mobile && $EXT['mobile_goto']) { ?>
GoMobile('<?php echo $head_mobile;?>');
<?php } ?>
var searchid = <?php echo $searchid;?>;
<?php if($itemid && $DT['anticopy']) { ?>
document.oncontextmenu=function(e){return false;};
document.onselectstart=function(e){return false;};
<?php } ?>
</script>
<head>
<style>
.cn_head{width:100%;height:120px;min-width:1280px;}
.cn_head_logo{width:350px;margin-left:5%;float:left;}
.cn_search{width:350px;height:120px;float:left;display:flex;justify-content:center;align-items:center;}
.clean{clear:both;}
.cn_menu{width:100%;height:65px;line-height:65px;background:#0b409c;min-width:1280px;}
.ms{width:1280px;height:65px;margin:0 auto;}
.ms ul{margin-left:200px;}
.ms li{width:130px;float:left;;color:#fff;font-size:16px;letter-spacing:1px;}
.cn_search_s{width:40px;height:40px;background:url('<?php echo DT_SKIN;?>image/search40x40.gif');border:none;cursor:pointer;float:left}
.cn_search_i{width:310px;font-size:16px;height:40px;line-height:40px;color:#43425d;border:none;letter-spacing:1px;outline:none;float:left;}
.cn_user-info {width:500px;height:64px;border-radius:10px;float:right;margin-top:25px;}
.cn_user-info img {width:64px;height:64px;border-radius:50%;float:right;margin-right:20px;}
.cn_user-info ul {float:right;width:200px;margin-top:15px;}
.cn_user-info li {height:40px;line-height:40px;overflow:hidden;float:left;margin-left:10px;}
.cn_user-info strong {font-size:16px;}
.cn_user-info em {font-size:14px;font-style:normal;float:right;margin-left:20px;}
.cn_user-info i {font-style:normal;color:#999999;padding:0 6px;}
.cn_menusub{width:1280px;margin:0 auto;position:relative;display:none}
.cn_im0l {width:160px;height:auto;background:#0F58D7;position:absolute;z-index:999;left:150px;}
.cn_im0l p {height:32px;line-height:32px;padding:0 10px 0 20px;font-size:14px;margin:0;background:#007AFF;color:#FFFFFF;}
.cn_im0l ul {margin:10px 0;}
.cn_im0l i {font-style:normal;font-weight:bold;float:right;color:#DDDDDD;font-family:simsun;}
.cn_im0l strong {font-weight:normal;}
.cn_im0l li {height:32px;line-height:32px;padding:0 10px 0 40px;font-size:14px;overflow:hidden;cursor:pointer;color:#fff;}
.cn_im0l div {z-index:900;position:absolute;width:150px;height:auto;padding:10px 20px;overflow:hidden;background:#3278F1;color:#FFFFFF;display:none;left:0px;}
.cn_im0l dl {margin:0;clear:both;color:#fff;}
.cn_im0l dt {margin:0;padding:0;line-height:31px;font-size:14px;}
.cn_im0l dd {margin:0;padding:0;line-height:32px;font-size:12px;}
.cn_im0l em {font-style:normal;color:#DDDDDD;padding:0 10px;font-family:simsun;}
.cn_im0l li:hover i {color:#FFFFFF;}
.cn_im0l li:hover strong {color:#FFFFFF;}
.cn_im0l li:hover div {display:block;}
.cn_im0l .cate-0 {background:url('image/cate-0.png') no-repeat 10px center;}
.cn_im0l .cate-0:hover {background:#007AFF url('image/cate-0-on.png') no-repeat 10px center;}
.cn_im0l .cate-0:hover div {margin:-42px 0 0 160px;}
.cn_im0l .cate-1 {background:url('image/cate-1.png') no-repeat 10px center;}
.cn_im0l .cate-1:hover {background:#007AFF url('image/cate-1-on.png') no-repeat 10px center;}
.cn_im0l .cate-1:hover div {margin:-74px 0 0 160px;}
.cn_im0l .cate-2 {background:url('image/cate-2.png') no-repeat 10px center;}
.cn_im0l .cate-2:hover {background:#007AFF url('image/cate-2-on.png') no-repeat 10px center;}
.cn_im0l .cate-2:hover div {margin:-106px 0 0 160px;}
.cn_im0l .cate-3 {background:url('image/cate-3.png') no-repeat 10px center;}
.cn_im0l .cate-3:hover {background:#007AFF url('image/cate-3-on.png') no-repeat 10px center;}
.cn_im0l .cate-3:hover div {margin:-138px 0 0 160px;}
.cn_im0l .cate-4 {background:url('image/cate-4.png') no-repeat 10px center;}
.cn_im0l .cate-4:hover {background:#007AFF url('image/cate-4-on.png') no-repeat 10px center;}
.cn_im0l .cate-4:hover div {margin:-170px 0 0 160px;}
.cn_im0l .cate-5 {background:url('image/cate-5.png') no-repeat 10px center;}
.cn_im0l .cate-5:hover {background:#007AFF url('image/cate-5-on.png') no-repeat 10px center;}
.cn_im0l .cate-5:hover div {margin:-202px 0 0 160px;}
.cn_im0l .cate-6 {background:url('image/cate-6.png') no-repeat 10px center;}
.cn_im0l .cate-6:hover {background:#007AFF url('image/cate-6-on.png') no-repeat 10px center;}
.cn_im0l .cate-6:hover div {margin:-234px 0 0 160px;}
.cn_im0l .cate-7 {background:url('image/cate-7.png') no-repeat 10px center;}
.cn_im0l .cate-7:hover {background:#007AFF url('image/cate-7-on.png') no-repeat 10px center;}
.cn_im0l .cate-7:hover div {margin:-266px 0 0 160px;}
.cn_im0l .cate-8 {background:url('image/cate-8.png') no-repeat 10px center;}
.cn_im0l .cate-8:hover {background:#007AFF url('image/cate-8-on.png') no-repeat 10px center;}
.cn_im0l .cate-8:hover div {margin:-298px 0 0 160px;}
.cn_im0l .cate-9 {background:url('image/cate-9.png') no-repeat 10px center;}
.cn_im0l .cate-9:hover {background:#007AFF url('image/cate-9-on.png') no-repeat 10px center;}
.cn_im0l .cate-9:hover div {margin:-330px 0 0 160px;}
.cn_im0l .cate-10 {background:url('image/cate-10.png') no-repeat 10px center;}
.cn_im0l .cate-10:hover {background:#007AFF url('image/cate-10-on.png') no-repeat 10px center;}
.cn_im0l .cate-10:hover div {margin:-362px 0 0 160px;}
.cn_im0l .cate-11 {background:url('image/cate-11.png') no-repeat 10px center;}
.cn_im0l .cate-11:hover {background:#007AFF url('image/cate-11-on.png') no-repeat 10px center;}
.cn_im0l .cate-11:hover div {margin:-394px 0 0 160px;}
.cn_im0l .cate-12 {background:url('image/cate-12.png') no-repeat 10px center;}
.cn_im0l .cate-12:hover {background:#007AFF url('image/cate-12-on.png') no-repeat 10px center;}
.cn_im0l .cate-12:hover div {margin:-426px 0 0 160px;}
.cn_im0l .cate-13 {background:url('image/cate-13.png') no-repeat 10px center;}
.cn_im0l .cate-13:hover {background:#007AFF url('image/cate-13-on.png') no-repeat 10px center;}
.cn_im0l .cate-13:hover div {margin:-458px 0 0 160px;}
.cn_im0l .cate-14 {background:url('image/cate-14.png') no-repeat 10px center;}
.cn_im0l .cate-14:hover {background:#007AFF url('image/cate-14-on.png') no-repeat 10px center;}
.cn_im0l .cate-14:hover div {margin:-490px 0 0 160px;}
.cn_im0l .cate-15 {background:url('image/cate-15.png') no-repeat 10px center;}
.cn_im0l .cate-15:hover {background:#007AFF url('image/cate-15-on.png') no-repeat 10px center;}
.cn_im0l .cate-15:hover div {margin:-522px 0 0 160px;}
</style>
</head>
<body>
<div class="cn_head">
   <!-----------LOGO区块------------------------>
   <!-- <img src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo DT_SKIN;?>image/logo_<?php echo $moduleid;?>.gif<?php } else if($DT['logo']) { ?><?php echo $DT['logo'];?><?php } else { ?><?php echo DT_SKIN;?>image/logo.gif<?php } ?>
" />--->
   <!---上面是取自后台设置的logo,但像素限定了180x60--->
  
   <div class='cn_head_logo'><img src="<?php echo DT_SKIN;?>image/logo250x120.gif"  /></div>
   <!----<?php echo DT_SKIN;?> =  /skin/default/image/  ---->
    <!----------LOGO区块----------------------->
    
    <!----------插索区------------------->
    <div  class='cn_search'>
 
<form id="destoon_search" action="<?php echo $MODULE[$searchid]['linkurl'];?>search.php" onSubmit="return Dsearch(1);">
  <input type="submit" value="" class="cn_search_s" /><input name="kw" id="destoon_kw" type="text" class="cn_search_i" value="<?php if($kw) { ?><?php echo $kw;?><?php } else { ?>Search Categories,Materials,etc<?php } ?>
"  this.value=''; />
</form>
        
    </div>
    <!----------插索区------------------->
    
    
    <!----------用户区块----------------->
       
   
     <div class="cn_user-info" >
   
<script type="text/javascript">
var destoon_uname = get_cookie('username');

document.write('<a href="<?php echo $MODULE['2']['linkurl'];?>avatar.php"><img src="'+DTPath+'api/avatar/show.php?size=large&reload=<?php echo DT_TIME;?>&username='+destoon_uname+'"/></a>');
document.write('<ul style="width:150px">');
if(get_cookie('auth')) {
document.write('<li><em><a href="<?php echo $MODULE['2']['linkurl'];?>logout.php">quit</a></em><a href="<?php echo $MODULE['2']['linkurl'];?>"><strong>'+destoon_uname+'</strong></a></li>');
} else {
if(destoon_uname) {
document.write('<li><em><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_login'];?>">Login</a></em><a href="<?php echo $MODULE['2']['linkurl'];?>"><strong>Hi,'+destoon_uname+'</strong></a></li>');
} else {
document.write('<li><em><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_register'];?>">Register</a></em><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_login'];?>"><strong>请登录</strong></a></li>');
}
}
//document.write('<li></i><a href="<?php echo $MODULE['2']['linkurl'];?>biz.php" class="b">商户后台</a></li>');
document.write('</ul>');

</script>
        
         <ul>
          <a href="<?php echo $MODULE['2']['linkurl'];?>cart.php"  ><li style="background:url(<?php echo DT_SKIN;?>image/car40x40.gif);width:40px;height:40px;margin-left:20px;"></li></a>
          <a href="<?php echo $MODULE['2']['linkurl'];?>order.php"  ><li style="background:url(<?php echo DT_SKIN;?>image/trade40x40.gif);width:40px;height:40px;margin-left:20px;"></li></a>
          <a href="<?php echo $MODULE['2']['linkurl'];?>my.php"  ><li style="background:url(<?php echo DT_SKIN;?>image/info40x40.gif);width:40px;height:40px;margin-left:20px;"></li></a>
        </ul>
        
</div>
      
      
     
   
    <!----------用户区块----------------->
     
   
</div>
<div class="clean"></div>
<div class='cn_menu' >
   <div class="ms">
        <ul>
           <li style="width:auto;">Products </li>
           <li style="width:60px;" id="showsub"><img src="<?php echo DT_SKIN;?>image/more65x30.gif" style="cursor:pointer" /></li>
           <li>Company</li>
           <li>Service</li>
           <li>About</li>
           <li>Contact</li>
           
        </ul>
   
   </div>
 
   
</div>
<div class="cn_menusub">
 <div class="cn_im0l">
<?php $mid = isset($MODULE[16]) ? 16 : 5;?>
<?php $c0 = get_maincat(0, $mid, 1);?>
<ul>
<?php if(is_array($c0)) { foreach($c0 as $k0 => $v0) { ?>
<?php if($k0 < 16 && $v0['child']) { ?>
<?php $_c1 = get_maincat($v0['catid'], $mid, 2);?>
<?php $c1 = get_maincat($v0['catid'], $mid);?>
<li class="cate-<?php echo $k0;?>"><i>></i>
<a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $v0['linkurl'];?>" target="_blank"><strong style="color:#fff"><?php echo $v0['catname'];?></strong></a> 
<div>
<?php if(is_array($c1)) { foreach($c1 as $k1 => $v1) { ?>
<dl>
<dt ><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $v1['linkurl'];?>" target="_blank" ><span style="color:#fff"><?php echo set_style($v1['catname'], $v1['style']);?></span></a></dt>
<?php if($v1['child']) { ?>
<?php $c2 = get_maincat($v1['catid'], $mid);?>
<dd >
<?php if(is_array($c2)) { foreach($c2 as $k2 => $v2) { ?>
<?php if($k2) { ?><em>|</em><?php } ?>
<a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $v2['linkurl'];?>" target="_blank"><?php echo set_style($v2['catname'], $v2['style']);?></a>
<?php } } ?>
</dd>
<?php } ?>
</dl>
<?php } } ?>
</div>
</li>
<?php } ?>
<?php } } ?>
</ul>
</div>
</div>
<script>
$('#showsub').click(function(){
//$('.cn_menusub').css('display','block')
$(".cn_menusub").toggle()
})
</script>
</body>
</html>