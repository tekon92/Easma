<?php
if (!isset($base)){ exit(); }
$site->check_admin();
$site->post_update("ok","general","1","Site Genel Ayarları");
?>
<div id="page">
  <div class="warn"><img src="images/info2.ico" class="icon" /><?php echo $site->warn; ?></div>
  <?php
            $site->select_single_query("general","where id='1'");
     	    $site->view->form("POST","",0);
            $site->view->varchar("inpt2","title","Site Başlığı :",stripslashes($site->view_query['title']));
            $site->view->varchar("inpt2","description","Site Tanımı :",stripslashes($site->view_query['description']));
            $site->view->varchar("inpt2","keywords","Site Anahtar Kelimeler :",stripslashes($site->view_query['keywords']));
            $site->view->varchar("inpt2","facebook","Facebook :",stripslashes($site->view_query['facebook']));
            $site->view->varchar("inpt2","twitter","Twitter :",stripslashes($site->view_query['twitter']));
            $site->view->add_pic("pic_add","logo","Logo : ","general","1","Picture");
            $site->view->ckeditor("text","content","Metin :",stripslashes($site->view_query['content']),$site->site_url);
            $site->view->ckeditor("text","footer_text","Footer(Alt) :",stripslashes($site->view_query['footer_text']),$site->site_url);
            $site->view->submit("submit","ok","Güncelle");
     	    $site->view->form_close();
    ?>
</div>
