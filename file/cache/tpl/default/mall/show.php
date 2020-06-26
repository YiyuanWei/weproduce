<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header','mall');?>
<style>
.m{
width: fit-content;
}
#mid_div{
width: fit-content;
cursor: default;
height: fit-content;
padding: 0;
}
#mid_pic{
width: 800px;
height: 640px;
}
.nav #next:hover, .nav #next:hover{
cursor: default;
}
.nav{
width: 700px;
}
.m table td{
font-family: Arial, Helvetica, sans-serif;
color: var(--background-color);
}
.product-title{
font-size: 24px;
font-weight: 700;
}
.product-price{
font-size: 20px;
}
.content-title{
font-weight: 700;
font-size: 20px;
}
.content-value{
font-size: 16px;
}
</style>
<script type="text/javascript">
var module_id= <?php echo $moduleid;?>,item_id=<?php echo $itemid;?>,content_id='content';
</script>
<div class="main">
<div class="m">
<div class="nav">
<div>
<div id="next" class="<?php if($itemid!=1) { ?>clickable<?php } ?>
">
Next
<i>&#62;</i>
</div>
<div><i>|</i></div>
<div id="prev" class="<?php if(!($last)) { ?>clickable<?php } ?>
">
<i>&#60;</i>
Prev
</div>
</div>
<a href="<?php echo $MODULE['1']['linkurl'];?>">Home</a> <i>></i> 
<a href="<?php echo $MOD['linkurl'];?>">Shop</a> <i>></i> <?php echo cat_pos($CAT, ' <i>></i> ');?>
</div>
<div class="b20 bd-t"></div> 
</div>
<div class="m">
<div id="mid_div" onclick="PAlbum(Dd('mid_pic'));">
<img src="<?php echo $albums['0'];?>" alt="<?php echo $title;?>" id="mid_pic">
</div>
<div class="b10"></div>
<div style="margin: auto; width: fit-content;">
<?php if(is_array($thumbs)) { foreach($thumbs as $k => $v) { ?>
<img src="<?php echo $v;?>" width="60" height="60" onmouseover="if(this.src.indexOf('nopic60.gif')==-1)Album(<?php echo $k;?>, '<?php echo $albums[$k];?>');" class="<?php if($k) { ?>ab_im<?php } else { ?>ab_on<?php } ?>
" id="t_<?php echo $k;?>"/>
<?php } } ?>
</div>
<div class="b20"></div>
<div style="display: grid; grid-template-columns: 60% 40%; grid-template-areas: 'details form';">
<div style="grid-area: details;">
<table>
<tr><td colspan="3" class="product-title"><?php echo $title;?></td></tr>
<?php if(is_array($t)) { foreach($t as $k => $v) { ?>
<tr><td><div class="b20"></div></td></tr>
<tr><td class="content-title"><?php echo $k;?></td></tr>
<tr><td class="content-value"><?php echo $v;?></td></tr>
<?php } } ?>
</table>
</div>


</div>
<table width="100%">
<tr>
<td valign="top">
<tr>
<td width="16"> </td>
<td valign="top">
<?php if($a2) { ?>
<div class="step_price">
<table width="100%" cellpadding="6" cellspacing="0">
<tr>
<td>起批</td>
<td><?php echo $a1;?>-<?php echo $a2;?><?php echo $unit;?></td>
<?php if($a3) { ?>
<td><?php echo $a2+1;?>-<?php echo $a3;?><?php echo $unit;?></td>
<td><?php echo $a3;?><?php echo $unit;?>以上</td>
<?php } else { ?>
<td><?php echo $a2+1;?><?php echo $unit;?>以上</td>
<?php } ?>
</tr>
<tr>
<td>Price</td>
<td class="f_price"><?php echo $DT['money_sign'];?><span class="px14"><?php echo $p1;?></span></td>
<?php if($a3) { ?>
<td class="f_price"><?php echo $DT['money_sign'];?><span class="px14"><?php echo $p2;?></span></td>
<td class="f_price"><?php echo $DT['money_sign'];?><span class="px14"><?php echo $p3;?></span></td>
<?php } else { ?>
<td class="f_price"><?php echo $DT['money_sign'];?><span class="px14"><?php echo $p2;?></span></td>
<?php } ?>
</tr>
</table>
</div>
<?php } ?>
<table width="100%" cellpadding="5" cellspacing="5">
<?php if(!$a2) { ?>
<tr>
<td>Price </td>
<td class="f_price"><?php echo $DT['money_sign'];?><span class="px16"><?php echo $price;?></span></td>
</tr>
<?php } ?>
<?php if($promos) { ?>
<tr>
<td>优惠：</td>
<td class="promos">
<a href="<?php echo $MODULE['2']['linkurl'];?>coupon.php?username=<?php echo $username;?>" target="_blank">
<?php if(is_array($promos)) { foreach($promos as $v) { ?>
<?php if($v['cost']) { ?>
<span>满<?php echo $v['cost'];?>减<?php echo $v['price'];?></span>
<?php } else { ?>
<span><?php echo $v['price'];?><?php echo $DT['money_unit'];?>优惠</span>
<?php } ?>
<?php } } ?>
</a>
</td>
</tr>
<?php } ?>
<?php if($express_name_1 == '包邮') { ?>
<tr>
<td>物流：</td>
<td>
<?php if($fee_start_1>0) { ?>
<?php if($fee_start_2>0) { ?> <?php echo $express_name_2;?>:<?php echo $fee_start_2;?>  <?php } ?>
<?php if($fee_start_3>0) { ?> <?php echo $express_name_3;?>:<?php echo $fee_start_3;?>  <?php } ?>
满<?php echo $fee_start_1;?>包邮
<?php } else { ?>
包邮
<?php } ?>
</td>
</tr>
<?php } else if($fee_start_1>0 || $fee_start_2>0 || $fee_start_3>0) { ?>
<tr>
<td>物流：</td>
<td class="f_gray">
<?php if($fee_start_1>0) { ?> <?php echo $express_name_1;?>:<?php echo $fee_start_1;?>  <?php } ?>
<?php if($fee_start_2>0) { ?> <?php echo $express_name_2;?>:<?php echo $fee_start_2;?>  <?php } ?>
<?php if($fee_start_3>0) { ?> <?php echo $express_name_3;?>:<?php echo $fee_start_3;?>  <?php } ?>
</td>
</tr>
<?php } ?>
<?php if($cod) { ?>
<tr>
<td>到付：</td>
<td>支持货到付款</td>
</tr>
<?php } ?>
<tr>
<td>Brand</td>
<td><?php if($brand) { ?><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?fields=4&kw='.urlencode($brand));?>" target="_blank" class="b"><?php echo $brand;?></a><?php } else { ?>unfilled<?php } ?>
</td>
</tr>
<tr>
<td>Sold </td>
<td><a href="#order" onclick="Mshow('order');" class="b">累计出售 <span class="f_orange"><?php echo $sales;?></span> <?php echo $unit;?></a></td>
</tr>
<tr>
<td>Reviews </td>
<td><a href="#comment" onclick="Mshow('comment');" class="b">已有 <span class="f_orange"><?php echo $comments;?></span> 条评价</a></td>
</tr>
<?php if($MOD['hits']) { ?>
<tr>
<td>人气：</td>
<td>已有 <span class="f_orange"><span id="hits"><?php echo $hits;?></span></span> 人关注</td>
</tr>
<?php } ?>
<tr>
<td width="50">更新：</td>
<td><?php echo $editdate;?></td>
</tr>
<?php if($RL) { ?>
<tr>
<td><?php echo $relate_name;?>：</td>
<td>
<?php if(is_array($RL)) { foreach($RL as $v) { ?>
<div class="relate_<?php if($itemid==$v['itemid']) { ?>2<?php } else { ?>1<?php } ?>
"><?php if($itemid==$v['itemid']) { ?><em></em><?php } ?>
<a href="<?php echo $MOD['linkurl'];?><?php echo $v['linkurl'];?>"><img src="<?php echo $v['thumb'];?>" alt="" title="<?php echo $v['relate_title'];?>"/></a></div>
<?php } } ?>
</td>
</tr>
<?php } ?>
<?php if($P1) { ?>
<tr>
<td><?php echo $n1;?>：</td>
<td id="p1">
<ul>
<?php if(is_array($P1)) { foreach($P1 as $i => $v) { ?>
<li class="nv_<?php if($i==0) { ?>2<?php } else { ?>1<?php } ?>
"><?php echo $v;?></li>
<?php } } ?>
</ul>
</td>
</tr>
<?php } ?>
<?php if($P2) { ?>
<tr>
<td><?php echo $n2;?>：</td>
<td id="p2">
<ul>
<?php if(is_array($P2)) { foreach($P2 as $i => $v) { ?>
<li class="nv_<?php if($i==0) { ?>2<?php } else { ?>1<?php } ?>
"><?php echo $v;?></li>
<?php } } ?>
</ul>
</td>
</tr>
<?php } ?>
<?php if($P3) { ?>
<tr>
<td><?php echo $n3;?>：</td>
<td id="p3">
<ul>
<?php if(is_array($P3)) { foreach($P3 as $i => $v) { ?>
<li class="nv_<?php if($i==0) { ?>2<?php } else { ?>1<?php } ?>
"><?php echo $v;?></li>
<?php } } ?>
</ul>
</td>
</tr>
<?php } ?>
<?php if($amount) { ?>
<?php if($status == 3) { ?>
<tr>
<td>Quantity</td>
<td class="f_gray"><img src="<?php echo DT_SKIN;?>image/arrow_l.gif" width="16" height="8" alt="减少" class="c_p" onclick="Malter('-', <?php echo $a1;?>, <?php echo $amount;?>);"/> <input type="text" value="<?php echo $a1;?>" size="4" class="cc_inp" id="amount" onkeyup="Malter('', <?php echo $a1;?>, <?php echo $amount;?>);"/> <img src="<?php echo DT_SKIN;?>image/arrow_r.gif" width="16" height="8" alt="增加" class="c_p" onclick="Malter('+', <?php echo $a1;?>, <?php echo $amount;?>);"/><?php echo $unit;?> 库存<?php echo $amount;?><?php echo $unit;?></td>
</tr>
<tr>
<td colspan="2">
<img src="<?php echo DT_SKIN;?>image/btn_tobuy.gif" alt="Add to Cart" class="c_p" onclick="BuyNow();"/>
 
<img src="<?php echo DT_SKIN;?>image/btn_addcart.gif" alt="Go For Bulk" class="c_p" onclick="AddCart();"/>
</td>
</tr>
<?php } else { ?>
<tr>
<td></td>
<td><strong class="f_red px14">该商品已下架</strong></td>
</tr>
<?php } ?>
<?php } else { ?>
<tr>
<td></td>
<td><strong class="f_red px14">该商品库存不足</strong></td>
</tr>
<?php } ?>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<div class="m">
<div class="b10"> </div>
</div>
</div>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/album.js"></script>
<?php if($content) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script><?php } ?>
<script type="text/javascript">
var mallurl = '<?php echo $MOD['linkurl'];?>';
var mallmid = <?php echo $moduleid;?>;
var mallid = <?php echo $itemid;?>;
var n_c = <?php echo $comments;?>;
var n_o = <?php echo $orders;?>;
var c_c = Dd('c_comment').innerHTML;
var c_o = Dd('c_order').innerHTML;
var s_s = {'1':0,'2':0,'3':0};
var m_l = {
no_comment:'暂无评论',
no_order:'暂无交易',
no_goods:'商品不存在或已下架',
no_self:'不能添加自己的商品',
lastone:''
};
</script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/mall.js"></script>
<script type="text/javascript">
<?php if($P1) { ?>addE(1);<?php } ?>
<?php if($P2) { ?>addE(2);<?php } ?>
<?php if($P3) { ?>addE(3);<?php } ?>
if(window.location.href.indexOf('#') != -1) {
var t = window.location.href.split('#');
try {Mshow(t[1]);} catch(e) {
console.log('fail');
}
}
</script>
<?php include template('footer');?>