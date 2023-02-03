<?php

require('./php/controls.php');

if (isset($_GET['shape-selected'])) {
    $shapeName = $_GET['shape-selected'];

    switch ($shapeName) {
        case 'square':
            $shapeName = 'square';
            $controls = squareControls();
            break;
        case 'triangle-equil':
            $shapeName = 'triangle-equil';
            $controls = triangleEquilControls();
            break;
        case 'triangle-isos':
            $shapeName = 'triangle-isos';
            $controls = triangleIsosControls();
            break;
        case 'circle':
            $shapeName = 'circle';
            $controls = circleControls();
            break;
        case 'ellipse':
            $shapeName = 'ellipse';
            $controls = ellipseControls();
            break;
    }
}