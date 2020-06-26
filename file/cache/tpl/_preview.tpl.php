<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<style>
.center{left: 50%; transform: translate(-50%); position:relative;}
h1{font-size: 3rem; text-align: center;}
button{cursor: pointer; display: inline-block; border: 2px black solid; font-size: 2rem; text-decoration: none; text-align: center; padding: 5px 10px; max-width: 12rem; min-width: 10rem; background-color: white;}
button:hover{ padding:4px 9px; cursor: pointer; background-color: lightgreen; text-decoration: none; border-radius: 15px; border-color: lightgreen; color: lightslategrey;}
p{font-size:1.5rem; text-align: left;}
</style>
<?php if($_GET['sample']=='yes') { ?>
<div class="center" id="yes">
    <p>
        Please send your sample to the following address and <br> upload your tracking number in <a href="<?php echo $MODULE['2']['linkurl'];?>"><strong><i>My Orders</i></strong></a>. <br><br>
        ROOM 807 NO.1 WEST TOWER, <br> NO.115 ZHANGCHA YI ROAD, <br> FOSHAN, GUANGDONG, CHINA
</p>
</div>
<div class="center">
<button class="center" onclick="location.href='../index.php'">OK</button>
</div>
<?php } else if($_GET['sample']=='no') { ?>
<form class="center" id="no" action="?" method="GET">
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
<div class="opts center">
<button class='center' type="submit" name="sample" value="yes" onclick="sending_sample('yes')">Yes</button>
<br><br>
<button class='center' type="submit" name="sample" value="no" onclick="sending_sample('no')">No</button>
</div>
</form>
<?php $sample=$_GET['sample'];?>
<?php } ?>
<script>
    function sending_sample(id){
        show_block(id);
        var id2 = (id == 'yes') ? 'no' : 'yes';
hide_block(id2);
hide_block('sending_sample_q');
    }
    function show_block(id){
        var show = document.getElementById(id).style.display;
        show = (show == 'none') ? 'block' : 'none';
        document.getElementById(id).style.display=show;
    }
function hide_block(id){
document.getElementById(id).style.display="none";
}
</script>
</body>
</html>