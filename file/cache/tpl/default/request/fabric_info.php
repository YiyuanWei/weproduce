<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'request');?>
<?php if($action==complete) { ?>
<?php include template('complete','request');?>
<?php } else { ?>
<div style="padding: 2rem 0;">
<form id="info" action="?" method="POST" enctype="multipart/form-data">
    <div class="step_table" id="fabric_table">
        <h1 class="title" style="width:max-content;">Fabric Information</h1>
        <div class="info-table">
            <div>
                <label for="fmid">Fabric Material</label>
                <br>
                <select name="fmid" id="fmid" onchange="other('fm')">
                    <option value="default">Please select</option>
                    <?php $tags=tag("table=fabric_material&template=null");?>
                    <?php if(is_array($tags)) { foreach($tags as $i => $v) { ?>
                    <option value="<?php echo $v['fmid'];?>"><?php echo $v['fm'];?></option>
                    <?php } } ?>
                </select>
            </div>
            <div id="fm" style="display:none;">
                <br>
                <label for="fminput" style="font-size: .75rem;">Others: </label>
                <input type="text" id='fminput' name="fm" />
            </div>
            <span id='dfmid' class="f_red"></span>
            <table id="f_fabric_weight">
                <tr>
                    <td style="font-size: 1rem;">Weight</td>
                    <td>Unit</td>
                </tr>
                <br>
                <tr>
                    <td><input type="number" step="0.01" min = 0  name="fweight" id="fweight" placeholder="0" style="width: 4rem;"></td>
                    <td style="font-size: small;">gsm</td>
                </tr>
            </table>
            <br>
            <div>
                <label for="fcatid">Fabric Type</label>
                <br>
                <select name="fcatid" id="fcatid" onchange="other('fcat')">
                    <option value="default">Please select</option>
                    <?php $tags=tag("table=fabric_category&template=null");?>
                    <?php if(is_array($tags)) { foreach($tags as $i => $v) { ?>
                    <option value="<?php echo $v['fcatid'];?>"><?php echo $v['fcat'];?></option>
                    <?php } } ?>
                </select>
            </div>
            <div id="fcat" style="display:none">
                <br>
                <label for="fcatinput" style="font-size: .75rem;">Others: </label>
                <input type="text" id='fcatinput' name="fcat" />
            </div>
            <span id='dfcatid' class="f_red"></span>
            <table id="t_fabric_quantity">
                <tr>
                    <td>Quantity</td>
                    <td>Unit</td>
                </tr>
                <br>
                <tr>
                    <td><input name="quantity" type="number" step="0.01" id="quantity" min="1" style="width: 4rem;" placeholder="0"></td>
                    <td><select name="unit" id="unit" style="width: max-content;">
                        <option value="default">Meters</option>
                        <option value="meter" style="display: none;">Meters</option>
                    </select></td>
                </tr>
            </table>
            <br>
            <div>
                <label for="req">Requirement</label>
                <br>
                <textarea name="req" id="req" cols="50" rows="10" placeholder="Provide fabric details such as color and other specification requirements if any" style="resize:none;" ></textarea>
            </div>
            <span id="dreq" class="f_red"></span>
            <br>
            Upload Photos<p style="font-size: .6rem; font-family: cursive; font-style: italic; color: rgba(18, 43, 92, .5);">Click the uploaded image to remove it.</p>
            <div class="t_up_imgs">
                <div class="t_up_imgs" id="fimg_pre">
                </div>
                <div class="t_up_imgs">
                    <input type="file" name="fimg[]" id="fimg" multiple accept="image/* " style="display: none;" onchange="showImage('f')">
                    <label for="fimg">
                        <div class="up_imgs">
                            <span>+</span>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
</form>
<br>
<div class="button_menu" style="margin-bottom: 3rem;">
    <button type="submit" name="submit" value="submit" form="info" onclick="return checkvalue()">Send</button>
    <!--<button id="b_save">SAVE</button>-->
</div>
</div>
<?php } ?>
<script>
function checkvalue(){
    console.debug('true');
    if( Dd('fmid').value == 'default' ){
        Dmsg('Please select a material for your fabric from the list.','fmid');
        return false;
    }
    if( Dd('fmid').value == 0 && Dd('fminput').value.length == 0 ){
        Dmsg('Please provide the material you want.','fmid');
        return false;
    }
    if( Dd('fcatid').value == 'default' ){
        Dmsg('Please select a type of the fabric from the list.','fcatid');
        return false;
    }
    if( Dd('fcatid').value == 0 && Dd('fcatinput').value.length == 0 ){
        Dmsg('Please provide the prefered fabric type.','fcatid');
        return false;
    }
    if( Dd('req').value == '' ){
        Dmsg('Please provide some requirement.','req');
        return false;
    }
    if( Dd('unit').value == 'default' ) Dd('unit').value = 'meter';
    return true;
}
</script>
<?php include template('footer', 'request');?>