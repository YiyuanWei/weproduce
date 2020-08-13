<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($DT_PC) { ?>
<?php include template('header');?>
<?php } else { ?>
<?php include template('header', 'member');?>
<?php } ?>
<?php if($action == 'show') { ?>
<div class="m">
<div class="cart-msg we_f2"><img src="image/ok.gif" alt="" align="absmiddle"/>  Order Submitted! 
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $forward;?>" class="we_f1 we_i" style="text-decoration: underline;">Click if page does not redirect</a></div>
<meta http-equiv="refresh" content="0;URL=<?php echo $forward;?>"/>
</div>
<?php } else { ?>
<script type="text/javascript">var errimg = '<?php echo DT_SKIN;?>image/nopic50.gif';</script>
<div class="m" style="margin: 8rem auto">
<?php if($lists) { ?>
<form method="post" action="buy.php" onsubmit="return check();">
<input type="hidden" name="submit" value="1"/>
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<table cellpadding="16" cellspacing="0" class="tb">
<style>
.page-title{
color: var(--background-color);
font-size: 2rem;
font-family: 'Dancing Script';
width: 100%;
text-align: left;
padding-bottom: 1rem;
border-bottom: 1px solid var(--background-color);
}
</style>
<caption class="page-title">Items<div class="f_r"><a href="cart.php?mid=<?php echo $mid;?>" class="we_f1 f_i" style="text-decoration: underline;">View Cart</a></div> </caption>
<tr style="visibility: hidden;">
<th width="50"></th>
<th></th>
<th></th>
<th width="60"></th>
<th width="100"></th>
<th width="100"></th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $tags) { ?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<tr align="center" data-key="<?php echo $t['key'];?>">
<td><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" width="100" alt="<?php echo $t['alt'];?>" onerror="this.src=errimg;"/></a></td>
<td align="left" style="line-height:24px;color:#666666;"><span class="we_f2" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></span></td>
<td align="left">
<div style="padding:3px 0 3px 0;"><span class="we_f1">Bulk Order:</span> <br><textarea name="post[<?php echo $t['key'];?>][note]" value="" style="border:#CCCCCC 1px solid; resize: none;width: 50%; height: 65px;" maxlength="200" title="Shorter than 200 letters"></textarea></div>
</td>
<td title="<?php if($t['a2']) { ?><?php echo $t['a1'];?>-<?php echo $t['a2'];?><?php echo $t['unit'];?> <?php echo $DT['money_sign'];?><?php echo $t['p1'];?>&#10;<?php if($t['a3']) { ?><?php echo $t['a2']+1;?>-<?php echo $t['a3'];?><?php echo $t['unit'];?> <?php echo $DT['money_sign'];?><?php echo $t['p2'];?>&#10;Above <?php echo $t['a3'];?><?php echo $t['unit'];?> <?php echo $DT['money_sign'];?><?php echo $t['p3'];?><?php } else { ?>Above <?php echo $t['a2']+1;?><?php echo $t['unit'];?> <?php echo $DT['money_sign'];?><?php echo $t['p2'];?><?php } ?>
<?php } else { ?><?php echo $DT['money_sign'];?><?php echo $t['p1'];?><?php } ?>
"><span class="we_f1_2">$</span><span class="we_f1_2" id="price_<?php echo $t['key'];?>"><?php echo $t['price'];?></span></td>
<td><input type="number" name="post[<?php echo $t['key'];?>][number]" value="<?php echo $t['a'];?>" class="cc_inp" id="number_<?php echo $t['key'];?>" onblur="calculate();" onchange="calculate();"/></td>
<td>
<input type="hidden" name="post[<?php echo $t['key'];?>][express]" value='0'>
<input type="hidden" id="a1_<?php echo $t['key'];?>" value="<?php echo $t['a1'];?>"/>
<input type="hidden" id="a2_<?php echo $t['key'];?>" value="<?php echo $t['a2'];?>"/>
<input type="hidden" id="a3_<?php echo $t['key'];?>" value="<?php echo $t['a3'];?>"/>
<input type="hidden" id="p1_<?php echo $t['key'];?>" value="<?php echo $t['p1'];?>"/>
<input type="hidden" id="p2_<?php echo $t['key'];?>" value="<?php echo $t['p2'];?>"/>
<input type="hidden" id="p3_<?php echo $t['key'];?>" value="<?php echo $t['p3'];?>"/>
<input type="hidden" id="amount_<?php echo $t['key'];?>" value="<?php echo $t['amount'];?>"/>
<input type="hidden" id="fee_start_<?php echo $t['key'];?>_1" value="<?php echo $t['fee_start_1'];?>"/>
<input type="hidden" id="fee_step_<?php echo $t['key'];?>_1" value="<?php echo $t['fee_step_1'];?>"/>
<input type="hidden" id="fee_start_<?php echo $t['key'];?>_2" value="<?php echo $t['fee_start_2'];?>"/>
<input type="hidden" id="fee_step_<?php echo $t['key'];?>_2" value="<?php echo $t['fee_step_2'];?>"/>
<input type="hidden" id="fee_start_<?php echo $t['key'];?>_3" value="<?php echo $t['fee_start_3'];?>"/>
<input type="hidden" id="fee_step_<?php echo $t['key'];?>_3" value="<?php echo $t['fee_step_3'];?>"/>
<span class="we_f1_2">$ </span>
<span class="we_f1_2" id="total_<?php echo $t['key'];?>" total-<?php echo $t['username'];?>="1">0.00</span></td>
</tr>
<?php } } ?>
<?php } } ?>
</table>
<div class="b20"></div>
<table cellpadding="10" cellspacing="0" width="200px" style="margin-right: 2rem; margin-left: auto;">
<tr>
<td class="we_f1_2">Total Price: </td>
<td><span class="we_f1 f_r" id="total_price"></span><span class="we_f1 f_r">$</span></td>
</tr>
</table>
<div class="b20"></div>
<div class="b20"></div>
<table cellpadding="16" cellspacing="0" class="tf">
<caption class="page-title">Address
<div class="f_r">
<a href="<?php echo $MODULE['2']['linkurl'];?>address.php?action=add" class="we_f1_2" target="_blank">New Address</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $MODULE['2']['linkurl'];?>address.php" class="we_f1_2" target="_blank">Addresses</a>
</div>
</caption>
<tr>
<td class="tr"></td>
<td>
<?php if($address) { ?>
<?php if(is_array($address)) { foreach($address as $k => $v) { ?>
<div>
<?php if($k == 0) { ?><?php } ?>
<input type="radio" name="addr" id="addr_<?php echo $k;?>" value="<?php echo $v['areaid'];?>|<?php echo $v['street'];?>|<?php echo $v['postcode'];?>|<?php echo $v['truename'];?>|<?php echo $v['mobile'];?>" onclick="Adr(this.value);"<?php if($k == 0) { ?> checked<?php } ?>
/><label for="addr_<?php echo $k;?>"> <?php echo $v['street'];?> (<?php echo $v['truename'];?>) <?php echo $v['mobile'];?></label></div>
<div class="b10"></div>
<?php } } ?>
<?php } else { ?>
<strong>Currently No Address</strong>
<?php } ?>
</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> Address</td>
<td><input type="text" size="60" name="add[address]" id="address" value="<?php echo $user['street'];?>"/> <span id="dareaid" class="f_red"></span><span id="daddress" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> Post: </td>
<td><input type="text" size="10" name="add[postcode]" id="postcode" value="<?php echo $user['postcode'];?>"/> <span id="dpostcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> Name：</td>
<td><input type="text" size="10" name="add[truename]" id="truename" value="<?php echo $user['truename'];?>"/> <span id="dtruename" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> Mobile：</td>
<td><input type="text" size="20" name="add[mobile]" id="mobile" value="<?php echo $user['mobile'];?>"/> <span id="dmobile" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"> </td>
<td><input type="submit" name="submit" value=" Checkout " class="btn-green"/></td>
</tr>
</table>
</form>
<?php } else { ?>
<div class="cart-msg">No selected items yet, <a href="<?php echo $MOD['linkurl'];?>" class="b">GO</a></div>
<?php } ?>
</div>
<?php } ?>
<?php if(!$_userid) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/guest.js"></script><?php } ?>
<script type="text/javascript">
function check() {
if(Dd('total_amount').innerHTML == '0.00') {
alert('There is no item, please check.');
window.scroll(0, 0);
return false;
}
var l;
var f;
f = 'areaid_1';
if(Dd(f).value == 0) {
Dmsg('Choose the area', 'areaid', 1);
return false;
}
f = 'address';
l = Dd(f).value.length;
if(l == 0) {
Dmsg('Enter the address', f);
return false;
}
f = 'postcode';
l = Dd(f).value.length;
if(l == 0) {
Dmsg('Enter the postcode', f);
return false;
}
f = 'truename';
l = Dd(f).value.length;
if(l == 0) {
Dmsg('Enter your name', f);
return false;
}
f = 'mobile';
l = Dd(f).value.length;
if(l == 0) {
Dmsg('Enter your contact number', f);
return false;
}
return true;
}
function Adr(s) {
var t = s.split('|');
try {
Dd('address').value = t[1];
Dd('postcode').value = t[2];
Dd('truename').value = t[3];
Dd('mobile').value = t[4];
load_area(t[0], 1);
}
catch (e) {}
}
<?php if($address) { ?>Adr(Dd('addr_0').value);<?php } ?>
function alter(i, t) {
if(t == '+') {
var maxa = parseFloat(Dd('amount_'+i).value);
if(maxa && Dd('number_'+i).value >= maxa) return;
Dd('number_'+i).value =  parseInt(Dd('number_'+i).value) + 1;
} else {
var mina = parseFloat(Dd('a1_'+i).value);
if(Dd('number_'+i).value <= mina) return;
Dd('number_'+i).value = parseInt(Dd('number_'+i).value) - 1;
}
calculate();
}
function get_price(i) {
if(Dd('a2_'+i).value > 0) {
if(Dd('a3_'+i).value > 1 && parseInt(Dd('number_'+i).value) > parseInt(Dd('a3_'+i).value)) return Dd('p3_'+i).value;
if(Dd('a2_'+i).value > 1 && parseInt(Dd('number_'+i).value) > parseInt(Dd('a2_'+i).value)) return Dd('p2_'+i).value;
}
return Dd('p1_'+i).value
}
function calculate() {
var _good = 0;
$('[data-key]').each(function() {
var num, good, maxa, mina, price;
var key = $(this).attr('data-key');
num = parseInt(Dd('number_'+key).value);
mina = parseInt(Dd('a1_'+key).value);
if(num < mina) Dd('number_'+key).value = num = mina;
if(isNaN(num) || num < 0) Dd('number_'+key).value = num = mina;
price = parseFloat(get_price(key));
good = price*num;
Dd('total_'+key).innerHTML = good.toFixed(2);
Dd('price_'+key).innerHTML = price.toFixed(2);
_good += 1;
});
var d_c = 0;
var t_a = _good;
$('[data-user]').each(function() {
var user = $(this).attr('data-user');
var t_t = 0;
$('[total-'+user+']').each(function() {
t_t += parseFloat($(this).html());
});
$(this).html(t_t.toFixed(2));
});
$('#total_price').html(_good.toFixed(2));
$('#total_amount').html(t_a.toFixed(2));
}
<?php if($lists) { ?>
$(function(){calculate();});
<?php } ?>
</script>
<?php if($DT_PC) { ?>
<?php include template('footer');?>
<?php } else { ?>
<?php include template('footer', 'member');?>
<?php } ?>