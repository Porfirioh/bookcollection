<?php require_once (dirname(__FILE__).'/../../lib/DHtml.php'); ?>

<h2>Categories Page</h2>
<ul>
    <?php foreach ($categories as $category) {?>
        <li><?php echo DHtml::link($category['name'], array('category/view', $category['id'])); ?></li>
    <?php } ?>
</ul>