<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('head');?>
<style>
    .clickable{
        cursor: pointer;
    }
    #profile-avatar{
        width: 239px;
        margin: auto;
        margin-top: 1.5rem;
        text-align: center;
        color: var(--background-color);
    }
    #edit-avatar{
        display: none;
    }
    #profile-avatar img{
        border-radius: 50%;
    }
    #profile-menu{
        right: 1.5rem;
        top: 1.5rem;
        width: fit-content;
        color: var(--background-color);
        position: absolute;
    }
    #profile-menu i{
        margin: .5rem;
        font-size: 1rem;
    }
    #profile-menu:hover{
        color: var(--background-color);
    }
    #edit-username{
        border: none;
        border-bottom: 1px solid black;
    }
    .display-username{
        font-family: 'Dancing Script';
        text-align: center;
        font-size: 1.5rem;
        font-weight: normal;
        color: var(--background-color);
    }
</style>
<form action="?" method="post" style="height: fit-content;">
<div id="profile-menu" class="clickable"><i class="fa fa-ellipsis-v" onclick="Go('?action=edit')"></i></div>
<div id="profile-avatar">
    <?php if($action == edit) { ?>
    <div id="edit-profile">
        <label for="edit-avatar" id="display-avatar"><img class="clickable" src="<?php echo DT_PATH;?>api/avatar/show.php?size=large&reload=<?php echo DT_TIME;?>&username=<?php echo $_username;?>"></label>
        <input type="file" name="edit-avatar" id="edit-avatar" accept="image/*">
        <div class="b16"></div>
        <input type="text" name="edit-username" class="display-username" id="edit-username" value="<?php echo $_username;?>" onfocus="changeValue(this); this.value=''" onblur="setValue(this)" onchange="changeValue(this)">
    </div>
    <?php } else { ?>
    <div id="display-avatar"><img src="<?php echo DT_PATH;?>api/avatar/show.php?size=large&reload=<?php echo DT_TIME;?>&username=<?php echo $_username;?>"></div>
    <div class="b16"></div>
    <div class="display-username"><?php echo $_username;?></div>
    <?php } ?>
</div>
<style>
    #profile-panel{
        width: calc(100% - 3rem);
        margin: .5rem 1.5rem;
    }
    #profile-panel button{
        width: 100%;
        height: 2.5rem;
        border: 1px var(--we-red) solid;
        border-radius: 0px;
        cursor: pointer;
        font-family: 'Dancing Script';
        font-size: 1rem;
    }
    #profile-panel button:hover{
        opacity: .8;
    }
    #profile-panel td{
        width: 50%;
    }
    #profile-cancel{
        color: var(--we-red);
        background-color: white;
    }
    #profile-save{
        color: white;
        background-color: var(--we-red);
    }
</style>
<table id="profile-panel" style="visibility: <?php if($action==edit) { ?>visible<?php } else { ?>hidden<?php } ?>
;">
    <tr>
        <td><button id="profile-cancel" onclick="Go('?')">Cancel</button></td>
        <td><button id="profile-save" type="submit" name="submit" value="update">Save</button></td>
    </tr>
</table>
</form>
<script>
    var val;
    function setValue(e){
        e.value = val;
    }
    function changeValue(e){
        val = e.value;
    }
</script>