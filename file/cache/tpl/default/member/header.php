<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template(header);?>
<style>
    #main{
        margin-top: 5rem;
        margin-bottom: 5rem;
        width: 1080px;
        margin: auto;
        display: grid;
        grid-template-columns: 35% 65%;
        grid-template-rows: 4rem auto;
        grid-template-areas: ". title" "side main";
    }
    #side{
        grid-area: side;
        padding-right: 2rem;
        height: fit-content;
        display: grid;
        grid-template-rows: auto auto;
        grid-template-areas: "avatar" "menu";
    }
    #side-avatar{
        grid-area: avatar;
        border: 1px darkgrey solid;
        margin: 1rem auto;
        border-bottom: none;
        position: relative;
        height: 300px;
        width: 300px;
    }
    #side-menu{
        grid-area: menu;
        border: 1px darkgrey solid;
        margin: 1rem auto;
        width: 300px;
    }
    #side-menu ul{
        margin: 0 2rem;
    }
    #side-menu li{
        margin: .5rem 1rem;
        font-family: var(--we-font);
        font-size: 1.5rem;
        cursor: pointer;
    }
    #side-menu li.inactive{
        color: var(--background-color);
    }
    #side-menu li:hover{
        opacity: .8;
    }
    #side-menu .break{
        grid-area: 2 / 1 / 3 / 2;
        border-color: var(--background-color);
    }
    #main-area{
        grid-area: main;
    }
    #member-title{
        grid-area: title;
    }
    #member-title h1{
        color: var(--background-color);
        font-family: Arial, Helvetica, sans-serif;
        font-weight: lighter;
        font-size: 2.5rem;
    }
    .main-area .show{
        display: block;
    }
    .main-area .hide{
        display: none;
    }
    .tt p{
        color: var(--background-color);
        font-family: var(--we-font);
        font-size: 1.5rem;
    }
    .tt .block{
        border: 1px solid var(--background-color);
        border-width: 1px 0;
    }
    .tt .break{
        border-color: var(--background-color);
border-radius: 0; border-width: 1px 0 0 0;
    }
.tt table{
width: 100%;
}
.tt td, .tt th, .tt input{
font-size: 1.2rem;
font-family: var(--we-font);
color: var(--background-color);
font-weight: normal;
}
.tt input{
padding: 8px 1rem;
width: calc(100% - 2rem);
border-width: 1px;
}
.tt input[type=submit]{
width: 100%;
background-color: var(--we-red);
border: none;
color: white;
}
</style>
<div class="b32"></div>
<div id="main">
    <div id="member-title">
        <h1></h1>
    </div>
    <div id="side">
        <iframe src="<?php echo $MOD['linkurl'];?>avatar.php" frameborder="0" id="side-avatar"></iframe>
        <div id="side-menu">
            <ul>
                <a href="<?php echo $MOD['linkurl'];?>order.php"><li class="inactive" id="order">My Orders</li></a>
                <a href="<?php echo $MOD['linkurl'];?>request.php"><li class="inactive" id="request">My Requests</li></a>
                <a href="<?php echo $MOD['linkurl'];?>address.php"><li class="inactive" id="address">My Addresses</li></a>
                <!-- <li class="inactive" id="wallet">My Wallet</li> -->
                <a href="<?php echo $MOD['linkurl'];?>account.php"><li class="inactive" id="account">My Account</li></a>
                <a href="<?php echo $MOD['linkurl'];?>status.php"><li class="inactive" id="status">Requests Status</li></a>
                <!-- <a href="<?php echo $MOD['linkurl'];?>message.php"></a><li class="inactive" id="message">My Messages</li>
                <li class="inactive" id="password">Reset Password</li> -->
                <div class="b5"></div>
                <div class="break"></div>
                <div class="b5"></div>
                <li>Log Out</li>
            </ul>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            var inacts = Dd("side-menu").getElementsByClassName("inactive");
            for( var inact in inacts ){
                inacts[inact].setAttribute("onclick","page('"+inacts[inact].id+"')");
            }
        })
        function page(token){
            var activeid = Dd('side-menu').getElementsByClassName("active")[0];
            if( activeid != undefined ){
                inactivate('#'+activeid.id);
                inactivate("#my-"+activeid.id);   
            }
            activate('#'+token);
            activate('#my-'+token);
            Dd("member-title").getElementsByTagName("h1")[0].innerHTML = Dd(token).innerHTML;
        }
        function activate(id){
            $(id).addClass("active");
            $(id).removeClass("inactive");
        }
        function inactivate(id){
            $(id).addClass("inactive");
            $(id).removeClass("active");
        }
    </script>
    <div id="main-area">