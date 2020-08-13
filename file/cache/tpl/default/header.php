<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('head');?>
<style>
   .clickable{
      cursor: pointer;
   }
   .clickable:hover{
      opacity: .8;
   }
   a:hover{
      color: var(--we-red)
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
      margin: 0 .5rem;
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
      display: block;
      width: 400px;
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
      width: fit-content; 
      border: 1px solid white; 
      background-color: white;
      margin: 0 auto;
      z-index: 100; 
      grid-row-start: 2; 
      justify-self: end;
   }
   #usermenu li{
      color : var(--background-color);
      padding: .5rem;
      font-weight: 100;
   }
   #usermenu li:hover{
      color: var(--background-color);
   }
   #usermenu *{
      font-size: 1rem; 
      font-family: Arial;
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
   .active, #usermenu .active{
      color: var(--we-red);
   }
   .inactive{
      color: var(--background-color);
   }
.we_f1, .we_f1_0{color: var(--background-color);font-size: 1rem;font-family: var(--we-font);}
.we_f1_2{color: var(--background-color);font-size: 1.2rem;font-family: var(--we-font);}
.we_f1_5{color: var(--background-color);font-size: 1.5rem;font-family: var(--we-font);}
.we_f2, .we_f2_0.we_f1_5{color: var(--background-color);font-size: 2rem;font-family: var(--we-font);}
.f_i{font-style: italic;}
.f_un{text-decoration: underline;}
</style>
</head>
<body>
   <div id="banner" class="wrapper" >
      <div id="head" style="padding-top: 1rem;">
         
         <!----------用户区块----------------->
         <div id="user-menu">
            <div id="user-panel">
               <div id='user-info' class="clickable" onclick="if(get_cookie('auth')) $('#usermenu').toggle()">
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
                     <a href="<?php echo $MODULE['2']['linkurl'];?>order.php" class="clickable"><li class="inactive" id="my-order">My Orders</li></a>
                     <!-- <li class="inactive" id="my-request">My Requests</li> -->
                     <a href="<?php echo $MODULE['2']['linkurl'];?>address.php" class="clickable"><li class="inactive" id="my-address">My Addresses</li></a>
                     <!-- <li class="inactive" id="my-wallet">My Wallet</li> -->
                     <a href="<?php echo $MODULE['2']['linkurl'];?>account.php"><li class="inactive" id="my-account">My Account</li></a>
                     <!-- <li class="inactive" id="my-message">My Messages</li> -->
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
               <a class="clickable" href="<?php echo $MODULE['2']['linkurl'];?>cart.php?mid=16" id="menu-cart"><li>My Cart</li></a>
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
   if(get_cookie('auth')){
      $('#showsub').css('display','block');
      $('#menu-cart').css('display','block');
   }
   else{
      $('#showsub').css('display','none');
      $('#menu-cart').css('display','none');
   }
})
</script>