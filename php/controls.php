<?php

function squareControls()
{
    if (isset($_GET['square-width']) && isset($_GET['square-height'])) {
        $width = $_GET['square-width'];
        $height = $_GET['square-height'];
    } else {
        $width = 250;
        $height = 250;
    }
    return "
    <div class='control'>
    <label for='width'>Largura (cm):</label>
    <input type='range' steps='10' min='0' max='350' class='range' id='range-width' value='$width'>
    <input type='text' readonly class='input-number' value='$width'  id='input-width' name='square-width'>
</div>
<div class='control'>
    <label for='height'>Altura (cm):</label>
    <input type='range' steps='10' min='0' max='350' class='range' id='range-height' value='$height'>
    <input type='text' readonly class='input-number' value='$height' id='input-height' name='square-height'>
</div>
    ";
}

function triangleEquilControls()
{
    if (isset($_GET['triangle-equil-width'])) {
        $width = $_GET['triangle-equil-width'];
    } else {
        $width = 250;
    }
    return '
    <div class="control">
        <label for="width">Largura (cm):</label>
        <input type="range" steps="10" min="0" max="350" name="triangle-equil-width" class="range" id="range-width" value="'.$width.'">
        <input type="text" readonly class="input-number" value="'.$width.'"  id="input-width" name="triangle-equil-width">
    </div>
    ';
}

function triangleIsosControls()
{
    if (isset($_GET['triangle-isos-width']) && isset($_GET['triangle-isos-height'])) {
        $width = $_GET['triangle-isos-width'];
        $height = $_GET['triangle-isos-height'];
    } else {
        $width = 250;
        $height = 250;
    }
    return '
    <div class="control">
    <label for="width">Largura (cm):</label>
    <input type="range" steps="10" min="0" max="350" class="range" id="range-width" value="'.$width.'">
    <input type="text" readonly class="input-number" value="'.$width.'"  id="input-width" name="triangle-isos-width">
</div>
<div class="control">
    <label for="height">Altura (cm):</label>
    <input type="range" steps="10" min="0" max="350" class="range" id="range-height" value="'.$height.'">
    <input type="text" readonly class="input-number" value="'.$height.'" id="input-height" name="triangle-isos-height">
</div>
    ';
}

function circleControls()
{
    if (isset($_GET['circle-radius'])) {
        $radius = $_GET['circle-radius'];
    } else {
        $radius = 250;
    }
    return '
    <div class="control">
        <label for="width">Raio (cm):</label>
        <input type="range" steps="10" min="0" max="350" class="range" id="range-radius" value="'.$radius.'">
        <input type="text" readonly class="input-number" value="'.$radius.'"  id="input-radius" name="circle-radius">
    </div>
    ';
}

function ellipseControls()
{
    if (isset($_GET['ellipse-width']) && isset($_GET['ellipse-height'])) {
        $width = $_GET['ellipse-width'];
        $height = $_GET['ellipse-height'];
    } else {
        $width = 250;
        $height = 250;
    }
    return '
    <div class="control">
        <label for="height">Largura (cm):</label>
        <input type="range" steps="10" min="0" max="350" class="range" id="range-width" value="'.$width.'">
        <input type="text" readonly class="input-number" value="'.$width.'" id="input-width" name="ellipse-width">
    </div>
    <div class="control">
        <label for="height">Altura (cm):</label>
        <input type="range" steps="10" min="0" max="350" class="range" id="range-height" value="'.$height.'">
        <input type="text" readonly class="input-number" value="'.$height.'" id="input-height" name="ellipse-height">
    </div>
    ';
}