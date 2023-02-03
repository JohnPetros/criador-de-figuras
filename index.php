<?php
$shapeName = 'square';
$controls = SquareControls();
$perimeter = 62500;
$script = '';

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

if (isset($_GET['shape-calculate'])) {
    $shapeName = $_GET['shape-name'];

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



function calculateSquare($color)
{
    global $perimeter;
    global $script;
    $width = (int) $_GET['square-width'];
    $height = (int) $_GET['square-height'];
    $perimeter = ($width * 2) + ($height * 2);
    $script = '
    <script>
        const squareShape = document.getElementById("square");
        squareShape.style.width = ' . $width . ' + "px";
        squareShape.style.height = ' . $height . ' + "px";
        squareShape.style.backgroundColor = "' . $color . '";
    </script>
    ';
}

function calculateTriangleEquil($color)
{
    global $perimeter;
    global $script;
    $width = (int) $_GET['triangle-equil-width'];
    $perimeter = $width * 3;
    $script = '
    <script>
        const triangleEquilShape = document.getElementById("triangle-equil");
        triangleEquilShape.style.borderLeft = ' . $width . ' + "px solid transparent";
        triangleEquilShape.style.borderRight = ' . $width . ' + "px solid transparent";
        triangleEquilShape.style.borderBottom = ' . $width . ' + "px solid ' . $color . '";
    </script>
    ';
}

function calculateTriangleIsos($color)
{
    global $perimeter;
    global $script;
    $width = (int) $_GET['triangle-isos-width'];
    $height = (int) $_GET['triangle-isos-height'];
    $hypotenuse =  ($width ** 2) + ($height ** 2);
    $perimeter = $width + $height + $hypotenuse;
    $script = '
    <script>
        const triangleIsos = document.getElementById("triangle-isos");
        triangleIsos.style.borderRight = ' . $width . ' + "px solid transparent";
        triangleIsos.style.borderBottom = ' . $height . ' + "px solid ' . $color . '";
    </script>
    ';
}

function calculateCircle($color)
{
    global $perimeter;
    global $script;
    $radius = (int) $_GET['circle-radius'];
    $perimeter = $radius * 2 * pi();
    $script = '
    <script>
        const circle = document.getElementById("circle");
        circle.style.width = ' . $radius . ' + "px";
        circle.style.height = ' . $radius . ' + "px";
        circle.style.backgroundColor = "' . $color . '";
    </script>
    ';
}

function calculateEllipse($color)
{
    global $perimeter;
    global $script;
    $width = (int) $_GET['ellipse-width'];
    $height = (int) $_GET['ellipse-height'];
    $perimeter = (2 * pi()) * sqrt(((pow($width, 2)) + (pow($height, 2))) / 2);
    $script = '
    <script>
    const ellipse = document.getElementById("ellipse");
    ellipse.style.width = ' . $width . ' + "px";
    ellipse.style.height = ' . $height . ' + "px";
    ellipse.style.backgroundColor = "' . $color . '";
    </script>
    ';
}


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
        <input type="range" steps="10" min="0" max="350" name="triangle-equil-width" class="range" id="range-width" value="' . $width . '">
        <input type="text" readonly class="input-number" value="' . $width . '"  id="input-width" name="triangle-equil-width">
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
    <input type="range" steps="10" min="0" max="350" class="range" id="range-width" value="' . $width . '">
    <input type="text" readonly class="input-number" value="' . $width . '"  id="input-width" name="triangle-isos-width">
</div>
<div class="control">
    <label for="height">Altura (cm):</label>
    <input type="range" steps="10" min="0" max="350" class="range" id="range-height" value="' . $height . '">
    <input type="text" readonly class="input-number" value="' . $height . '" id="input-height" name="triangle-isos-height">
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
        <input type="range" steps="10" min="0" max="350" class="range" id="range-radius" value="' . $radius . '">
        <input type="text" readonly class="input-number" value="' . $radius . '"  id="input-radius" name="circle-radius">
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
        <input type="range" steps="10" min="0" max="350" class="range" id="range-width" value="' . $width . '">
        <input type="text" readonly class="input-number" value="' . $width . '" id="input-width" name="ellipse-width">
    </div>
    <div class="control">
        <label for="height">Altura (cm):</label>
        <input type="range" steps="10" min="0" max="350" class="range" id="range-height" value="' . $height . '">
        <input type="text" readonly class="input-number" value="' . $height . '" id="input-height" name="ellipse-height">
    </div>
    ';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criador de Formas</title>
    <link rel="stylesheet" href="./css/global.css?v= <?php echo time() ?>">
    <link rel="stylesheet" href="./css/controls.css?v= <?php echo time() ?>">
    <link rel="stylesheet" href="./css/shapes.css?v= <?php echo time() ?>">
    <link rel="stylesheet" href="./css/result.css?v= <?php echo time() ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <h1>Criador de Formas</h1>
    </header>

    <main class="container-controls">
        <form class="container-select-shape">
            <div class="control">
                <label for="">Forma:</label>
                <select name="shape-selected" id="" class="select-shape">
                    <option <?php if ($shapeName == 'square') echo 'selected'; ?> value="square">Quadrilátero</option>
                    <option <?php if ($shapeName == 'triangle-equil') echo 'selected'; ?> value="triangle-equil">Triângulo Equilátero</option>
                    <option <?php if ($shapeName == 'triangle-isos') echo 'selected'; ?> value="triangle-isos">Triângulo Isóceles</option>
                    <option <?php if ($shapeName == 'circle') echo 'selected'; ?> value="circle">Círculo</option>
                    <option <?php if ($shapeName == 'ellipse') echo 'selected'; ?> value="ellipse">Elipse</option>
                </select>
            </div>
            <button class="button">Selecionar</button>
        </form>
        <form class="controls-shape-container" id="form-calculate">
            <div class="control-container">

                <?php echo $controls ?>

                <div class="control-color">
                    <label for="height">Cor:</label>
                    <input type="color" class="color" name="color" value="<?php echo isset($_GET['shape-calculate']) ? $color : '#005CC8' ?>">
                </div>
            </div>
            <input type="text" hidden name="shape-name" value="<?php echo $shapeName ?>">
            <button class="button" name="shape-calculate" id="form-calculate">Criar</button>
        </form>
    </main>

    <div class="container-result">
        <div class="result">
            <p>Perímetro é igual a <span class="perimeter"><?php echo round($perimeter, 2) ?>cm²</span></p>
        </div>
        <div class="shape">
            <div id="<?php echo $shapeName ?>"></div>
        </div>
    </div>

    <script src="js/script.js"></script>
    <?php echo isset($script) ? $script : ''; ?>

    </form>
</body>

</html>