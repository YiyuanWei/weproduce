<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<style>
/* style for sending sample and choosing types */
.center{
left: 50%; 
transform: translate(-50%); 
position:relative;
}
h1{
font-size: 3vw; 
text-align: center;
font-family: Arial, Helvetica, sans-serif;
color: white;
font-weight: 300;
}
h2{
font-size: 1vw;
text-align: center;
font-family: cursive;
color: white;
font-weight: 200;
opacity: .5;
}
h2 strong{
color: white;
}
button{
cursor: pointer; 
display: inline-block; 
border: 2px rgb(18, 43, 92) solid;
font-size: 2vw; 
text-decoration: none; 
text-align: center; 
padding: 5px 10px;
width: 10rem;
background-color: white;
transition: ease .1s;
font-family: Arial, Helvetica, sans-serif;
font-weight: 100;
color: rgb(18, 43, 92);
}
button:hover{
cursor: pointer;
background-color: rgba(255, 255, 255,.5);
text-decoration: none;
color: white;
}
</style>
<div class="wrapper">
<img src="<?php echo DT_SKIN;?>image/banner.jpg" alt="" class="center" style="max-width: 70%;">
</div>
<div class="wrapper center" style="padding: 2rem 0;">
<?php if($_GET['sample']=='yes') { ?>
<div class="center" id="yes" style="margin: auto;">
<h2>
Please send your sample to the following address and <br> upload your tracking number in <a href="<?php echo $MODULE['2']['linkurl'];?>"><strong><i>My Orders</i></strong></a>. <br><br>
ROOM 807 NO.1 WEST TOWER, <br> NO.115 ZHANGCHA YI ROAD, <br> FOSHAN, GUANGDONG, CHINA
</h2>
</div>
<div class="center">
<button class="center" onclick="location.href='<?php echo DT_PATH;?>'">OK</button>
</div>
<?php } else if($_GET['sample']=='no') { ?>
<form class="center" id="no" action="request.php" method="GET">
<h1>Choose Your Product</h1>
<div class="opts center">
<button type="submit" name="type" value="garment" class="center">Garmnet</button>
<br><br>
<button type="submit" name="type" value="fabric" class="center">Fabric</button>
</div>
</from>
<?php } else { ?>
<form id="sending_sample_q" class="request_wrapper center" action="?" method="GET">
<h1>Sample available to send?</h1>
<h2>please choose 'Yes' if there is sample available to send</h2>
<br>
<ul>
<li><button class='center' type="submit" name="sample" value="yes">Yes</button></li>
<br>
<li><button class='center' type="submit" name="sample" value="no">No</button></li>
</ul>
</form>
<?php $sample=$_GET['sample'];?>
<?php } ?>
</div>
<?php include template('footer');?>