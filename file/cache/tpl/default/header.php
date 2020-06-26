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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine|Dancing Script|Great Vibes">
<style>
   :root{
      --background-color: rgb(18, 43, 92);
   }
   .clickable{
      cursor: pointer;
   }
   .clickable:hover{
      color: rgb(220, 79, 62);
   }
   a:hover{
      color: rgb(220, 79, 62);
   }
   #banner{
      display: grid;
      grid-template-columns: auto;
      grid-template-rows: auto;
      grid-template-areas: "banner";
      padding-bottom: 1rem;
   }
   #head {
      margin: 0 5%;
      grid-area: 1 / 1 / 2 / 2;
      display: grid;
      grid-template-columns: auto auto auto;
      grid-template-rows: 4rem 1rem auto;
      grid-template-areas: 
         ". . user"
         "break break break"
         "logo . menu";
      color: white;
      z-index: 2;
      font-size:1rem;
   }
   #head a, #head a:visited, #head a:link{
      color: white;
   }
   #user-menu{
      display: flex;
      grid-area: user;
      justify-self: end;
   }
   #user-panel{
      display: grid;
      grid-template-rows: auto auto;
   }
   #user-info {
      float: right;
      display: flex; 
      margin-top: 1rem; 
      margin-bottom: .5rem;
   }
   #user-info *{
      margin: auto;
   }
   #user-info img{
      width: 2.5rem;
      height: 2.5rem;
      border-radius: 50%;
   }
   #user-info li {
      overflow: hidden;
      float: left;
   }
   #user-info strong {
      font-size: 1rem;
   }
   #user-info em{
      font-size: 1rem;
      font-style: normal;
      float: right;
      padding: 0 0.5rem;
   }
   #user-info i {
      font-style: normal;
      color: #999999;
   }
   #logo{
      grid-area: logo;
      margin-left: 5%;
      margin-top: 1rem;
      float: left;
   }
   #logo img{
      height: 4rem;
   }
   #menu{
      grid-area: menu;
      display: flex;
      justify-self: end;
   }
   #menu li{
      float: right;
      font-size: 1rem;
      margin: 1.5rem .75rem;
   }
   .break{
      grid-area: break;
      margin: auto 0;
      border: .2px solid rgba(255, 255, 255, 0.75);
      border-radius: 100%;
      align-self: start;
   }
   #usermenu{
      width: 9rem; 
      border: 1px solid white; 
      background-color: white;
      margin: 0 auto;
      z-index: 100; 
      grid-row-start: 2; 
      justify-self: end;
   }
   #usermenu li{
      color : black;
   }
   #usermenu *{
      font-size: 1rem; 
      font-family: Arial, Helvetica, sans-serif;
      margin: .5rem;
   }
   #usermenu a{
      margin: 0;
   }
   #usermenu .break{
      margin: .3rem; 
      grid-area: 2 / 1 / 3 / 2;
      border-color: rgba(0, 0, 0, 0.25);
   }
   .wrapper{
      background-color: var(--background-color);
   }
</style>
</head>
<body>
   <div id="banner" class="wrapper">
      <div id="head">
         
         <!----------用户区块----------------->
         <div id="user-menu">
            <div id="user-panel">
               <div id='user-info' class="clickable" onclick="$('#usermenu').toggle()">
                  <script type="text/javascript">
                     var destoon_uname = get_cookie('username');
                     document.write('<img src="'+DTPath+'api/avatar/show.php?size=large&reload=<?php echo DT_TIME;?>&username='+destoon_uname+'"/>');
                     document.write('<ul style="height:fit-content;">');
                     if(get_cookie('auth')) {
                        var string = '<li>';
                        string += '<em>Hello '+destoon_uname+'</em>';
                        string += '</li>';
                        document.write(string);
                     } else {
                        if(destoon_uname) {
                           document.write('<li><em><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_login'];?>">Login</a></em><a href="<?php echo $MODULE['2']['linkurl'];?>"><strong>Hi,'+destoon_uname+'</strong></a></li>');
                        } else {
                           document.write('<li><em><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_login'];?>"><strong>Log In</strong></em></a></li>');
                        }
                     }
                     //document.write('<li></i><a href="<?php echo $MODULE['2']['linkurl'];?>biz.php" class="b">商户后台</a></li>');
                     document.write('</ul>');
                  </script>
                  <span id='showsub' style="display: inline-block;transform: scale(1,.5);font-size: 2rem;">&or;</span>
               </div>
               <div id="usermenu" style="display: none;">
                  <ul>
                     <li>My Orders</li>
                     <li>My Addresses</li>
                     <li>My Wallet</li>
                     <li>My Account</li>
                     <div class="break"></div>
                     <a class="clickable" href="<?php echo $MODULE['2']['linkurl'];?>logout.php"><li>Log Out</li></a>
                  </ul>
               </div>
            </div>
            <ul style="margin-top: 1.2rem;">
               <a href="<?php echo $MODULE['2']['linkurl'];?>cart.php"><li><i class="fa fa-shopping-cart" style="font-size:2.5rem;"></i></li></a>
            </ul>
         </div>
         <!----------用户区块----------------->
         <div class="break"></div>
         <!-----------LOGO区块------------------------>
         <!-- <img src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo DT_SKIN;?>image/logo_<?php echo $moduleid;?>.gif<?php } else if($DT['logo']) { ?><?php echo $DT['logo'];?><?php } else { ?><?php echo DT_SKIN;?>image/logo.gif<?php } ?>
" />--->
         <!---上面是取自后台设置的logo,但像素限定了180x60--->
         <div id='logo'><a href="<?php echo DT_PATH;?>"><img src="<?php echo DT_SKIN;?>image/logo.gif"/></a></div>
         <!----<?php echo DT_SKIN;?> =  /skin/default/image/  ---->
         <!----------LOGO区块----------------------->
         <div id='menu'>
            <ul>
               <li>Past Items</li>
               <a class="clickable" href="<?php echo DT_PATH;?>about"><li>About</li></a>
               <a class="clickable" href="<?php echo $MODULE['16']['linkurl'];?>"><li>Shop</li></a>
               <a class="clickable" href="<?php echo $MODULE['100']['linkurl'];?>"><li>Request</li></a>
               <a class="clickable" href="<?php echo DT_PATH;?>"><li>Home</li></a>
            </ul>
         </div>
         
      </div>
   </div>
   
<script>
$(document).ready(function(){
   if(get_cookie('auth')) $('#showsub').css('display','block')
   else $('#showsub').css('display','none')
})
</script>
</body>
</html>