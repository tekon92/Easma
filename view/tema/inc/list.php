<?php if (!isset($base)){ exit(); } ?>

        <h1 id="baslik"><?php echo $web->vars['title']; ?></h1>

        <div id="merkez">
        <?php
            foreach ($web->vars['list_all'] as $kutu) {
         ?>
            <div class="kutu">
               <h2>
                    <a href="<?php echo $base.$_GET['page']."/".$kutu['id']."/".$web->seo_url($kutu['title']).".html"; ?>">
                        <?php echo stripslashes($kutu['title']); ?>
                     </a>
               </h2>
                <?php if (isset($kutu['photo'])){ ?>
                <img alt="<?php echo stripslashes($kutu['title']); ?>" src="<?php echo $base."uploads/".$kutu['photo']; ?>" />
                <?php } ?>
                <a href="<?php echo $base.$_GET['page']."/".$kutu['id']."/".$web->seo_url($kutu['title']).".html"; ?>">
                <?php echo mb_substr(strip_tags(stripslashes($kutu['content'])),0,250,'UTF-8')." ..."; ?>
                </a>
                <div class="clear"></div>
            </div>
        <?php } ?>

        </div>