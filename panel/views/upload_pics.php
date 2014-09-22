<?php
if (!isset($base)){ exit(); }
$site->check_admin();
if ( (!isset($_GET['table'])) and (!isset($_GET['id'])) ){ exit(); }
$site->upload_pics($_GET['table'],$_GET['id'],"files");
?>
<div id="page_edit">
 <?php
        $site->delete_this_pic("trash");
        $site->main_pic("mainpic");
        $site->list_pics($_GET['table'],$_GET['id']);
 ?>
</div>