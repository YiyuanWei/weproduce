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
</style>
<div class="wrapper">
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