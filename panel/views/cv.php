<?php
if (!isset($base)){ exit(); }
$site->check_admin();
$site->post_update("ok","cv","1","CV bilgileri");
?>
<div id="page">
  <div class="warn"><img src="images/info2.ico" class="icon" /><?php echo $site->warn; ?></div>
  <?php
            $site->select_single_query("cv","where id='1'");
     	    $site->view->form("POST","",0);
            $site->view->varchar("inpt2","title","Başlık :",stripslashes($site->view_query['title']));
            $site->view->varchar("inpt2","description","Tanım :",stripslashes($site->view_query['description']));
            $site->view->varchar("inpt2","keywords","Anahtar Kelimeler :",stripslashes($site->view_query['keywords']));
            $site->view->ckeditor("text","content","Content :",stripslashes($site->view_query['content']),$site->site_url);
            $site->view->submit("submit","ok","Güncelle");
     	    $site->view->form_close();
    ?>
</div>
