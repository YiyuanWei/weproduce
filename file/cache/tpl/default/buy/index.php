<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template(header);?>
<div class="main">
    <style>
        .progress{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
    </style>
    <div class="progress">
        <style>
            .progress-bar{
                background-color: lightgrey;
                border-radius: 1rem;
                height: .5rem;
                width: 1000px;
                margin: .5rem auto;
                position: absolute;
            }
            .progress-track{
                background-color: var(--background-color);
                height: .5rem;
                z-index: 2;
                border-radius: 1rem;
                width: 0%;
            }
            .progress-cir{
                width: 1rem;
                height: 1rem;
                border-radius: 1rem;
                z-index: 3;
                background-color: white;
                border: .25rem solid lightgrey;
                color: white;
                text-align: center;
                cursor: default;
            }
            .progress-cir.active{
                animation: pulse 1s infinite;
                border: .25rem solid grey;
            }
            .progress-cir.complete{
                background-color: green;
                border: .25rem solid green;
            }
            .progress-cir.clickable:hover{
                cursor: pointer;
                opacity: 1;
            }
            .progress-cir.clickable:active{
                animation: pulse 1s infinite;
            }
            @keyframes pulse{ 0% { box-shadow: 0 0 0 0 rgba(33,131,211,0.4);} 70% { box-shadow: 0 0 0 1rem rgba(33,131,211,0);} 100% { box-shadow: 0 0 0 0 rgba(33, 131, 211, 0);} }
            @keyframes nextStep{ 0% { width: 0%; } 100% { width: 100%; } }
        </style>
        <div class="progress-bar">
            <div id="progress-track" class="progress-track"></div>
        </div>
        <?php $tags=tag("table=category&condition=moduleid=$moduleid and level=1&order=catid asc&template=null")?>
        <?php if(is_array($tags)) { foreach($tags as $k => $v) { ?>
        <?php $t = intval($v['catname'])?>
        <div class="progress-cir<?php if($t == $step) { ?> active<?php } else if($t<$step) { ?> complete<?php } ?>
<?php if($step>$t) { ?> clickable<?php } ?>
" onclick="<?php if($step>$t) { ?>Go('?step=<?php echo $t;?>')<?php } ?>
">&#8730;</div>
        <?php } } ?>
        <script>
            $(document).ready(function (){
                $('#progress-track').css('width',<?php echo(($step-1) * 100 / (count($tags)-1))?>+'%');
            })
        </script>
    </div>
    <div style="margin: 5rem auto">
    <?php include template(step.$step, buy);?>
    </div>
    <script>
        function next(url){
            Go("?step=<?php echo($step+1)?>"+url);
        }
    </script>
</div>
<?php include template(footer);?>