<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<script>
    var banner = document.createElement('div');
    banner.setAttribute('style','grid-area: banner; z-index: 1; width: 100%; place-self: stretch; place-items: center; display: grid; grid-template-columns: auto; grid-template-rows: auto;');
    var img = new Image();
    img.src = '<?php echo DT_SKIN;?>image/banner.jpg';
    img.style = "grid-area: 1 / 1 / 2 / 2; width:100%; place-self:stretch;";
    banner.append(img);
    var title = document.createElement('div');
    title.setAttribute('style','text-align: center; grid-area: 1 / 1 / 2 / 2; place-self: center;')
    var h1 = document.createElement('h1');
    h1.setAttribute('style','font-size: 4rem; color: white;font-weight: normal;');
    h1.textContent = "Experience WeProduce";
    title.append(h1);
    var p = document.createElement('p');
    p.setAttribute('style',"font-family: 'Dancing Script', sans-serif; font-size: 1.5rem; color: white; font-weight: normal;");
    p.textContent = "Your Online One-Step Manufacturing Service Provider";
    title.append(p);
    banner.append(title);
    $("#banner").append(banner);
</script>
<style>
  #about{
    max-width: 100%;
  }
  #aboutus{
    text-align: center;
    padding : 0 5%;
    display: grid;
  }
  #aboutus p{
    word-break: keep-all;
  }
  #aboutus .btn:hover{
    background: var(--background-color);
    color: white;
  }
  #aboutus p{
    padding: .5rem;
    line-height: 1.5rem;
  }
</style>
<div id="about" class="wrapper">
  <div style="padding: 5% 8%; display: grid; grid-template-columns: 50% 50%; grid-template-rows: auto;">
    <img src="<?php echo DT_SKIN;?>image/about.jpg" style="grid-area:1 / 1 / 2 / 2; place-self: stretch;max-width: 100%;">
    <div id="aboutus" style="grid-area: 1 / 2 / 2 / 2; background-color: white;">
      <div style="align-self: center;">
        <p style="margin: 0 auto auto; font-size: 2rem;">About Us</p>
        <p>WeProduce is a platform to connect designers worldwide with over 3000 factories in Asia, covering fabric, button, zipper, graphic printing, garment manufactory.</p>
        <div class="btn" onclick="location.href='<?php echo DT_PATH;?>about'" style="margin:auto auto;border-color: var(--background-color);">Learn More</div>
      </div>
    </div>
  </div>
</div>
<?php $steps=array('Request','Quote','Produce','Shipment')?>
<style>
  #steps{
    display:grid;
    grid-template-columns: <?php if(is_array($steps)) { foreach($steps as $i) { ?> auto <?php } } ?>;
    height: 10rem;
  }
  #steps:hover{
    padding: 0 2px;
  }
  #steps .step{
    padding: 2rem 3rem 1rem;
    color: var(--background-color);
  }
  #steps .h2{
    font-family: Arial, Helvetica, sans-serif;
    font-weight: lighter;
    font-size: 1.2rem;
  }
  #steps .p{
    font-family: var(--we-font);
    font-style: italic;
    font-size: 1rem;
  }
</style>
<div id="steps" class="clickable" onclick="Go('<?php echo DT_PATH;?>request')">
    <?php if(is_array($steps)) { foreach($steps as $i => $step) { ?>
    <div class="step">
      <span class="fa-stack">
        <span class="fa fa-circle-thin fa-stack-2x"></span>
        <span class="fa-stack-1x" style="font-family: var(--we-font);"><?php echo $i+1;?></span>
      </span>
      <p class="h2">Step <?php echo $i+1;?></p>
      <p class="p"><?php echo $step;?></p>
    </div>
    <?php } } ?>
  </div>
</div>
<style>
  #mall{
    height: auto;
    padding-top: 3rem;
    padding-bottom: 2rem;
    display: grid;
    grid-template-columns: 5% auto 5%;
    grid-template-rows: auto auto;
    grid-template-areas: "prev prodcuts next" ". more .";
  }
  #mall .btn{
    border: none;
    grid-area: more;
    justify-self: center;
    font-family: 'Times New Roman', Times, serif;
    font-style: italic;
    font-size: 1rem;
    padding: .5rem 1rem;
    color: var(--background-color);
  }
  #mall .btn:hover{
    background-color: var(--background-color);
    color: white;
  }
  .products{
    margin-bottom: 1rem;
    padding: 0 0.5%;
    display: grid;
    grid-template-rows: auto;
    grid-template-columns: 16.5% 16.5% 16.5% 16.5% 16.5% 16.5%;
  }
  .product{
    width: 90%;
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
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: lighter;
    font-size: 1rem;
    line-height: 1.2rem;
    margin: .5rem 0;
  }
  .product p{
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 1rem;
    line-height: 1.2rem;
    margin: .5rem 0;
  }
  .trigger{
    text-align: center;
    position: absolute;
    transition: .2s ease;
    bottom: 0;
    height: 0;
    left: 0;
    right: 0;
    width: 100%;
    overflow: hidden;
  }
  .trigger .wrapper{
    opacity: 0.5;
    font-size: 1.2rem;
    font-family: 'Dancing Script';
    font-style: italic;
    padding: 3% 0;
    height: 100%;
    color: white;
  }
  .product:hover .trigger{
    height: 20%;
  }
  .hide{
    display: none;
  }
  .show{
    display: block;
  }
  .prev, .next{
    cursor: pointer;
    width: auto;
    padding: 1rem;
    margin: auto;
    margin-top: 100%;
    display: block;
    border-radius: 50%;
    color: white;
    font-weight: bold;
    font-size: 1.5rem;
  }
  .prev{
    grid-area: prev;
    margin-right: -.2rem;
  }
  .next{
    grid-area: next;
    margin-left: -.2rem;
  }
  .prev:hover, .next:hover{
    opacity: .1;
    background: white;
    color: var(--background-color);
  }
</style>
<?php $mid = 16;?>
<?php $tags=tag("moduleid=$mid&condition=status=3&areaid=$cityid&order=addtime desc&lazy=$lazy&pagesize=18&template=null");?>
<div id="mall" class="wrapper">
  <div class="prev" onclick="show(-1)">&#10094;</div>
  <div class="products">
    <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
    <div class="product clickable hide" id="product-<?php echo $i;?>" onclick="showproduct('<?php echo $t['itemid'];?>')">
      <div style="position: relative;">
        <img src="<?php echo $t['thumb'];?>" alt="">
        <!-- <div class="trigger"><div class="wrapper" onclick="quickview('<?php echo $t['itemid'];?>','<?php echo $t['title'];?>','<?php echo $t['price'];?>','<?php echo $t['thumb'];?>','<?php echo $t['thumb1'];?>','<?php echo $t['thumb2'];?>')" onmouseover="qv(true)" onmouseout="qv(false)">Quick View</div></div> -->
      </div>
      <br>
      <h3><?php echo $t['title'];?></h3>
      <div class="break"></div>
      <p>$<?php echo $t['price'];?></p>
    </div>
    <?php } } ?>
  </div>
  <div class="next" onclick="show(1)">&#10095;</div>
  <div class="btn" style="grid-area: more;" onclick="location.href='<?php echo $MODULE['16']['linkurl'];?>'">Show More</div>
</div>
<?php include template('quickview','mall');?>
<script>
  var products = document.getElementsByClassName('products')[0].getElementsByClassName('product'); // products is a list 
  var now = 1;
  const max_products = products.length > 18 ? 18 : products.length;
  const max_page = Math.ceil(max_products/6);
  function show(num){
    now+=num;
    if(now<1) now = max_page;
    else if(now>max_page) now = 1;
    var max = now*6;
    var min = max-6;
    for( var i = 0 ; i < max_products; i++ ){
      if( min <= i && i < max ){
        products[i].classList.remove('hide');
        products[i].classList.add('show');
      }
      else{
        products[i].classList.remove('show');
        products[i].classList.add('hide');
      }
    }
  }
</script>
<script>
  $(document).ready(function(){
    show(0);
  });
</script>
<script>
  var onquickview = false;
    function qv(bool){
        onquickview = bool;
    }
    function showproduct(id){
        if(!onquickview) location.href= '<?php echo $MODULE['16']['linkurl'];?>show.php?itemid='+id;
    }
</script>
<?php include template('footer');?>