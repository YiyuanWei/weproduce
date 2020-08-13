<?php defined('IN_DESTOON') or exit('Access Denied');?></div>
</div>
<div class="b32"></div>
<div class="b32"></div>
</div>
<style>
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
    <ul class="contact">
        <li>Tel : +61-452-509-529</li>
        <li><a href="https://instagram.com/we.produce?igshid=11sf7okfxqd1h"><img src="<?php echo DT_SKIN;?>image/ins.png" style="width: 2rem;" alt=""></a></li>
    </ul>
</div>
<div class="back2top"><a href="javascript:void(0);" title="Back to Top">&nbsp;</a></div>
<script type="text/javascript">
$(function(){
var h1 = $(window).height(),h2 = $('#main').height();
if(h1 > h2) $('#main').height(h1 - 67);
if(get_local('m_side') == 'Y' && Dd('side_oh').className == 'side_h') {Dh('side');Dd('side_oh').className = 'side_s';}
var destoon_message = <?php echo $_message;?>;
var destoon_chat = <?php echo $_chat;?>;
<?php if($_message && $_sound) { ?>
if(window.location.href.indexOf('message.php') == -1) $('#destoon_space').html(sound('message_<?php echo $_sound;?>'));
<?php } ?>
<?php if($_chat) { ?>
if(window.location.href.indexOf('im.php') == -1) $('#destoon_space').html(sound('chat_new'));
<?php } ?>
<?php if($_message) { ?>
Dnotification('new_message', '<?php echo $MODULE['2']['linkurl'];?>message.php', '<?php echo useravatar($_username, 'large');?>', 'Message (<?php echo $_message;?>)', 'A new message received, click to check.');
<?php } ?>
<?php if($_chat) { ?>
Dnotification('new_chat', '<?php echo $MODULE['2']['linkurl'];?>im.php', '<?php echo useravatar($_username, 'large');?>', 'New Conversation (<?php echo $_chat;?>)', 'New request for conversation，click to engage.');
<?php } ?>
<?php if($_userid && $DT['pushtime']) { ?>
window.setInterval('PushNew()',<?php echo $DT['pushtime'];?>*1000);
<?php } ?>
if($('#mini_profile').length > 0) {
$('#my_profile').mouseover(function(){
$('#mini_profile').show('fast');
$('#my_profile').bind('mouseleave',function(){ 
$('#mini_profile').hide(); 
});
}); 
}
});
</script>
</body>
</html>