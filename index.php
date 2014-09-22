<?php
include_once "config.php";
include_once "model/model.php";
include_once "controller/main.php";
$web=new site($server,$user,$pass,$database,dirname(__FILE__)."/view/".$tema);
include_once "view/".$tema."/index.php";
?>