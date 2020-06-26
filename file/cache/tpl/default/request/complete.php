<?php defined('IN_DESTOON') or exit('Access Denied');?><div style="padding: 2rem 0;">
    <div id="complete_table">
        <h1 class="title" style="display:inline-block;">Submission Complete</h1>
        <div>
            <span>✓</span>
            <h2>Success Request</h2>
            <p>Your request has been sent successfully, we will feedback to you soon!</p>
            <p>You can check your order status in <a href="<?php echo $MODULE['2']['linkurl'];?>"><strong><i>My Orders</i></strong></a>.</p>
            <h3 id="order">Order No: <?php echo $itemid;?></h3>
            <button onclick="location.href='<?php echo DT_PATH;?>'">OK</button>
        </div>
    </div>
</div>