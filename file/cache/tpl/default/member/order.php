<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<script>page('order');</script>
<script type="text/javascript">var errimg = '<?php echo DT_SKIN;?>image/nopic60.gif';</script>
<?php if($action == 'update') { ?>
<?php if($step == 'detail') { ?>
<?php if(!in_array($td['status'], array(8, 9))) { ?>
<table cellpadding="0" cellspacing="0" align="center">
<tr align="center" class="f_gray">
<td>Payment Pending</td>
<td id="pay_n">Processing</td>
<td>Shipped</td>
<?php if($td['status'] == 5 || $td['status'] == 6) { ?>
<td>Request Refund</td>
<td>Refund Received</td>
<?php } else { ?>
<td>Delivered</td>
<?php } ?>
</tr>
<tr height="60">
<td><img src="image/state_2.gif" id="state_1"/></td>
<td id="pay_s"><img src="image/state_1.gif" id="state_2"/></td>
<td><img src="image/state_1.gif" id="state_3"/></td>
<td><img src="image/state_1.gif" id="state_4"/></td>
<?php if($td['status'] == 5 || $td['status'] == 6) { ?>
<td><img src="image/state_1.gif" id="state_5"/></td>
<?php } ?>
</tr>
</table>
<script type="text/javascript">
var s1 = Dd('state_2').src;
var s2 = Dd('state_1').src;
function Dstate(n) {
for(var i = 2; i <= n; i++) {
Dd('state_'+i).src = s2;
}
}
<?php if($td['status'] == 2) { ?>
Dstate(2);
<?php } else if($td['status'] == 3) { ?>
Dstate(3);
<?php } else if($td['status'] == 4) { ?>
Dstate(4);
<?php } else if($td['status'] == 5) { ?>
Dstate(4);
<?php } else if($td['status'] == 6) { ?>
Dstate(5);
<?php } else if($td['status'] == 7) { ?>
<?php if($td['send_time']) { ?>Dstate(3);<?php } ?>
<?php } ?>
<?php if($td['status'] == 5 || $td['status'] == 6) { ?>
<?php if(!$td['send_time']) { ?>Dd('state_3').src = s1;<?php } ?>
<?php } ?>
<?php if($td['cod']) { ?>Dh('pay_n');Dh('pay_s');<?php } ?>
</script>
<?php } ?>
<?php include template('goods', 'chip');?>
<div class="t2">Express Information</div>
<table cellspacing="1" cellpadding="10" class="tb">
<tr>
<td class="tl">Postcode</td>
<td class="tr"><?php echo $td['buyer_postcode'];?></td>
</tr>
<tr>
<td class="tl">Address</td>
<td class="tr"><?php echo $td['buyer_address'];?></td>
</tr>
<tr>
<td class="tl">Name</td>
<td class="tr"><?php echo $td['buyer_name'];?></td>
</tr>
<tr>
<td class="tl">Mobile</td>
<td class="tr"><?php echo $td['buyer_mobile'];?></td>
</tr>
<?php if($td['send_time']) { ?>
<tr>
<td class="tl">Shipping Date</td>
<td class="tr"><?php echo $td['send_time'];?></td>
</tr>
<tr>
<td class="tl">Delivery Type</td>
<td class="tr"><?php echo $td['send_type'];?></td>
</tr>
<tr>
<td class="tl">Tracking No.</td>
<td class="tr"><?php echo $td['send_no'];?><?php if($td['send_type'] && $td['send_no']) { ?> &nbsp;<a href="###" class="t" onclick="Ds('express_t');$('#express').load(AJPath+'?action=express&moduleid=2&auth=<?php echo $auth;?>');">[Track the Order]</a><?php } ?>
</td>
</tr>
<tr id="express_t" style="display:none;">
<td class="tl">Result</td>
<td class="tr" style="line-height:200%;"><div id="express"><img src="image/loading.gif" align="absmiddle"/> Processing...</div></td>
</tr>
<tr>
<td class="tl">Delivery Status</td>
<td class="tr"><?php echo $_send_status[$td['send_status']];?></td>
</tr>
<?php } ?>
</table>
<div class="t2">ORder Details</div>
<table cellspacing="1" cellpadding="10" class="tb">
<tr>
<td class="tl">Contact with Seller</td>
<td class="tr"><?php if($DT['im_web']) { ?><?php echo im_web($td['seller']);?>&nbsp;<?php } ?>
<a href="message.php?action=send&touser=<?php echo $td['seller'];?>"><img src="image/ico_message.gif" title="Sending mail" align="absmiddle"/></a> <a href="<?php echo userurl($td['seller'], 'file=contact');?>" target="_blank" class="t"><?php echo $td['seller'];?></a></td>
</tr>
<tr>
<td class="tl">Order Time</td>
<td class="tr"><?php echo $td['adddate'];?></td>
</tr>
<tr>
<td class="tl">Last Update</td>
<td class="tr"><?php echo $td['updatedate'];?></td>
</tr>
<?php if($td['send_time']) { ?>
<tr>
<td class="tl">Shipping Time</td>
<td class="tr"><?php echo $td['send_time'];?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">Order status</td>
<td class="tr"><?php echo $_status[$td['status']];?></td>
</tr>
<?php if($td['buyer_reason']) { ?>
<tr>
<td class="tl">Refund Reason</td>
<td class="tr"><?php echo $td['buyer_reason'];?></td>
</tr>
<?php } ?>
<?php if($td['refund_reason']) { ?>
<tr>
<td class="tl">Refund Reason</td>
<td class="tr"><?php echo $td['refund_reason'];?></td>
</tr>
<?php } ?>
<tr>
<td class="tl"> </td>
<td class="tr">
<?php if($td['status'] == 1) { ?>
<input type="button" value=" CheckOut " class="btn_g" onclick="Go('?itemid=<?php echo $td['itemid'];?>&action=update&step=pay');"/> &nbsp; 
<?php } ?>
<input type="button" value=" Back " class="btn" onclick="history.back(-1);"/>
</td>
</tr>
</table>
<script type="text/javascript">s('order');m('action');</script>
<?php } else if($step == 'express') { ?>
<?php include template('goods', 'chip');?>
<div class="t2">Delivery Information</div>
<table cellspacing="1" cellpadding="10" class="tb">
<tr>
<td class="tl">Shipping Time</td>
<td class="tr"><?php echo $td['send_time'];?></td>
</tr>
<tr>
<td class="tl">Delivery Type</td>
<td class="tr"><?php echo $td['send_type'];?></td>
</tr>
<tr>
<td class="tl">Tracking No.</td>
<td class="tr"><?php echo $td['send_no'];?></td>
</tr>
<tr>
<td class="tl">Result</td>
<td class="tr" style="line-height:200%;"><div id="express"><img src="image/loading.gif" align="absmiddle"/> Processing...</div></td>
</tr>
<tr>
<td class="tl">Delivery Status</td>
<td class="tr"><?php echo $_send_status[$td['send_status']];?></td>
</tr>
<tr>
<td class="tl"> </td>
<td class="tr"><input type="button" value=" Back " class="btn" onclick="history.back(-1);"/>
</td>
</tr>
</table>
<script type="text/javascript">
$(function(){
$('#express').load(AJPath+'?action=express&moduleid=2&auth=<?php echo $auth;?>');
});
</script>
<script type="text/javascript">s('order');m('action_express');</script>
<?php } else if($step == 'pay') { ?>
<form method="post" action="?" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="<?php echo $step;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<?php include template('goods', 'chip');?>
<style>
.tb .tl{
width: 120px;
font-family: var(--we-font);
color: var(--background-color);
}
.tb .tr .clickable{
width: 100px;
padding: 5px 1rem;
background-color: var(--we-red);
color: white;
font-family: var(--we-font);
font-size: 1rem;
border: none;
}
.tb .tr .clickable:hover{
opacity: .8;
}
</style>
<div class="we_f1">Order Payment</div>
<table cellspacing="1" cellpadding="10" class="tb">
<tr>
<td class="tl" valign="top">Order Time</td>
<td class="tr"><?php echo $td['adddate'];?></td>
</tr>
<tr>
<td class="tl" valign="top">Price</td>
<td class="tr f_red"><?php echo $DT['money_sign'];?><?php echo number_format($money, 2, '.', '');?></td>
</tr>
<tr id="mymoney" style="display:none;">
<td class="tl" valign="top">Account</td>
<td class="tr f_blue"><?php echo $DT['money_sign'];?><?php echo $_money;?></td>
</tr>
<tr id="payword" style="display:none;">
<td class="tl" valign="top"><span class="f_red">*</span> Payment Password</td>
<td class="tr"><?php include template('password', 'chip');?>&nbsp;<span id="dpassword" class="f_red"></span></td>
</tr>
<tr id="paytype" style="display:none;">
<td class="tl" valign="top"><span class="f_red"></span>Payment method</td>
<td class="tr">
<table cellspacing="5" cellpadding="5">
<?php $PAYLIST = get_paylist();?>
<input type="hidden" name="bank" id="bank" value="<?php echo $PAYLIST['0']['bank'];?>"/>
<?php if(is_array($PAYLIST)) { foreach($PAYLIST as $k => $v) { ?>
<tr onclick="$('#bank').val($('#paytype :checked').val());">
<td><input type="radio" name="bank" value="<?php echo $v['bank'];?>" id="bank-<?php echo $v['bank'];?>"<?php if($k==0) { ?> checked<?php } ?>
/></td>
<td><label for="bank-<?php echo $v['bank'];?>" class="c_p"><img src="<?php echo DT_PATH;?>api/pay/<?php echo $v['bank'];?>/logo.gif" alt=""/></label></td>
<td><?php if($v['percent']>0) { ?>Surcharge <?php echo $v['percent'];?>%<?php } ?>
</td>
</tr>
<?php } } ?>
</table>
</td>
</tr>
<tr>
<td class="tl" valign="top"> </td>
<td class="tr">
<input type="submit" name="submit" value="CheckOut" class="clickable"/>&nbsp;&nbsp;<input type="button" value=" Back " class="clickable" onclick="history.back(-1);"/>
</td>
</tr>
</table>
</form>
<script type="text/javascript">
var money = <?php echo $money;?>;
function check() {
if(money > <?php echo $_money;?>) {
Go('charge.php?action=pay&reason=trade|<?php echo $itemid;?>&amount='+money+'&bank='+$('#bank').val());
return false;
}
if(money > <?php echo $DT['quick_pay'];?>){
if(Dd('password').value.length < 6) {
Dmsg('Please Enter your Password', 'password');
return false;
}
}
return confirm('Confirming the payment..');
}
window.setInterval(
function() {
if(money > <?php echo $_money;?> || <?php echo $_money;?> < 0.01) {
$('#mymoney').hide();$('#paytype').show();$('#payword').hide();
} else {
$('#mymoney').show();$('#paytype').hide();if(money > <?php echo $DT['quick_pay'];?>){$('#payword').show();}
}
}, 
500);
</script>
<script type="text/javascript">s('order');m('action');</script>
<?php } else if($step == 'refund') { ?>
<form method="post" action="?" onsubmit="return check();" id="dform">
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="<?php echo $step;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<?php include template('goods', 'chip');?>
<div class="t2">Request Refund</div>
<table cellspacing="1" cellpadding="10" class="tb">
<tr>
<td class="tl">Talk to Seller</td>
<td class="tr"><?php if($DT['im_web']) { ?><?php echo im_web($td['seller']);?>&nbsp;<?php } ?>
<a href="<?php echo userurl($td['seller'], 'file=contact');?>" target="_blank" class="t"><?php echo $td['seller'];?></a></td>
</tr>
<tr>
<td class="tl">Order Time</td>
<td class="tr"><?php echo $td['adddate'];?></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> Refund Reason</td>
<td class="tr"><textarea name="content" id="content" class="dsn"></textarea>
<?php echo deditor($moduleid, 'content', 'Simple', '100%', 200);?><br/><span class="f_gray">This application is irreversible</span><span id="dcontent" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> Password</td>
<td class="tr"><?php include template('password', 'chip');?>&nbsp;<span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"> </td>
<td class="tr">
<input type="submit" name="submit" value=" Confirm " class="btn_g"/>&nbsp;&nbsp;<input type="button" value=" Back " class="btn" onclick="history.back(-1);"/>
</td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('password').value.length < 6) {
Dmsg('Please enter your password.', 'password');
return false;
}
return confirm('Confirmation: Is the reason correct, and you are applying for the refund with it?');
}
</script>
<script type="text/javascript">s('order');m('action');</script>
<?php } else if($step == 'comment') { ?>
<form method="post" action="?" onsubmit="return check();" id="dform">
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="<?php echo $step;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<?php include template('goods', 'chip');?>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div class="t2">Comment - <?php echo $v['title'];?></div>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">Rate</td>
<td class="tr">
<input type="radio" name="stars[<?php echo $v['itemid'];?>]" value="3" id="star_<?php echo $v['itemid'];?>_3" checked/><label for="star_<?php echo $v['itemid'];?>_3"> Good <img src="<?php echo DT_STATIC;?>file/image/star3.gif" width="36" height="12" alt="" align="absmiddle"/></label>
<input type="radio" name="stars[<?php echo $v['itemid'];?>]" value="2" id="star_<?php echo $v['itemid'];?>_2"/><label for="star_<?php echo $v['itemid'];?>_2"> Normal <img src="<?php echo DT_STATIC;?>file/image/star2.gif" width="36" height="12" alt="" align="absmiddle"/></label>
<input type="radio" name="stars[<?php echo $v['itemid'];?>]" value="1" id="star_<?php echo $v['itemid'];?>_1"/><label for="star_<?php echo $v['itemid'];?>_1"> Bad <img src="<?php echo DT_STATIC;?>file/image/star1.gif" width="36" height="12" alt="" align="absmiddle"/></label>
</td>
</tr>
<tr>
<td class="tl">Comment</td>
<td class="tr f_gray">
<textarea onkeyup="S(<?php echo $v['itemid'];?>);" name="contents[<?php echo $v['itemid'];?>]" id="content_<?php echo $v['itemid'];?>" style="width:300px;height:60px;margin:0 0 6px 0;"></textarea><br/>
<span style="color:red;" id="chars_<?php echo $v['itemid'];?>">0</span> /500
</td>
</tr>
</table>
<?php } } ?>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"> </td>
<td class="tr">
<input type="submit" name="submit" value=" Confirm " class="btn_g"/>&nbsp;&nbsp;<input type="button" value=" Back " class="btn" onclick="history.back(-1);"/>
</td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
if(Dd('content_<?php echo $v['itemid'];?>').value.length > 500) {
alert('Comment cannot exceed 500.');
return false;
}
<?php } } ?>
return confirm('Confirmation: the rate and comment cannot be changed after the submission.');
}
function S(id) {
Inner('chars_'+id, Dd('content_'+id).value.length);
}
</script>
<script type="text/javascript">s('order');m('action');</script>
<?php } else if($step == 'comment_detail') { ?>
<?php include template('goods', 'chip');?>
<div style="display:none;" id="explain">
<div class="t2">Explanation</div>
<form method="post" action="?" onsubmit="return check();" id="dform">
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="<?php echo $step;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="oid" value="0" id="oid"/>
<table cellspacing="1" cellpadding="10" class="tb">
<tr>
<td class="tl" id="E0"></td>
<td class="tr" id="E1"></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span>Explanation</td>
<td class="tr f_gray">
<textarea onkeyup="S();" name="content" id="content" style="width:300px;height:60px;margin:0 0 6px 0;"></textarea><br/>
<span style="color:red;" id="chars">0</span> /500
</td>
</tr>
<tr>
<td class="tl"> </td>
<td class="tr">
<input type="submit" name="submit" value=" Confrim " class="btn_g"/>&nbsp;&nbsp;<input type="button" value=" Cancel " class="btn" onclick="$('#explain').slideUp(300);"/>
</td>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
function check() {
if(Dd('content').value.length < 2) {
alert('Explanation should more than 2 letters.');
return false;
}
if(Dd('content').value.length > 500) {
alert('Explanation should less than 500 letters.');
return false;
}
return confirm('Confirmation: Explanation cannot be changed once it has been made.');
}
function S() {
Inner('chars', Dd('content').value.length);
}
function E(oid) {
$('#explain').hide();
$("html, body").animate({scrollTop:$('#explain').offset().top}, 200);
$('#E0').html($('#E0_'+oid).html());
$('#E1').html($('#E1_'+oid).html());
$('#oid').val(oid);
$('#explain').slideDown(300);
}
</script>
<script type="text/javascript">s('order');m('action');</script>
<?php } ?>
<?php } else { ?>
<div class="tt">
<p>Check the status of orders or browse through your past purchases.</p>
<div class="b10"></div>
<?php if($db->count($table,"buyer='$_username'")) { ?>
<div>
<style>
.order-nav{
border-collapse: collapse;
}
.order-nav td{
border: none;
}
.order-nav td div{
padding: 5px 15px;
width: fit-content;
color: white;
cursor: pointer;
border: none;
}
.order-nav td div:hover{
opacity: .8;
}
.order-nav td div span{
font-size: large; 
font-weight: bold;
}
</style>
<table class="order-nav" cellspacing="0" cellpadding="0">
<td><div style="background-color: rgb(12, 139, 182);" onclick="Go('?action=index')"><span><?php echo $db->count($table,"buyer='$_username'")?></span><br>ORDER TOTAL</div></td>
<td><div style="background-color: darkblue;" onclick="Go('?nav=4')"><span><?php echo $db->count($table, "buyer='$_username' AND status=4");?></span><br>ORDER COMPLETED</div></td>
<td><div style="background-color: orange;" onclick="Go('?nav=1')"><span><?php echo $db->count($table, "buyer='$_username' AND status=1");?></span><br>ORDER PENDING</div></td>
<td><div style="background-color: lightgreen;" onclick="Go('?nav=3')"><span><?php echo $db->count($table, "buyer='$_username' AND status=3");?></span><br>ORDER SHIPPING</div></td>
<td><div style="background-color: lightgrey;" onclick="Go('?nav=6')"><span><?php echo $db->count($table, "buyer='$_username' AND status=8")?></span><br>ORDER CANCELLED</div></td>
</table>
</div>
<div class="b16"></div>
<?php if($lists) { ?>
<table class="block" cellspacing="0" style="margin: 5px 0;">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<table cellpadding="10" cellspacing="0" class="tb">
<tr bgcolor="#F5F5F5">
<td colspan="7" class="f_gray">
<span class="f_r">
<?php if($v['status'] == 0) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=close" onclick="return confirm('Are you sure about end this deal by denying it?\nThis operation is irreversible.');">Deny</a> | 
<?php } else if($v['status'] == 1) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=pay">CheckOut</a> | 
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=close" onclick="return confirm('Are you sure about end this deal by denying it?\nThis operation is irreversible.');">Deny</a> | 
<?php } else if($v['status'] == 2) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=refund">Request Refund</a> | 
<?php } else if($v['status'] == 3) { ?>
<?php if($v['lefttime']) { ?>
<span class="f_blue" title="The payment will be made automatically after the time end."><img src="<?php echo DT_STATIC;?>file/image/clock.gif" width="12" height="12"/> This order will automatically get paid after <?php echo $v['lefttime'];?> day(s).</span>&nbsp;
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=receive_goods" onclick="return confirm('Making sure the recieved items are wanted.\n\nNOTE:After Confirmation, the system will get payment directly.');">Items Received</a> | 
<?php if($v['send_type'] && $v['send_no']) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=express">Tracking Order</a> | 
<?php } ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=refund">Apply for Refund</a> | 
<?php } else { ?>
<span class="f_red">Timeout</span>&nbsp;
<?php } ?>
<?php } else if($v['status'] == 4) { ?>
<?php if($MODULE[$v['mid']]['module'] == 'mall') { ?>
<?php if($v['seller_star']) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=comment_detail">Comment Details</a> | 
<?php } else { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=comment">Comment</a> | 
<?php } ?>
<?php } ?>
<?php } else if($v['status'] == 9) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=close" onclick="return confirm('Are you sure about end this deal by denying it?\nThis operation is irreversible.');">Deny</a> | 
<?php } ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=detail">Order Details</a>&nbsp;
</span>
<span class="c_p" onclick="Go('?itemid=<?php echo $v['itemid'];?>&action=update&step=detail');">&nbsp; <?php echo $v['addtime'];?> &nbsp; # <?php echo $v['itemid'];?> <span> 
<span class="we_f1" style="margin-left: 14rem;"><?php echo $DT['money_sign'];?> <?php echo $v['money'];?></span>
</td>
</tr>
<tr align="center">
<td width="70"><a href="<?php echo $v['linkurl'];?>}');" target="_blank"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic60.gif<?php } ?>
" width="60" height="60" onerror="this.src=errimg;"/></a></td>
<td align="left" valign="top" class="f_gray lh18" width="180px"><span class="we_f1_2"><?php echo $v['title'];?></span><br/><span class="we_f1" style="font-size: .7rem;"><?php echo $DT['money_sign'];?> <?php echo $v['price'];?></span></td>
<td width="200" align="left" valign="top" style="padding-top: 15px"><?php if($v['note']) { ?> <span class="we_f1">Bulk: <br> <?php echo $v['note'];?></span><?php } ?>
</td>
<td width="30"><?php echo $v['number'];?></td>
<td width="120"><?php echo $DT['money_sign'];?><?php echo $v['price']*$v['number']?></td>
<td></td>
<td></td>
</tr>
<?php if(isset($tags[$v['itemid']])) { ?>
<?php if(is_array($tags[$v['itemid']])) { foreach($tags[$v['itemid']] as $i => $t) { ?>
<tr align="center">
<td width="70"><a href="<?php echo $t['linkurl'];?>}');" target="_blank"><img src="<?php if($t['thumb']) { ?><?php echo $t['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic60.gif<?php } ?>
" width="60" height="60" onerror="this.src=errimg;"/></a></td>
<td align="left" valign="top" class="f_gray lh18" width="180px"><span class="we_f1_2"><?php echo $t['title'];?></span><br/><span class="we_f1" style="font-size: .7rem;"><?php echo $DT['money_sign'];?> <?php echo $t['price'];?></span></td>
<td width="200" align="left" valign="top" style="padding-top: 15px"><?php if($t['note']) { ?> <span class="we_f1">Bulk: <br> <?php echo $t['note'];?></span><?php } ?>
</td>
<td width="30"><?php echo $t['number'];?></td>
<td width="120"><?php echo $DT['money_sign'];?><?php echo $t['price']*$t['number']?></td>
<td></td>
<td></td>
</tr>
<?php } } ?>
<?php } ?>
</table>
<?php } } ?>
</table>
<?php } else { ?>
<div class="block" style="height: 500px; display: flex; place-items: center; justify-content: center;">
<div style="width: fit-content; height: fit-content; text-align: center;">
<?php if($nav==1) { ?>
<p>No orders is waiting for payment.</p>
<?php } else if($nav==3) { ?>
<p>No orders has benn shipped.</p>
<?php } else if($nav==4) { ?>
<p>No orders is finished.</p>
<?php } else if($nav==6) { ?>
<p>No Orders has been cancelled.</p>
<?php } else { ?>
<p>No orders under unknown status.</p>
<a href="<?php echo $MODULE['16']['linkurl'];?>"><p style="text-decoration: underline; font-size: 1rem;">Shop Now</p></a>
<?php } ?>
</div>
</div>
<?php } ?>
<?php } else { ?>
<div class="block" style="height: 500px; display: flex; place-items: center; justify-content: center;">
<div style="width: fit-content; height: fit-content; text-align: center;">
<p>You haven't placed any orders yet.</p>
<a href="<?php echo $MODULE['16']['linkurl'];?>"><p style="text-decoration: underline; font-size: 1rem;">Shop Now</p></a>
</div>
</div>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('order');m('action');</script>
<?php } ?>
<?php include template('footer', 'member');?>