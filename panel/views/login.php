<?php
if (!isset($base)){ exit(); }
if ($site->admin()==false){
	                    $site->login("nick","sifre","ok");
 						include "controller/form_view.php";
                        $view=new view();
 ?>
<div id="sess">
        <div class="warn"><img src="images/info2.ico" class="icon" /><?php echo $site->warn; ?></div>
     <?php
     		$view->form("POST");
            $view->nick("inpt","nick","Kullanıcı Adı :");
            $view->pass("inpt_pass","sifre","Şifre :");
            $view->submit("submit","ok","Gönder");
     		$view->form_close();
      ?>

</div>
<?php }else{ header("Location:index.php"); } ?>