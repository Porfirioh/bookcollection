<?php define ('FRAMEWORK_DIR', 'framework/'); ?>

<?php require_once(FRAMEWORK_DIR .'RequestHandler.php'); ?>

<?php
    $rh = new RequestHandler();
    $rh->run();
?>
