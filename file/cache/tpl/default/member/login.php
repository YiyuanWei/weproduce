<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template(log_reg_header, member);?>
<style>
</style>
<div class="overlay">
<div class="ma w50 mt5r h34">
<div class="ma w50 padd_2r" style=" box-shadow: 1px 1px 10px grey;">
<img src="<?php echo DT_SKIN;?>image/logo.gif">
<p style="font-weight: bolder; font-size: large;">Sign in to your WeProduce Account</p>
<form action="?" id="login_form" class="ma wf" method="POST">
<input type="hidden" name="forward" value="<?php echo $forward;?>">
<table>
<tr><td><input class="padd_10" type="text" name="email" placeholder="Email Address"></td></tr>
<tr><td><div class="b5"></div></td></tr>
<tr><td><input class="padd_10" type="password" name="password" id="password" placeholder="Password"></td></tr>
<!-- <tr><td><div class="clickable href" style="font-size: 10px; float: right;" onclick="forget_password()">Forget Password?</div></td></tr> -->
<tr><td>
<input class="clickable padd_10 fsize_15 submit" id="login_btn" type="submit" name="submit" value="Sign In">
</td></tr>
<tr><td><br></td></tr>
<tr><td style="font-size: 12px;">Don't have an account?</td></tr>
<tr><td>
<div class="clickable padd_10 fsize_15 go" id="reg_btn" onclick="Go(MEPath+'register.php')">Create Account</div>
</td></tr>
</table>
</form>
</div>
</div>
<div id="back" class="clickable" onclick="Go('<?php echo DT_PATH;?>')">&#x2715;</div>
</div>
<script>
</script>