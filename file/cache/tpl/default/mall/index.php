<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template(header, mall);?>
<style>
    .main>.display-grid{
        grid-template-columns: 25% 25% 25% 25%;
    }
    .cat-block{
        height: 250px;
        grid-template-columns: 100%;
        grid-template-rows: 100%;
        grid-template-areas: "block";
    }
    .cat-block img{
        grid-area: block;
        place-self: stretch;
    }
    .cat-block div{
        grid-area: block;
        font-family: 'Dancing Script',Arial, Helvetica, sans-serif;
        font-size: 3rem;
        color: var(--background-color);
    }
</style>
<div class="main">
    <?php $tags=tag("table=category&condition=moduleid=$moduleid and parentid=0&order=catid asc&template=null")?>
    <div class="display-grid">
        <?php if(is_array($tags)) { foreach($tags as $t => $v) { ?>
        <div class="cat-block clickable display-grid" onclick="Go('<?php echo $v['linkurl'];?>')">
            <img src="<?php echo $v['thumb'];?>" width="100%">
            <div style="margin: auto; width: fit-content;">
                <?php echo $v['catname'];?>
            </div>
        </div>
        <?php } } ?>
    </div>
</div>
<?php include template(footer);?>