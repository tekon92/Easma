<?php if (!isset($base)){ exit(); } ?>
       <div id="sosyal">

            <a href="<?php echo $web->vars['fb']; ?>" target="_blank"><img alt="facebook can yalçın" src="<?php echo $base."view/".$tema; ?>/images/facebook-4-32.jpg"/></a>
            <a href="<?php echo $web->vars['tw']; ?>" target="_blank"><img alt="twitter can yalçın" src="<?php echo $base."view/".$tema; ?>/images/twitter-4-32.jpg"/></a>

       </div>
       <div id="alt">
        <?php echo $web->vars['footer']; ?>

        </div>


    </body>
</html>