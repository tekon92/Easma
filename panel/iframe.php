<?php
include_once "../config.php";
include_once 'model/model.php';
include_once "controller/main.php";
$site=new site($base,$server,$user,$pass,$database,$admin,$admin_pass,$lang);
$site->check_admin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>EasMa 1.0</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="robots" content="noindex,nofollow">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="js/jquery-1.8.3.js "></script>
    <script type="text/javascript" src="js/site.js"></script>
</head>
<body class="frm">
	<div id="cont">
     <?php
     if ( (!isset($_GET['id'])) and (!isset($_GET['table'])) ){
     						exit();
     							 }
     include "views/".$site->page;
     ?>

	</div>
	<div class="clear"></div>
	<div id="footer">www.canyalcin.com</div>
</body>
</html>