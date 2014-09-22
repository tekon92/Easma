<?php
include_once "../config.php";
include_once 'model/model.php';
include_once "controller/main.php";
$site=new site($base."panel/",$server,$user,$pass,$database,$admin,$admin_pass,$lang);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>EasMa 1.0</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="robots" content="noodp, noydir">
	<meta name="robots" content="noindex,nofollow">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="js/jquery-1.8.3.js "></script>
    <script type="text/javascript" src="js/site.js"></script>
</head>
<body>
   <?php if ($site->admin()==true){  ?>
   	 <div id="overlay"></div>
	 <div id="header">
	    <div class="header_left"><img src="images/home.ico" title="Can Yalçın" />EasMa 1.0</div>
	    <div class="header_right"><img src="images/exit.ico" /><a href="<?php echo $base."panel/index.php?page=logout"; ?>"><?php echo $site->language[21]; ?></a></div>
	    <div class="header_right"><img src="images/info.ico" /><a href="<?php echo $base."panel/index.php?page=backup"; ?>"><?php echo $site->language[22]; ?></a></div>
	    <div class="header_right"><img src="images/dataonar.ico" /><a href="<?php echo $base."panel/index.php?page=db_optimize"; ?>"><?php echo $site->language[23]; ?></a></div>
	    <div class="header_right"><img src="images/chrome.ico" /><a target="_blank" href="<?php echo $base; ?>"><?php echo $site->language[24]; ?></a></div>
	    <div class="temizle"></div>
	 </div>
     <div class="clear"></div>
    <?php } ?>
	<div id="cont">
     <?php
     if ($site->admin()==true){include "views/menu.php";}
        include "views/".$site->page;
     ?>
	</div>
	<div class="clear"></div>
	<div id="footer">www.canyalcin.com</div>
</body>
</html>