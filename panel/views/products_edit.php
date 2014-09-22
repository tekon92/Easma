<?php
if (!isset($base)){ exit(); }
$site->check_admin();
$site->post_update("ok",$_GET['table'],$_GET['id'],"Sayfa Düzenle");
?>
<div id="page_edit">
  <div class="warn"><img src="images/info2.ico" class="icon" /><?php echo $site->warn; ?></div>
  <?php
            $site->select_single_query(addslashes($_GET['table']),"where id='".addslashes(intval($_GET['id']))."'");
            $site->view->form("POST","",0);
            $site->view->varchar("inpt2","title","Başlık :",stripslashes($site->view_query['title']));
            $site->view->varchar("inpt2","keywords","Anahtar Kelimeler :",stripslashes($site->view_query['keywords']));
            $site->view->varchar("inpt2","description","Sayfa Tanımı :",stripslashes($site->view_query['description']));
            $site->view->ckeditor("inpt2","content","Metin :",$site->view_query['content'],stripslashes($site->site_url));
            $site->view->submit("submit","ok","Güncelle");
            $site->view->form_close();



      ?>
</div>
