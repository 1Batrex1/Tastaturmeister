<?php
/** @var \App\Service\Router $router */


$title = 'Admin Panel';
$bodyClass = 'index';

ob_start(); ?>
    <h1>Admin Panel</h1>



<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';