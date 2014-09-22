<?php if (!isset($base)){ exit(); } ?>


        <h1 id="baslik"><?php echo $web->vars['title']; ?></h1>

        <div id="merkez">
            <?php if (isset($web->vars['cont_photo'])){ ?>
            <img class="content_pic" src="<?php echo $base."uploads/".$web->vars['cont_photo']; ?>" />
            <?php } ?>
            <?php echo $web->vars['content']; ?>
            <div class="clear"></div>
        </div>