<?php
if (!isset($base)){ exit(); }
$site->check_admin();
$site->post_insert("ok",$_GET['table'],"Alanları boş geçmeyin.");
?>
<div id="page_edit">
  <div class="warn"><img src="images/info2.ico" class="icon" /><?php echo $site->warn; ?></div>
  <?php
     	    $site->view->form("POST","",0);
            $site->view->varchar("inpt2","title","Başlık :","");
            $site->view->varchar("inpt2","keywords","Anahtar Kelimeler :","");
            $site->view->varchar("inpt2","description","Sayfa Tanımı :","");
            $site->view->ckeditor("inpt2","content","Metin :","",$site->site_url);
            $site->view->submit("submit","ok","Ekle");
     	    $site->view->form_close();
      ?>
</div>
