<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<style>
.cn_banner{width:100%;height:auto;}
.cn_main{width:1280px;min-width:1280px;height:auto;margin:0 auto;padding-bottom:80px;}
.cn_knitted{width:100%;height:auto;background:#f6f6f6}
.cn_knitted_head{width:355px;height:400px;float:left;}
.cn_knitted_mall{width:925px;height:400px;float:left;}
.pdsdiv{width:290px;height:400px;float:left;background:#fff;box-shadow:0px 0px 5px rgba(0,0,0,0.2);border-radius:6px;margin-left:15px}
.cn_img{max-width:100%}
</style>
<div class="cn_banner">
   <img src="<?php echo DT_SKIN;?>image/banner.jpg" style="max-width:100%;margin-top:10px;" />
</div>
<div class="cn_main" >
    <img src="<?php echo DT_SKIN;?>image/lines1.jpg" style="max-width:100%;margin-bottom:30px;" />
    <div cn_knitted>
        <div class='cn_knitted_head'>
               <img src="<?php echo DT_SKIN;?>image/category1355x400.jpg" class="cn_img" />
        </div>
      
    
    
    <div class="cn_knitted_mall">
<?php $tags=tag("moduleid=$mid&condition=status=3 &areaid=$cityid&order=addtime desc&lazy=$lazy&pagesize=".$DT['page_mall']."&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<div class="pdsdiv">
   <div><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" style="width:250px;margin:20px;" alt=""/></a></div>
       <div style="width:85%;margin:0 auto;font-size:14px;">
     <p><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><span style="color:#999"><?php echo $t['title'];?></span></a></p>
             <b><?php echo $DT['money_sign'];?><?php echo $t['price'];?></b>
              <p style="color:#999">1 Meter(Min.Order)</p>
              </div>
</div>
<?php } } ?>
</div>
 
  </div>
   <div class="clean"></div>
   
     
   
   <div cn_knitted style="margin-top:70px;">
        <div class='cn_knitted_head'>
               <img src="<?php echo DT_SKIN;?>image/category2355x400.jpg" class="cn_img" />
        </div>
      
    
    
    <div class="cn_knitted_mall">
<?php $tags=tag("moduleid=$mid&condition=status=3 &areaid=$cityid&order=addtime desc&lazy=$lazy&pagesize=".$DT['page_mall']."&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<div class="pdsdiv">
   <div><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" style="width:250px;margin:20px;" alt=""/></a></div>
       <div style="width:85%;margin:0 auto;font-size:14px;">
     <p><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><span style="color:#999"><?php echo $t['title'];?></span></a></p>
             <b><?php echo $DT['money_sign'];?><?php echo $t['price'];?></b>
              <p style="color:#999">1 Meter(Min.Order)</p>
              </div>
</div>
<?php } } ?>
</div>
 
  </div>
   <div class="clean"></div>
   
   
   
   
</div>
<!---<?php include template('footer');?>---->