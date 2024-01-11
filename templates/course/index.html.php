<?php

/** @var \App\Model\Course $courses */
/** @var \App\Service\Router $router */

$title = 'Choice Course';
$bodyClass = "edit";

ob_start(); ?>
    <h1>Delete Course</h1>
    <ul>

        <?php foreach ($courses as $course): ?>
            <li>

                <form action="<?= $router->generatePath('course-show') ?>" method="post">
                    <p> <?= $course->getCourseName()?> </p>
                    <p <?= $course->getCourseDifficulty()?>></p>
                </form>

            </li>
        <?php endforeach ?>

    </ul>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
