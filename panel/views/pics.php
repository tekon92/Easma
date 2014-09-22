<?php
if (!isset($base)){ exit(); }
$site->check_admin();
?>
<div id="page_edit">
  <div id="warn" class="warn" style="height:22px; line-height:22px;"><img src="images/info2.ico" class="icon" />Fotoğraf Yükle</div>
  <?php
  $site->view->form("POST","iframe.php?page=upload_pics&table=".$_GET['table']."&id=".$_GET['id'],1,"files","onsubmit=\"upload_pics('ok','files','".$site->language[25]."','".$site->language[26]."');\"");
  $site->view->file("file","files","Dosyalar :","");
  $site->view->submit("submit","ok","Yükle");
  $site->view->form_close();
  ?>
  <div class="clear"></div>
  <div id="frm2">
  <iframe frameborder="1" id="files" name="files" src="iframe.php?page=upload_pics&table=<?php echo $_GET['table']."&id=".$_GET['id']; ?>"></iframe>
  </div>
</div>
