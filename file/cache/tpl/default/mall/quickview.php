<?php defined('IN_DESTOON') or exit('Access Denied');?><style>
    .overlay-layer{
        background-color: blanchedalmond;
        opacity: .5;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 2;
        visibility: hidden;
    }
    .quickview{
        opacity: 1;
        grid-template-columns: 55% 45%;
        grid-template-rows: auto;
        grid-template-areas: "image info";
        width: 60%;
        height: auto;
        padding: 1rem;
        margin: 3% 20% auto;
        position: fixed;
        top: 0;
        z-index: 2;
        display: none;
    }
    .quickview-panel{
        margin: .5rem;
        color: rgba(255, 255, 255, .5);
    }
    .quickview-panel #mid_div{
        width: 100%;
        border: none;
        padding: 0;
        height: auto;
        cursor: auto;
    }
    .quickview-panel #mid_pic{
        width: 100%;
    }
    .ImageSlider img{
        width: 4rem;
        height: 4rem;
        position: relative;
        cursor: pointer;
    }
    .ImageSlider .ab_on{
        border-color: var(--background);
        background: var(--background-color);
    }
    .ImageSlider .ab_im{
        border-color: var(--background-color);
        background: var(--background-color);
    }
    #title{
        font-size: 2rem;
        color: white;
        font-family: 'Dancing Script', serif;
    }
    #price{
        color: white;
        font-size: 1rem;
        font-family: 'Dancing Script', serif;
    }
    #price a{
        color: rgba(255, 255, 255, .5);
        text-decoration: underline;
        font-family: 'Dancing Script';
    }
    .quickview-form{
        margin: 1rem 0;
        line-height: 200%;
    }
    .quickview-form *{
        margin: 1rem 0;
    }
    .quickview-form input{
        margin-top: 0;
        line-height: 2rem;
    }
    .quickview-form label{
        font-size: 1rem;
        font-family: 'Dancing Script', serif;
    }
    .f_optional{
        font-size: .8rem;
        font-family: 'Dancing Script', serif;
    }
    .quickview-form textarea{
        padding: .5rem .5rem;
        word-break: break-all;
        resize: none;
        margin: 0 0;
    }
    .quickview-form input[type="number"]{
        padding: 0 .5rem;
        width: 5rem;
    }
    .quickview-form button{
        font-family: 'Dancing Script', serif;
        background-color: rgb(206, 157, 75);
        width: 100%;
        border: 0rem;
        font-size: 1.5rem;
        padding: 1rem 0;
    }
    .quickview-form button:hover{
        opacity: .5;
        cursor: pointer;
    }
    .text_len{
        font-family: 'Dancing Script', serif;
        font-size: 1rem;
        color: gray;
        padding: .5rem 1rem;
        margin: 0 0;
    }
</style>
<div class="overlay-layer"></div>
<div id='quickview' class="quickview wrapper">
    <div class="quickview-panel" style="grid-area: image;">
        <div id="mid_div" onclick="PAlbum(Dd('mid_pic'));">
            <img src="" id="mid_pic">
        </div>
        <br>
        <div class="ImageSlider">
        </div>
    </div>
    <div class="quickview-panel" style="grid-area: info; padding-left: 1rem;">
        <div id="title"></div>
        <br>
        <div id="price"></div>
        <form style="margin-top: 0;" method="post" class="quickview-form" action="?">
            <div style="display: grid; grid-template-columns: auto auto; grid-template-rows: auto auto auto; margin-top: 0;">
            <!-- <label style="grid-area: 1 / 1 / 1 / 3;"for="bulk">Bulk Order <span class="f_optional">(Optional)</span></label>
            <textarea style="grid-area: 2 / 1 / 4 / 3;" name="bulk" id="bulk" style="width: 100%;" maxlength="100" autocomplete="off" onkeyup="count(this)"></textarea> -->
            <span style="grid-area: 3 / 2 / 4 / 3;justify-self: end;" class="text_len">100</span>
            </div>
            <label for="a">Quantity</label><br>
            <input type="number" name="a" id="a" value="1" onchange="changeA()" onfocus="this.value=''" onblur="setA()" min="1"><br>
            <button type="submit" name="submit" value="cart">ADD TO CART</button>
        </form>
    </div>
    <div>
        <span class="clickable" style="position: absolute; right: 1rem; top: 1rem; color: lightgrey;" onclick="closeQuickView()">&#10006;</span>
    </div>
</div>
<script type="text/javascript">
    function quickview(id,title,price,thumb1,thumb2,thumb3){
        document.getElementsByClassName('overlay-layer')[0].style.visibility = 'visible';
        document.getElementsByClassName('overlay-layer')[0].setAttribute('onclick','closeQuickView()');
        var thumbs = new Array(thumb1,thumb2,thumb3);
        thumbs = thumbs.map(element => 
            element = (element == '') ? "<?php echo DT_SKIN;?>image/nopic60.gif" : element 
        );
        mid_pic.src = thumb1.substring(0,thumb1.lastIndexOf("thumb"));
        for( var i = 0; i < thumbs.length; i++ ){
            var img = document.createElement("IMG");
            img.src = thumbs[i];
            img.width = 60;
            img.height = 60;
            var n = thumbs[i].lastIndexOf("thumb");
            if( n != -1 ) thumbs[i] = thumbs[i].substring(0,n) + thumbs[i].slice(n).replace("thumb","middle");
            img.setAttribute('onclick',"if(this.src.indexOf('nopic60.gif')==-1) Album("+i+", '"+thumbs[i]+"');");
            img.className = (i == 0) ? 'ab_on' : 'ab_im';
            img.id = "t_"+i;
            document.getElementsByClassName('ImageSlider')[0].append(img);
        }
        Dd('title').innerHTML = title;
        Dd('price').innerHTML = "<span>$</span><?php echo $t['price'];?>  <a href="+'<?php echo $MODULE['16']['linkurl'];?>'+"show.php?itemid="+id+">View Full Detail</a>";
        count(Dd('bulk'));
        $('#quickview').css('display','grid');
    }
    function count(textarea){
        var max = 100;
        var c = textarea.value.length;
        var span = textarea.parentNode.getElementsByTagName("SPAN")[1];
        span.innerHTML = max-c;
    }
    function closeQuickView(){
        document.getElementsByClassName('overlay-layer')[0].style.visibility = 'hidden';
        document.getElementsByClassName('overlay-layer')[0].setAttribute('onclick','');
        mid_pic.src = '';
        document.getElementsByClassName('ImageSlider')[0].innerHTML = '';
        Dd('bulk').value = '';
        Dd('a').value = 1;
        Dd('quickview').style.display = 'none';
    }
var a;
function changeA(){
a = Dd('a').value;
}
function setA(){
Dd('a').value = a;
}
</script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/album.js"></script>