<?php if (!isset($base)){ exit(); } ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $web->vars['title']; ?></title>
    <meta name="robots" content="index,follow" />
    <meta name="Description" content="<?php echo $web->vars['desc']; ?>" />
    <meta name="keywords" content="<?php echo $web->vars['keys']; ?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>view/<?php echo $tema; ?>/css/style.css" />
    <link rel="shortcut icon" href="<?php echo $base; ?>view/<?php echo $tema; ?>/favicon.ico" type="image/x-icon" />
</head>
    <body>