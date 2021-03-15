<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template(header);?>
<?php if($action == 'show') { ?>
<div class="m">
<?php if($code > 0) { ?>
<div class="cart-msg"><img src="image/ok.gif" alt="" align="absmiddle"/>  Item is added to your cart 
<br>
<a href="<?php echo DT_PATH;?>api/redirect.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $code;?>" class="b">Back to Shopping</a>
<br>
<a href="?mid=<?php echo $mid;?>" class="b">View the Cart</a></div>
<?php } else { ?>
<div class="cart-msg">
<img src="image/ko.gif" alt="" align="absmiddle"/>
Failed to add the item
<?php if($code == -1) { ?>
Item has no stock
<?php } else { ?>
Item is no longer available
<?php } ?>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $MOD['linkurl'];?>" class="b">Back to Shopping</a>
</div>
<?php } ?>
</div>
<?php } else { ?>
<script type="text/javascript">var errimg = '<?php echo DT_SKIN;?>image/nopic50.gif';</script>
<style>
#main{
width: 1080px;
margin: 8rem auto;
}
#main input[type=submit]{
border: none;
background-color: #dc4f3e;
width: 100%;
color: white;
font-size: 1.5rem;
font-family: var(--we-font);
padding: 1rem;
}
#main input[type=submit]:hover{
opacity: .8;
}
#order-cart{
grid-area: cart;
width: 95%;
margin: auto;
margin-top: 0;
border-collapse: collapse;
}
#order-cart td{
padding: 2rem 0;
border-bottom: 1px solid var(--background-color);
}
#order-cart td div{
height: 100px;
}
#order-summary{
grid-area: summary;
width: 95%;
margin: auto;
margin-top: 0;
}
.page-title{
color: var(--background-color);
font-size: 2rem;
font-family: 'Dancing Script';
width: 100%;
text-align: left;
padding-bottom: 1rem;
border-bottom: 1px solid var(--background-color);
}
.cart-order{
padding: 2rem 0;
border-bottom: 1px solid var(--background-color);
}
.cart-order input[type=number]{
height: fit-content;
width: 50px;
padding: 1rem .5rem;
}
.cart-order *{
margin-top: 0;
}
.cart-order p{
font-size: 1.5rem;
margin-top: 0;
}
p, span{
font-family: 'Dancing Script';
color: var(--background-color);
}
p.clickable:hover, span.clickable:hover{
color: var(--background-color);
opacity: .8;
}
#summary-main{
padding: 2rem 0;
}
</style>
<div class="m">
<?php if($lists) { ?>
<form id="main" method="post" action="buy.php">
<input type="hidden" name="from" value="cart"/>
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<table id="order-cart" cellspacing="0" class="tb">
<caption class="page-title">My Cart</caption>
<tr>
<th width="120px"></th>
<th width="300px"></th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $tags) { ?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<tr class="cart-order" id="<?php echo $t['key'];?>">
<td>
<input type="hidden" name="cart[]" value="<?php echo $t['key'];?>" data-check="<?php echo $t['username'];?>">
<input type="hidden" id="total_good">
<input type="hidden" id="a1_<?php echo $t['key'];?>" value="<?php echo $t['a1'];?>"/>
<input type="hidden" id="a2_<?php echo $t['key'];?>" value="<?php echo $t['a2'];?>"/>
<input type="hidden" id="a3_<?php echo $t['key'];?>" value="<?php echo $t['a3'];?>"/>
<input type="hidden" id="p1_<?php echo $t['key'];?>" value="<?php echo $t['p1'];?>"/>
<input type="hidden" id="p2_<?php echo $t['key'];?>" value="<?php echo $t['p2'];?>"/>
<input type="hidden" id="p3_<?php echo $t['key'];?>" value="<?php echo $t['p3'];?>"/>
<input type="hidden" id="amount_<?php echo $t['key'];?>" value="<?php echo $t['amount'];?>"/>
<a href="<?php echo $t['linkurl'];?>"><img src="<?php echo $t['thumb'];?>" width="100" alt="<?php echo $t['alt'];?>" onerror="this.src=errimg;"/></a></td>
<td><div>
<p><?php echo $t['title'];?></p>
<p style="font-size: .8rem;">$ <span id="price_<?php echo $t['key'];?>"><?php echo $t['price'];?></span></p>
<?php if($note) { ?>
<p style="font-size: .8rem;">Bulk Order: <?php print_r($t);?></p>
<?php } ?>
</div></td>
<td><div><input type="number" name="amounts[<?php echo $t['key'];?>]" value="<?php echo $t['a'];?>" id="number_<?php echo $t['key'];?>" onblur="calculate();" onchange="calculate();" min="1"/></div></td>
<td><div style="margin: 0 auto;"><p style="font-size: 1.2rem;">$<span id="total_<?php echo $t['key'];?>" total-<?php echo $t['username'];?>="1"><?php echo $t['price'];?></span></p></div></td>
<td><div><span style="justify-self: right;font-size: 1.2rem;height:fit-content" class="clickable" onclick="move('<?php echo $t['key'];?>');">&#x2715;</span></div></td>
</tr>
<?php } } ?>
<?php } } ?>
</table>
<style>
#summary-main{
margin: 1rem auto;
}
#summary-main *:not(.page-title){
font-size: 1.2rem;
font-family: 'Dancing Script';
color: var(--background-color);
}
#summary-main .th{
float: left;
font-weight: normal;
}
#summary-main .td{
float: right;
}
#address{
border-bottom: 1px solid var(--background-color);
padding-bottom: 2rem;
width: 100%;
text-align: left;
}
#address a{
text-decoration: underline;
font-style: italic;
font-size: 1rem;
}
</style>
<div id="order-summary">
<div id="summary-main">
<p class="page-title">Order Summary</p>
<p><span class="th">Subtotal</span><span class="td">$ <span id="total_amount"></span></span></p>
</div>
<input type="submit" value="Place Order" class="clickable">
</div>
</form>
<?php } else { ?>
<div style="margin: 8rem auto; width: 1080px;">
<div class="page-title">My Cart</div>
<div style="width: 100%; height: 500px; border-bottom: 1px solid var(--background-color);">
<style>
</style>
<div style="width: fit-content; height: fit-content; margin:auto; padding-top: 135px;">
<p style="font-size: 2rem">Cart is empty</p>
<a href="<?php echo $MOD['linkurl'];?>"><p class="clickable" style="font-size: 1.4rem; text-decoration: underline;">Continue Shopping</p></a>
</div>
</div>
</div>
<?php } ?>
</div>
<?php } ?>
<script type="text/javascript">
function move(i) {
Dh(i);
calculate();
$.post('?', 'action=delete&mid=<?php echo $mid;?>&ajax=1&key='+i, function(data) {
var cart_num = get_cart();
$('#destoon_cart').html(cart_num > 0 ? '<strong>'+cart_num+'</strong>' : '0');
if(data == 1 && Dd('total_good').value == '0') Go('?mid=<?php echo $mid;?>&rand=<?php echo $DT_TIME;?>');
});
}
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
return Dd('p1_'+i).value;
}
function calculate() {
var _good = _amount = _total = 0;
var items = document.getElementsByClassName("cart-order");
for( var i in items ){
var item = items[i];
var key = item.id;
if( key == undefined ) continue;
if( item.style.display == 'none') continue;
var num, price, good;
num = parseInt(Dd('number_'+key).value);
price = parseInt(Dd('price_'+key).innerHTML);
_total = num*price;
Dd('total_'+key).innerHTML = _total;
_amount += _total;
_good += 1;
}
Dd('total_amount').innerHTML = _amount.toFixed(2);
Dd('total').innerHTML = (_amount + parseInt(Dd('shipping').innerHTML)).toFixed(2);
Dd('total_good').value = _good;
/* $('[data-user]').each(function() {
var user = $(this).attr('data-user');
var tt = 0;
$('[total-'+user+']').each(function() {
tt += parseFloat($(this).html());
});
$(this).html(tt.toFixed(2));
}); */
}
<?php if($lists) { ?>$(function(){calculate();});<?php } ?>
</script>
<?php include template('footer');?>