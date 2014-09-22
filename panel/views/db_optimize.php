<?php
if (!isset($base)){ exit(); }
$site->check_admin();
?>
<div id="page">
<?php $site->db_optimize(); ?>
</div>
