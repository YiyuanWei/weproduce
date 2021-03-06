<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header','request');?>
<?php if($action==complete) { ?>
<?php include template('complete','request');?>
<?php } else { ?>
<div id="main">
<div class="progress">
<div class="progress-track"></div>
<div id="step1" class="progress-step is-active">FABRIC INFO</div>
<div id="step2" class="progress-step">ACCESSORY INFO</div>
<div id="step3" class="progress-step">REQUIREMENTS</div>
<div id="step4" class="progress-step">UPLOAD FILES</div>
</div>
<form id="info" action="?" method="POST" enctype="multipart/form-data">
    <div class="step_table" id="step1_table">
        <h1 class="title">Fabric Information</h1>
        <div class="info-table">
            <div>
                <label for="fmid">Fabric Material</label></span>
                <br>               
                 <select name="fmid" id="fmid" required onchange="other('fm')">
                    <option value="default">Please select</option>
                    <?php $tags=tag("table=fabric_material&template=null");?>
                    <?php if(is_array($tags)) { foreach($tags as $i => $v) { ?>
                    <option value="<?php echo $v['fmid'];?>"><?php echo $v['fm'];?></option>
                    <?php } } ?>
                </select>
            </div>
            <div id="fm" style="display:none">
                <br>
                <label for="fminput" style="font-size: .75rem;">Others: </label>
                <input type="text" id='fminput' name="fm"/>
            </div>
            <span id='dfmid' class="f_red"></span>
            <table>
                <tr>
                    <td style="font-size:1rem;">Weight</td>
                    <td>Unit</td>
                </tr>
                <br>
                <tr>
                    <td><input type="number" min="0" name="fweight" id="fweight" placeholder='0' style="width: 4.5rem;" step='0.01'></td>
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
                <input type="text" id='fcatinput' name="fcat"/>
            </div>
            <span id='dfcatid' class="f_red"></span>
            <br>
            Upload Image<p style="font-size: .6rem; font-family: cursive; font-style: italic; color: rgba(18, 43, 92, .5);">Click the uploaded image to remove it.</p>
            <div class="t_up_imgs">
                <div class="t_up_imgs" id="fimg_pre"></div>
                <div class="t_up_imgs">
                    <input type="file" name="fimg[]" id="fimg" style="display: none;" multiple accept="image/*" onchange="showImage('f')">
                    <label for="fimg">
                        <div class="up_imgs">
                            <span>+</span>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="step_table" id="step2_table" style="display: none;">
        <h1 class="title">Accessory Information</h1>
        <div style="display:flex;width:max-content; transform: translate(-30%);">
            <div class="info-table" style="margin-right: 2rem;">
                <h2 class="title">Button Information</h2>
                <div>
                    <label for="bmid">Button Material</label>
                    <br>
                    <select name="bmid" id="bmid" onchange="other('bm')">
                        <option value="default">Please select</option>
                        <?php $tags=tag("table=button_material&template=null");?>
                        <?php if(is_array($tags)) { foreach($tags as $i => $v) { ?>
                        <option value="<?php echo $v['bmid'];?>"><?php echo $v['bm'];?></option>
                        <?php } } ?>
                    </select>
                </div>
                <div id="bm" style="display:none">
                    <br>
                    <label for="bminput" style="font-size: .75rem;">Others: </label>
                    <input type="text" id='bminput' name="bm"/>
                </div>
                <span id='dbmid' class="f_red"></span>
                <table>
                    <tr>
                        <td>Diameter</td>
                        <td>Unit</td>
                    </tr>
                    <br>
                    <tr>
                        <td><input type="number" min="0" name="bdiameter" style="width: 4rem;" id="bdiameter" step="0.01" ></td>
                        <td style="font-size: small;">cm</td>
                    </tr>
                </table>
                <br>
                <div>
                    <label for="btid">Thickness</label>
                    <br>
                    <select name="btid" id="btid" onchange="other('bt')">
                        <option value="default">Please select</option>
                        <?php $tags=tag("table=button_thickness&template=null");?>
                        <?php if(is_array($tags)) { foreach($tags as $i => $v) { ?>
                        <option value="<?php echo $v['btid'];?>"><?php echo $v['btv'];?> <?php echo $v['unit'];?></option>
                        <?php } } ?>
                    </select>
                </div>
                <table id="bt" style="display:none">
                    <tr>
                        <td>Value</td>
                        <td>Unit</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="btv" id="btvinput"/></td>
                        <td><input type="text" name="btunit" id="btunitinput"/></td>
                    </tr>
                </table>
                <span id='dbtid' class="f_red"></span>
                <br>
                Upload Image<p style="font-size: .6rem; font-family: cursive; font-style: italic; color: rgba(18, 43, 92, .5);">Click the uploaded image to remove it.</p>
                <div class="t_up_imgs">
                    <div class="t_up_imgs" id="bimg_pre"></div>
                    <div class="t_up_imgs">
                        <input type="file" name="bimg[]" id="bimg" style="display: none;" multiple accept="image/*" onchange="showImage('b')">
                        <label for="bimg">
                            <div class="up_imgs">
                                <span>+</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="info-table">
                <h2 class="title">Zipper Information</h2>
                <div>
                    <label for="zmid">Zipper Material</label>
                    <br>
                    <select name="zmid" id="zmid" onchange="other('zm')">
                        <option value="default">Please select</option>
                        <?php $tags=tag("table=zipper_material&template=null");?>
                        <?php if(is_array($tags)) { foreach($tags as $i => $v) { ?>
                        <option value="<?php echo $v['zmid'];?>"><?php echo $v['zm'];?></option>
                        <?php } } ?>
                    </select>
                </div>
                <div id="zm" style="display:none">
                    <br>
                    <label for="zminput" style="font-size: .75rem;">Others: </label>
                    <input type="text" id='zminput' name="zm"/>
                </div>
                <span id='dzmid' class="f_red"></span>
                <table>
                    <tr>
                        <td>Number</td>
                    </tr>
                    <br>
                    <tr>
                        <td><input type="number" min="0" name="znumber" placeholer='0' id="znumber" style="width:4rem;"></td>
                    </tr>
                </table>
                <br>
                <div>
                    <label for="ztid">Thickness</label>
                    <br>
                    <select name="ztid" id="ztid"
                    onchange="other('zt')">
                        <option value="default">Please select</option>
                        <?php $tags=tag("table=zipper_thickness&template=null");?>
                        <?php if(is_array($tags)) { foreach($tags as $i => $v) { ?>
                        <option value="<?php echo $v['ztid'];?>"><?php echo $v['ztv'];?> <?php echo $v['unit'];?></option>
                        <?php } } ?>
                    </select>
                </div>
                <table id="zt" style="display:none">
                    <tr>
                        <td>Value</td>
                        <td>Unit</td>
                    </tr>
                    <br>
                    <tr>
                        <td><input type="text" name="ztv" id="ztvinput"/></td>
                        <td><input type="text" name="ztunit" id="ztunitinput"/></td>
                    </tr>
                </table>
                <span id='dztid' class="f_red"></span>
                Upload Image<p style="font-size: .6rem; font-family: cursive; font-style: italic; color: rgba(18, 43, 92, .5);">Click the uploaded image to remove it.</p>
                <div class="t_up_imgs">
                    <div class="t_up_imgs" id="zimg_pre"></div>
                    <div class="t_up_imgs">
                        <input type="file" name="zimg[]" id="zimg" style="display: none;" multiple accept="image/*" onchange="showImage('z')">
                        <label for="zimg">
                            <div class="up_imgs">
                                <span>+</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="step_table" id="step3_table" style="display:none;">
        <h1 class="title">Requirements</h1>
        <div class="info-table">
            <div>
                <label for="quantity">Quantity</label>
                <br>
                <input type="number" name="quantity" id="quantity" min="1">
            </div>
            <br>
            <div id="t_requirement_et">
                <label for="saletime">Estimated on Sale Time</label>
                <br>
                <input type="date" name="saletime" id="saletime">
            </div>
            <br>
            <div>
                <label for="ftid">Thickness</label>
                <br>
                <select name="ftid" id="ftid" onchange="other('ft')">
                    <option value="default">Please select</option>
                    <?php $tags=tag("table=fabric_thickness&template=null");?>
                    <?php if(is_array($tags)) { foreach($tags as $i => $v) { ?>
                    <option value="<?php echo $v['ftid'];?>"><?php echo $v['ftv'];?> <?php echo $v['unit'];?></option>
                    <?php } } ?>
                </select>
            </div>
            <table id="ft" style="display:none">
                <tr>
                    <td>Value</td>
                    <td>Unit</td>
                </tr>
                <br>
                <tr>
                    <td><input type="text" name="ftv" id="ftvinput"/></td>
                    <td><input type="text" name="ftunit" id="ftunitinput"/></td>
                </tr>
            </table>
            <span id='dftid' class="f_red"></span>
            <div>
                <label for="others">Other Requirements</label>
                <br>
                <textarea name="others" id="others" cols="50" rows="10" placeholder="any other requirment(in plain text)"></textarea>
            </div>
        </div>
    </div>
    <div class="step_table" id="step4_table" style="display: none;">
        <h1 class="title">Upload Files</h1>
        <div class="info-table">
            Design Draft
            <div class="up_file_box">
                <input type="file" name="fDesign" id="fDesign" class="inputfile">
                <label for="fDesign">
                    <span class="file-box"></span>
                    <span class="file-button">Select File</span>
                </label>
            </div>
            <br>
            Size Table
            <div class="up_file_box">
                <input type="file" name="fSize" id="fSize" class="inputfile">
                <label for="fSize">
                    <span class="file-box"></span>
                    <span class="file-button">Select File</span>
                </label>
            </div>
            <br>
            Label Design
            <div class="up_file_box">
                <input type="file" name="fLabel" id="fLabel" class="inputfile">
                <label for="fLabel">
                    <span class="file-box"></span>
                    <span class="file-button">Select File</span>
                </label>
            </div>
            <br>
            Upload Photos<p style="font-size: .6rem; font-family: cursive; font-style: italic; color: rgba(18, 43, 92, .5);">Click the uploaded image to remove it.</p>
            <div class="t_up_imgs">
                <div class="t_up_imgs" id="upimg_pre"></div>
                <div class="t_up_imgs">
                    <input type="file" name="upimg[]" id="upimg" style="display: none;" multiple accept="image/*" onchange="showImage('up')">
                    <label for="upimg">
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
    <button id="b_back" onclick=back() style="visibility: hidden;float:left;">BACK</button>
    <button id="b_next" onclick=next()>NEXT</button>
    <button type="submit" name="submit" value="submit" form="info" id="b_send" style="display: none;">Send</button>
    <!--<button id="b_save">SAVE</button>-->
</div>
<?php } ?>
<script>
let step = 'step1';
const steps = [];
for( let i = 0; i<4; i++ ){
    steps.push('step'+(i+1));
}
function next(){
    if(checkvalue(step)){
    var i = steps.indexOf(step);
    if( i < 3 ) {
        step = steps[i+1];
        completeStep(i);
    }
    btn_control();
    }
}
function back(){
    var i = steps.indexOf(step);
    if( i > 0 ){
        step = steps[i-1];
        lastStep(i-1);
    }
    btn_control();
}
function btn_control(){
    var show1 = (step == 'step1') ? "hidden" : "visible";
    var show4 = (step == 'step4') ? "hidden" : "visible";
    var b_next = document.getElementById("b_next");
    b_next.style.visibility = show4;
    var b_back = document.getElementById("b_back");
    b_back.style.visibility = show1;
    var b_send = document.getElementById("b_send");
    if( step == 'step4'){
        b_next.style.display = "none";
        b_send.style.display = "block";
    }
    else{
        b_send.style.display = "none";
        b_next.style.display = "block";
    }
}
function completeStep(i){
    var stepi = document.getElementById("step"+(i+1));
    stepi.classList.remove("is-active");
    stepi.classList.add("is-complete");
    document.getElementById('step'+(i+2)).classList.add("is-active");
    page(i+1,i+2);
    var pagei = document.getElementById("step"+(i+1)+"_table");
}
function lastStep(i){
    var stepi = document.getElementById("step"+(i+1));
    stepi.classList.remove("is-complete");
    stepi.classList.add("is-active");
    document.getElementById('step'+(i+2)).classList.remove("is-active");
    page(i+2,i+1);
}
function page(a,b){
    var page_a = document.getElementById("step"+a+"_table");
    var page_b = document.getElementById("step"+b+"_table");
    page_a.style.display = 'none';
    page_b.style.display = 'block';
}
function checkvalue(step){
    switch (step) {
        case steps[0]:
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
            break;
        case steps[1]:
            if( Dd('bmid').value == 'default' ){
                Dmsg('Please select a button material from the list.', 'bmid');
                return false;
            }
            if( Dd('bmid').value == 0 && Dd('bminput').value.length == 0 ){
                Dmsg('Please provide the prefered button material.', 'bmid');
                return false;
            }
            if( Dd('btid').value == 'default' ){
                Dmsg('Please select a button thickness from the list.', 'btid');
                return false;
            }
            if( Dd('btid').value == 0 && (Dd('btvinput').value.length == 0 || Dd('btunitinput').value.length == 0) ){
                Dmsg('Please provide the prefered thickness of button (value and units are both required).','btid');
                return false;
            }
            if( Dd('zmid').value == 'default' ){
                Dmsg('Please select a zipepr material from the list.', 'zmid');
                return false;
            }
            if( Dd('zmid').value == 0 && Dd('zminput').value.length == 0 ){
                Dmsg('Please provide the prefered zipper material.', 'zmid');
                return false;
            }
            if( Dd('ztid').value == 'default' ){
                Dmsg('Please select a zipper thickness from the list.', 'ztid');
                return false;
            }
            if( Dd('ztid').value == 0 && (Dd('ztvinput').value.length == 0 || Dd('ztunitinput').value.length == 0) ){
                Dmsg('Please provide the prefered thickness of zipper (value and units are both required).','ztid');
                return false;
            }
            break;
        case steps[2]:
            if( Dd('ftid').value == 'default' ){
                Dmsg('Please select a fabric thickness from the list.','ftid');
                return false;
            }
            if( Dd('ftid').value == 0 && (Dd('ftvinput').value.length == 0 || Dd('ftunitinput').value.length == 0) ){
                Dmsg('Please provide the prefered thickness of fabrci (value and units are both required).','ftid');
                return false;
            }
            break;
        default:
            break;
    }
    return true;
}
</script>
<?php include template('footer', 'request');?>