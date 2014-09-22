<?php if (!isset($base)){ exit(); } $site->check_admin(); ?>
<ul id="menu">
 <?php
    $site->menu("Easma","main");
    $site->menu("Genel Ayarlar","general_options");
    $site->menu("Cv","cv");
    $site->menu("Operatin System","os");
    $site->menu("Products","products");
    $site->menu("Ide","ide");
 ?>
</ul>

