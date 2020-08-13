<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template(log_reg_header, member);?>
<style>
    #term_read{left: 0;}
</style>
<div class="overlay">
    <div class="b32"></div>
    <div class="ma w50 mt30p h34">
        <div class="ma w50 padd_2r" style="box-shadow: 1px 1px 10px grey;">
            <img src="<?php echo DT_SKIN;?>image/logo.gif">
            <p style="font-weight: bolder; font-size: large;">Create your WeProduce Account</p>
            <form action="?" id="register_form" class="ma wf" method="POST" onsubmit="return checkValue('',1);">
                <input type="hidden" name="post[regid]" value="5">
                <input type="hidden" name="action" value="mail">
                <input type="hidden" name="sid" value="<?php echo $_sid;?>">
                <table>
                    <tr><td><input type="hidden" name="regid" value="5"></td></tr>
                    <tr><td><input type="text" name="post[username]" id="username" placeholder="Account Name" class="padd_10" required onchange="checkValue('username')"></td></tr>
                    <tr><td><span id="dusername" class="f_red"></span></td></tr>
                    <tr><td><input type="text" id="email" class="padd_10" name="post[email]" placeholder="Email Address" onchange="checkValue('email')"></td></tr>
                    <tr><td><span id="demail" class="f_red"></span></td></tr>
                    <tr><td><input type="password" class="padd_10" id="password" name="post[password]" placeholder="Password" required onchange="checkValue('password')"></td></tr>
                    <tr><td><span id="dpassword" class="f_red"></span></td></tr>
                    <tr><td><input type="password" class="padd_10" id="password_confirm" placeholder="Confirm Password" required onchange="checkValue('password_confirm')" name="post[cpassword]"></td></tr>
                    <tr><td><span id="dpassword_confirm" class="f_red"></span></td></tr>
                    <tr><td><div class="b10"></div></td></tr>
                    <tr><td class="fsize_10"><input class="clickable" type="checkbox" id="agree" name="agree" required>By clicking Create Account, you acknowledge you have read and agreed to our <a style="text-decoration: underline;" href="?action=read">Terms of Use & Privacy Policy</a>.</td></tr>
                    <tr><td><span id="dagree" class="f_red"></span></td></tr>
                    <tr><td><input type="submit" id="reg_btn" name="submit" value="Create Account" class="clickable padd_10 fsize_15 submit"></td></tr>
                    <tr><td><div class="b10"></div></td></tr>
                    <tr><td style="font-size: 12px;">Already have an account?</td></tr>
                    <tr><td><div class="clickable padd_10 fsize_15 go" id="login_btn" onclick="Go(MEPath+'login.php')">Sign In</div></td></tr>
                </table>
            </form>
        </div>
    </div>
<div id="back" class="clickable" onclick="Go('<?php echo DT_PATH;?>')">&#x2715;</div>
</div>
<script>
    function checkValue(id,i){
        if( id != undefined ){
            var ele = $('#'+id);
            var value = $('#'+id).val();
        }
        switch (id) {
            case 'username':
                if(value == ''){
                    Dmsg("Please enter a username.",id);
                    return false;
                }
                if(i == 1 && value.indexOf(' ') > 0 ){
                    console.log("test");
                    var con = window.confirm("Your username contains a white space.\nWould you like to use "+value.replace(' ', '')+" as your username?");
                    if( con ){
                        Dd(id).value = value.replace(" ",'');
                    }
                    return false;
                }
                break;
            case 'email':
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,6})+$/;
                if(!regex.test(value) || value == '' ){
                    Dmsg("Please enter a valid Email Address.",id);
                    return false;
                }
                break;
            case 'password':
                if(value == ''){
                    Dmsg('Please enter your Password.',id);
                    return false;
                }
                break;
            case 'password_confirm':
                if(value == ''){
                    Dmsg('Please confirm your Password.',id);
                    return false;
                }
                if(value !== $('#password').val()){
                    Dmsg("Passwords do not match.",id);
                    return false;
                }
                break;
            case 'agree':
                if(!ele[0].checked){
                    Dmsg('Please read and agree to the Terms.',id);
                    return false;
                }
                break;
            default:
                var username = checkValue('username',i);
                var email = checkValue('email');
                var password = checkValue('password'); 
                var confirm = checkValue('password_confirm');
                var agree = checkValue('agree');
                return username && email && password && confirm && agree;
        }
    }
    function init(){
        $('#username').val("Yiyuan Wei");
        $('#email').val('yiyuan.wei@outlook.com');
        $('#password').val('ds123456');
        $('#password_confirm').val('ds123456');
        $('#agree').prop('checked',true);
    }
</script>