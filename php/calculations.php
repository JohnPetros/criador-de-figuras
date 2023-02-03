<?php

function calculateSquare($color) {
    global $perimeter;
    global $script;
    $width = (int) $_GET['square-width'];
    $height = (int) $_GET['square-height'];
    $perimeter = ($width * 2) + ($height * 2);
    $script = '
    <script>
        const squareShape = document.getElementById("square");
        squareShape.style.width = '.$width.' + "px";
        squareShape.style.height = '.$height.' + "px";
        squareShape.style.backgroundColor = "'.$color.'";
    </script>
    ';
}

function calculateTriangleEquil($color) {
    global $perimeter;
    global $script;
    $width = (int) $_GET['triangle-equil-width'];
    $perimeter = $width * 3;
    $script = '
    <script>
        const triangleEquilShape = document.getElementById("triangle-equil");
        triangleEquilShape.style.borderLeft = '.$width.' + "px solid transparent";
        triangleEquilShape.style.borderRight = '.$width.' + "px solid transparent";
        triangleEquilShape.style.borderBottom = '.$width.' + "px solid '.$color.'";
    </script>
    ';
}

function calculateTriangleIsos($color) {
    global $perimeter;
    global $script;
    $width = (int) $_GET['triangle-isos-width'];
    $height = (int) $_GET['triangle-isos-height'];
    $hypotenuse =  ($width ** 2) + ($height ** 2);
    $perimeter = $width + $height + $hypotenuse;
    $script = '
    <script>
        const triangleIsos = document.getElementById("triangle-isos");
        triangleIsos.style.borderRight = '.$width.' + "px solid transparent";
        triangleIsos.style.borderBottom = '.$height.' + "px solid '.$color.'";
    </script>
    ';
}

function calculateCircle($color) {
    global $perimeter;
    global $script;
    $radius = (int) $_GET['circle-radius'];
    $perimeter = $radius * 2 * pi();
    $script = '
    <script>
        const circle = document.getElementById("circle");
        circle.style.width = '.$radius.' + "px";
        circle.style.height = '.$radius.' + "px";
        circle.style.backgroundColor = "'.$color.'";
    </script>
    ';
}

function calculateEllipse($color) {
    global $perimeter;
    global $script;
    $width = (int) $_GET['ellipse-width'];
    $height = (int) $_GET['ellipse-height'];
    $perimeter = (2 * pi()) * sqrt(((pow($width, 2)) + (pow($height, 2))) /2 );
    $script = '
    <script>
    const ellipse = document.getElementById("ellipse");
    ellipse.style.width = '.$width.' + "px";
    ellipse.style.height = '.$height.' + "px";
    ellipse.style.backgroundColor = "'.$color.'";
    </script>
    ';
}


