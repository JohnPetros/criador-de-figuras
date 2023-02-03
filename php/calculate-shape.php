<?php


if (isset($_GET['shape-calculate'])) {
    $shapeName = $_GET['shape-name'];
    require('./php/controls.php');
    require('./calculate-shape.php');

    if (isset($_GET['color'])) $color = $_GET['color'];
    
    switch ($shapeName) {
        case 'square':
          $controls = squareControls();
          calculateSquare($color);
            break;
        case 'triangle-equil':
            $controls = triangleEquilControls();
            calculateTriangleEquil($color);
            break;
        case 'triangle-isos':
            $controls = triangleIsosControls();
            calculateTriangleIsos($color);
            break;
        case 'circle':
            $controls = circleControls();
            calculateCircle($color);
            break;
        case 'ellipse':
            $controls = ellipseControls();
            calculateEllipse($color);
            break;
    }
}