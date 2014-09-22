<?php
ob_start();
if (isset($_GET['photo'])){
$file = $_GET['photo'];
if (!isset($_GET['w'])){ $width = 200; }else{ $width=intval($_GET['w']); }
if (!isset($_GET['h'])){ $height = 200; }else{ $height=intval($_GET['h']); }
$ext=pathinfo($file);
list($ozg, $ozy) = getimagesize($file);
$ozo = $ozg/$ozy;
if ($width/$height > $ozo) { $width = $height*$ozo; } else { $height = $width/$ozo; }
$destination = imagecreatetruecolor($width, $height);
if ($ext['extension']=="jpg"){ header('Content-type: image/jpeg'); $source = imagecreatefromjpeg($file); }
elseif ($ext['extension']=="png"){ header("Content-type: image/png"); $source = imagecreatefrompng($file); }
elseif ($ext['extension']=="gif"){ header("Content-type: image/gif"); $source = imagecreatefromgif($file); }
else{ exit(); }
imagecopyresampled($destination, $source, 0, 0, 0, 0, $width, $height, $ozg, $ozy);
if ($ext['extension']=="jpg"){ imagejpeg($destination, null, 100); }elseif ($ext['extension']=="png"){ imagepng($destination); }elseif ($ext['extension']=="gif"){ imagegif($destination, null, 100); }
imagedestroy($destination);
}
ob_flush();
ob_end_flush();
?>