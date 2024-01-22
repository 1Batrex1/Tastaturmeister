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
    <li><a id= "home" href="<?= $router->generatePath('') ?>">Home</a></li>
    <li ><a id="courses" href="<?= $router->generatePath('courses-index') ?>">Courses</a></li>
    <li ><a id="login" href="<?= $router->generatePath('admin-login') ?>">Admin</a></li>
    <li ><a id="own" href="<?= $router->generatePath('own-text') ?>">Own Text</a></li>
    <li ><a id="reset" href="#">Reset Progress</a></li>
    <li>
        <a  href="#" id="ChangeLanguage">
            <div class="dropdown">
                <p id="language">
                Language
                </p>
                <ul>
                    <li>Angielski<button onclick="changeLanguage('en')" class="english_button"><img src="assets/src/pic/england_flag.png" alt="Flag" style="width: 100%; height: 100%;"></button></li>
                    <li>Polski<button onclick="changeLanguage('pl')" class="polish_button"><img src="assets/src/pic/poland_flag.png" alt="Flag" style="width: 85%; height: 85%;"></button></li>
                </ul>
            </div>
        </a>
    </li>

</ul>
<?php
