<?php

/** @var \App\Model\Course $course*/
/** @var \App\Service\Router $router */

$title = 'Course';
$bodyClass = "edit";

if (!isset($_COOKIE['courseProgress']))
{
    $coursesProgress = (new App\Model\Course)->findAll();
    $isDoneTable = [];
    foreach ($coursesProgress as $courseProgress)
    {
        $isDoneTable[$courseProgress->getCourseId()] = 0;
    }

    setcookie('courseProgress', json_encode($isDoneTable), time() + 3600);

}

ob_start(); ?>

<head>
    <title>Test</title>
</head>

<body>
    <h1>
        Przepisz poniższy tekst:
    </h1>



    <div id="text"><?= $course->getCourseText()?></div>
    <br>
    <textarea id="text-input" type="text" placeholder="Wpisuj tutaj..."></textarea>

    <br>
    <p id='shown-key'>No key detected</p>

    <div class="keyboard">
        <div class="key left_small">1</div>
        <div class="key left_small">2</div>
        <div class="key left_ring">3</div>
        <div class="key left_middle">4</div>
        <div class="key left_pointing">5</div>
        <div class="key left_pointing">6</div>
        <div class="key right_pointing">7</div>
        <div class="key right_pointing">8</div>
        <div class="key right_middle">9</div>
        <div class="key right_ring">0</div>
        <div class="key right_small">-</div>
        <div class="key right_small">=</div>
        <div class="key right_small delete">Delete</div>
        <div class="key left_small tab">Tab</div>
        <div class="key left_small">Q</div>
        <div class="key left_ring">W</div>
        <div class="key left_middle">E</div>
        <div class="key left_pointing">R</div>
        <div class="key left_pointing">T</div>
        <div class="key right_pointing">Y</div>
        <div class="key right_pointing">U</div>
        <div class="key right_middle">I</div>
        <div class="key right_ring">O</div>
        <div class="key right_small">P</div>
        <div class="key right_small">[</div>
        <div class="key right_small">]</div>
        <div class="key right_small">\</div>
        <div class="key left_small capslock">CapsLock</div>
        <div class="key left_small">A</div>
        <div class="key left_ring">S</div>
        <div class="key left_middle">D</div>
        <div class="key left_pointing">F</div>
        <div class="key left_pointing">G</div>
        <div class="key right_pointing">H</div>
        <div class="key right_pointing">J</div>
        <div class="key right_middle">K</div>
        <div class="key right_ring">L</div>
        <div class="key right_small">;</div>
        <div class="key right_small">'</div>
        <div class="key right_small return">Enter</div>
        <div class="key left_small shift">Shift</div>
        <div class="key left_small">Z</div>
        <div class="key left_ring">X</div>
        <div class="key left_middle">C</div>
        <div class="key left_pointing">V</div>
        <div class="key left_pointing">B</div>
        <div class="key right_pointing">N</div>
        <div class="key right_pointing">M</div>
        <div class="key right_middle">,</div>
        <div class="key right_ring">.</div>
        <div class="key right_small">/</div>
        <div class="key right_small">↑</div>
        <div class="key right_small shift">Shift</div>
        <div class="key left_small ctrl">Ctrl</div>
        <div class="key thumb alt">Alt</div>
        <div class="key thumb space">Space</div>
        <div class="key thumb alt">Alt</div>
        <div class="key right_middle ctrl">Ctrl</div>
        <div class="key right_small">←</div>
        <div class="key right_small">↓</div>
        <div class="key right_small">→</div>
    </div>

    <div id="imageContainer" style="display: inline-block; margin-left: 25%; border: none">
        <img id="backgroundImage" src="assets/src/pic/img.png" alt="Tło" style="width: 100%; height: 100%;">
        <img id="overlayImage" src="assets/src/pic/wskazowka.png" alt="Wskazówka" style="width: 100%; height: 100%;">
    </div>

    <div style="display: inline-block; vertical-align: top; margin-top: 35px; margin-left: 30px">
        <p id="typingSpeedDisplay">Current typing speed: 0 keys per second</p>
    </div>


</body>

<style>
    h1 {
        margin-bottom: 20px;
        color: saddlebrown;
    }
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        background-color: #555555;
    }

    textarea {
        width: 1000px;
        height: 100px;
        margin-bottom: 10px;
        border: 2px solid #8B4513;
        border-radius: 10px;
        background-color: #ecf0f1;

    }

    div {
        border: 2px solid #8B4513;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #ecf0f1;

    }

    .keyboard {
        display: grid;
        grid-template-columns: repeat(15, 1fr);
        grid-gap: 8px;
        margin-top: 20px;
        margin-bottom: 20px;
        margin-right: -20px;

    }

    .key {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 40px;
        border: 3px solid grey;
        border-radius: 5px;
        background-color: #fff;
        font-size: 14px;

    }

    .key.delete {
        grid-column: span 3;
    }

    .key.capslock, .key.return, .key.shift, .key.tab, .key.ctrl {
        grid-column: span 2;
    }

    .key.space {
        grid-column: span 5;
    }
    .key.left_small{
        background-color: #fff69b;
    }
    .key.left_ring{
        background-color: yellowgreen;
    }
    .key.left_middle{
        background-color: coral;
    }
    .key.left_pointing{
        background-color: lightsteelblue;
    }

    .key.right_small{
        background-color: lightyellow;
    }
    .key.right_ring{
        background-color: lightgreen;
    }
    .key.right_middle{
        background-color: lightsalmon;
    }
    .key.right_pointing{
        background-color: lightblue;
    }
    .key.thumb{
        background-color: violet;
    }

    .key.pressed {
        background-color: black;
        color: white;
    }

    .key.toPress {
        background-color: white;
        color: black;
    }

    /*prędkościomierz */

    #speedometer {
        width: 100px;
        height: 50px;
        background-color: #3498db;
        position: relative;
        transition: left 0.2s ease;
    }
    #imageContainer {
        position: relative;
        width: 100px;
        height: 100px;
        margin-top: 20px;
    }

    #backgroundImage {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    #overlayImage {
        position: absolute;
        top: 10px;
        left: 2px;
        width: 100%;
        height: 100%;
        transform: rotate(150deg);
        /*transition: transform 0.5s ease;*/

    }


</style>


<script>
    const output = document.getElementById('shown-key');
    const input = document.getElementById('text-input');
    const text = document.getElementById('text');
    const keys = document.querySelectorAll('.key');
    const body = document.querySelector('body')

    input.addEventListener('markButton', () => {

    });



    input.addEventListener('keyup', (event) => {
        const outputMessage = `${event.key} was pressed`;
        output.style.color = 'red';
        output.innerText = outputMessage;
    });

    document.addEventListener('keydown', highlightKey);
    document.addEventListener('keyup', unhighlightKey);


    if (!document.hasFocus()) {
        removePressedClass();
    }


    function removePressedClass() {
        keys.forEach(function(key) {
            key.classList.remove('pressed');
        });
    }



    function highlightKey(event) {
        let pressedKey;
        if (event.key) {
            pressedKey = event.key.toUpperCase();
        }
        if (event.code === 'Space') {
            pressedKey = 'Space';
        }
        if (event.code === 'Tab') {
            pressedKey = 'Tab';
        }
        if (event.code === 'CapsLock') {
            pressedKey = 'CapsLock';
        }
        if (event.code === 'Enter') {
            pressedKey = 'Enter';
        }
        if (event.key === 'Shift') {
            pressedKey = 'Shift';
        }
        if (event.key === 'ArrowUp') {
            pressedKey = '↑';
        }
        if (event.key === 'ArrowDown') {
            pressedKey = '↓';
        }
        if (event.key === 'ArrowLeft') {
            pressedKey = '←';
        }
        if (event.key === 'ArrowRight') {
            pressedKey = '→';
        }
        if (event.key === 'Backspace') {
            pressedKey = 'Delete';
        }
        if (event.key === 'Control') {
            pressedKey = 'Ctrl';
        }
        if (event.key === 'Alt') {
            pressedKey = 'Alt';
        }

        keys.forEach(keyElement => {
            if (keyElement.innerText === pressedKey) {
                keyElement.classList.add('pressed');
            }
        });
    }

    function unhighlightKey(event) {
        let releasedKey;
        if(event.code === 'ControlLeft' || event.code === 'ControlRight') {
            releasedKey = 'Ctrl';
        }
        if (event.key) {
            releasedKey = event.key.toUpperCase();
        }
        if (event.altKey) {
            releasedKey = 'Alt';
        }
        if (event.code === 'Space') {
            releasedKey = 'Space';
        }
        if (event.code === 'Tab') {
            releasedKey = 'Tab';
        }
        if (event.code === 'CapsLock') {
            releasedKey = 'CapsLock';
        }
        if (event.code === 'Enter') {
            releasedKey = 'Enter';
        }
        if (event.key === 'Shift') {
            releasedKey = 'Shift';
        }
        if (event.key === 'ArrowUp') {
            releasedKey = '↑';
        }
        if (event.key === 'ArrowDown') {
            releasedKey = '↓';
        }
        if (event.key === 'ArrowLeft') {
            releasedKey = '←';
        }
        if (event.key === 'ArrowRight') {
            releasedKey = '→';
        }
        if (event.key === 'Backspace') {
            releasedKey = 'Delete';
        }
        if (event.key === 'Control') {
            releasedKey = 'Ctrl';
        }
        if (event.key === 'Alt') {
            releasedKey = 'Alt';
        }

        keys.forEach(keyElement => {
            if (keyElement.innerText === releasedKey) {
                keyElement.classList.remove('pressed');
            }
        });
    }

    /*prędkościomierz*/

    let totalRotation = 150; //Początkowa rotacja
    const rotationInterval = 10; // Co ile milisekundobniżać kąt
    const rotationAmount = 1; // O ile stopni obniżać kąt przykażdym interwal
    const minRotation = 150; // Minimalny kąt obrotu
    const maxRotation = 375; // Maksymalny kąt obrotu
    const overlayImage = document.getElementById('overlayImage');

    document.addEventListener('keydown', function() {
        rotateOverlayImage();
    });

    setInterval(function() {
        autoRotateOverlayImage();
    }, rotationInterval);

    function rotateOverlayImage() {
        totalRotation += 20; // Dodaj 20 stopni przy każdym naciśnięciu (możesz dostosować)
        checkBounds();
        overlayImage.style.transform = `rotate(${totalRotation}deg)`;
    }

    function autoRotateOverlayImage() {
        totalRotation -= rotationAmount; // Odejmij kąt obrotu
        checkBounds();
        overlayImage.style.transform = `rotate(${totalRotation}deg)`;
    }

    function checkBounds() {
        if (totalRotation < minRotation) {
            totalRotation = minRotation;
        } else if (totalRotation > maxRotation) {
            totalRotation = maxRotation;
        }
    }

</script>


<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';