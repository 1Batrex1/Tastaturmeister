<?php

/** @var \App\Model\Course $course*/
/** @var \App\Service\Router $router */

$title = 'Create Post';
$bodyClass = "edit";

ob_start(); ?>

<head>
    <title>Test</title>
</head>

<body>
    <h1>
        Przepisz poniższy tekst:
    </h1>


    <div id="text">
        lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
    </div>
    <br>
    <textarea id="text-input" type="text" placeholder="Insert text here"></textarea>

    <br>
    <p id='shown-key'>No key detected</p>

    <div class="keyboard">
        <div class="key 1">1</div>
        <div class="key">2</div>
        <div class="key">3</div>
        <div class="key">4</div>
        <div class="key">5</div>
        <div class="key">6</div>
        <div class="key">7</div>
        <div class="key">8</div>
        <div class="key">9</div>
        <div class="key">0</div>
        <div class="key">-</div>
        <div class="key">+</div>
        <div class="key delete">Delete</div>
        <div class="key tab">Tab</div>
        <div class="key">Q</div>
        <div class="key">w</div>
        <div class="key">E</div>
        <div class="key">R</div>
        <div class="key">T</div>
        <div class="key">Y</div>
        <div class="key">U</div>
        <div class="key">I</div>
        <div class="key">O</div>
        <div class="key">P</div>
        <div class="key">[</div>
        <div class="key">]</div>
        <div class="key">\</div>
        <div class="key capslock">CapsLock</div>
        <div class="key">A</div>
        <div class="key">S</div>
        <div class="key">D</div>
        <div class="key">F</div>
        <div class="key">G</div>
        <div class="key">H</div>
        <div class="key">J</div>
        <div class="key">K</div>
        <div class="key">L</div>
        <div class="key">;</div>
        <div class="key">'</div>
        <div class="key return">Enter</div>
        <div class="key shift">Shift</div>
        <div class="key">Z</div>
        <div class="key">X</div>
        <div class="key">C</div>
        <div class="key">V</div>
        <div class="key">B</div>
        <div class="key">N</div>
        <div class="key">M</div>
        <div class="key">,</div>
        <div class="key">.</div>
        <div class="key">/</div>
        <div class="key">↑</div>
        <div class="key shift">Shift</div>
        <div class="key ctrl">Ctrl</div>
        <div class="key alt">Alt</div>
        <div class="key space">Space</div>
        <div class="key alt">Alt</div>
        <div class="key ctrl">Ctrl</div>
        <div class="key">←</div>
        <div class="key">↓</div>
        <div class="key">→</div>

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
        width: 300px;
        height: 100px;
        margin-bottom: 10px;
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
        grid-gap: 5px;
        margin-top: 20px;
    }

    .key {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 40px;
        border: 1px solid #ccc;
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


</style>


<script>
    const output = document.getElementById('shown-key');
    const input = document.getElementById('text-input');
    const text = document.getElementById('text');



    input.addEventListener('keyup', (event) => {
        const outputMessage = `${event.key} was pressed`;
        output.style.color = 'red';
        output.innerText = outputMessage;
    });



</script>


<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';