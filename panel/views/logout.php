<?php
$site->check_admin();
$_SESSION['admin']="";
session_unset("admin");
session_unset();
session_destroy();
header("Location:index.php");
 ?>
