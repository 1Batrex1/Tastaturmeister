<?php
/** @var $router \App\Service\Router */

?>

<script>

    function resetProgress() {
        if (confirm('Are you sure you want to reset your progress?')) {
            document.cookie = "courseProgress=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            alert('Progress has been reset.');
        }
    }

    window.addEventListener('load', function () {
        document.getElementById('reset').addEventListener('click', resetProgress);
    });
</script>
<ul>
    <li><a href="<?= $router->generatePath('') ?>">Home</a></li>
    <li><a href="<?= $router->generatePath('courses-index') ?>">Courses</a></li>
    <li><a href="<?= $router->generatePath('admin-login') ?>">Admin</a></li>
    <li><a href="<?= $router->generatePath('course-index') ?>">TEST KURSU</a></li>
    <li><a href="#" id="reset">Reset Progress</a></li>
</ul>
<?php
