<?php defined('IN_DESTOON') or exit('Access Denied');?><style>
    .contact{
        padding: 1rem 0;
    }
    .contact li{
        text-align: center;
        padding: 1rem;
        color: white;
        font-size: 1rem;
        font-family: 'Times New Roman', Times, serif;
    }
    #map{
        display: none;
        width:100%;
        height:650px;
        text-align:center;
    }
</style>
<div class="wrapper">
    <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.984115693682!2d144.95150951534347!3d-37.81384104182094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d49325b4501%3A0x9bbef6a27c2d55b!2s4015%2F601%20Little%20Lonsdale%20St%2C%20Melbourne%20VIC%203000!5e0!3m2!1sen!2sau!4v1591685741896!5m2!1sen!2sau" width="900" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <div class="b32"></div>
    <ul class="contact">
        <li>Tel : +61-452-509-529</li>
        <li><a href="https://instagram.com/we.produce?igshid=11sf7okfxqd1h"><img src="<?php echo DT_SKIN;?>image/ins.png" style="width: 2rem;" alt=""></a></li>
    </ul>
</div>
<div class="m">
    <div class="foot">
        <div id="copyright">&copy;2020 by WeProduce<br><?php echo $DT['copyright'];?></div>
        <?php if(DT_DEBUG) { ?><div><?php echo debug();?></div><?php } ?>
        <div id="powered"><a href="https://www.destoon.com/" target="_blank"><img src="<?php echo DT_STATIC;?>file/image/powered.gif" width="136" height="10" alt="Powered By DESTOON"/></a></div>
    </div>
</div>
<script>
    $(document).ready(function(){
        if( showmap != undefined && showmap){
            $('#map').show();
        }
    });
</script>
<div class="back2top"><a href="javascript:void(0);" title="返回顶部">&nbsp;</a></div>
<script type="text/javascript">
<?php if($destoon_task) { ?>
show_task('<?php echo $destoon_task;?>');
<?php } else { ?>
<?php include DT_ROOT.'/api/task.inc.php';?>
<?php } ?>
<?php if($lazy) { ?>$(function(){$("img").lazyload();});<?php } ?>
</script>
</body>
</html>