<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<style>
    :root{
        --background: white;
    }
    .main{
        background-color: var(--background);
    }
    .products{
        margin: 5% 10%;
    }
    .product{
        width: 20%;
        padding: .5rem;
    }
    .product img{
        width: 100%;
        display: block;
        height: auto;
    }
    .product .break{
        border-radius: 0;
        border-bottom-width: 0px;
    }
    .product h3{
        text-align: center;
        color: var(--background-color);
        font-family: Arial, Helvetica, sans-serif;
        font-weight: lighter;
        font-size: 1rem;
        line-height: 1.2rem;
        margin: .5rem 0;
    }
    .product p{
        text-align: center;
        color: var(--background-color);
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1rem;
        line-height: 1.2rem;
        margin: .5rem 0;
    }
    .trigger{
        text-align: center;
        position: absolute;
        transition: .4s ease;
        bottom: 0;
        height: 0;
        left: 0;
        right: 0;
        width: 100%;
        overflow: hidden;
    }
    .trigger .wrapper{
        opacity: 0.5;
        font-size: 1rem;
        font-family: 'Dancing Script';
        font-style: italic;
        height: 100%;
        padding: 7.5% 0;
        line-height: 100%;
        background-color: var(--background);
        color: var(--background-color);
    }
    .product:hover .trigger{
        height: 25%;
    }
    .hide{
        display:none;
    }
    .show{
        display: block;
    }
</style>
<?php $mid=16;?>
<?php $tags=tag("moduleid=$mid&condition=status=3&areaid=$cityid&order=addtime desc&lazy=$lazy&pagesize=".$DT['page_mall']."&template=null");?>
<div class="main">
    <div class="products">
    <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
    <div class="product clickable" id="product-<?php echo $t['itemid'];?>">
      <div style="position: relative;">
        <img src="<?php echo $t['thumb'];?>" alt="">
        <div class="trigger"><div class="wrapper" onclick="quickview(<?php echo $i;?>)">Quick View</div></div>
      </div>
      <h3><?php echo $t['title'];?></h3>
      <p>$<?php echo $t['price'];?></p>
    </div>
    <?php } } ?>
</div>
</div>
<?php include template('quickview','mall');?>
<?php include template('footer');?>