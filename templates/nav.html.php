<?php
/** @var $router \App\Service\Router */

?>
<ul>
    <li><a href="<?= $router->generatePath('') ?>">Home</a></li>
    <li><a href="<?= $router->generatePath('courses-index') ?>">Courses</a></li>
    <li><a href="<?= $router->generatePath('admin-login') ?>">Admin</a></li>
</ul>
<?php
