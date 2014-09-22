<?php
if (!isset($base)){ exit(); }
$site->check_admin();
?>
<div id="page">
  <?php
   /* list_records(tablo_adı,başlıklar,sutun_adları,sql şart(where 1=1),filtrelenecek_sutun_adı,resim eklemek için 1)  */
   $site->list_records("products",array("ID","Başlık","Tanım"),array("id","title","description"),"","title","1");
  ?>
</div>
