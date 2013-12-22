<?php
defined('_JEXEC') or die;
?>

<ul>
    List
    <?php foreach ($list as $item) : ?>
        <li>
            <a>
                <?php echo $item->title; ?></a>
        </li>
    <?php endforeach; ?>

</ul>

