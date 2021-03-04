<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        $perisur = array($_POST['perisur1'], $_POST['perisur2'], $_POST['perisur3'], $_POST['perisur4']);
        $valle = array($_POST['valle1'], $_POST['valle2'], $_POST['valle3'], $_POST['valle4']);
        $lomas = array($_POST['lomas1'], $_POST['lomas2'], $_POST['lomas3'], $_POST['lomas4']);
    }

    echo "<table>";
    echo "<tr>";
    echo "<th>Agencia>></th>";
    echo "<th>Perisur</th>";
    echo "<th>Valle</th>";
    echo "<th>Lomas</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Trimestre 1</td>";
    echo "<td>$perisur[0]</td>";
    echo "<td>$valle[0]</td>";
    echo "<td>$lomas[0]</td>";
    echo "</tr>";
    echo "<td>Trimestre 2</td>";
    echo "<td>$perisur[1]</td>";
    echo "<td>$valle[1]</td>";
    echo "<td>$lomas[1]</td>";
    echo "</tr>";
    echo "<td>Trimestre 3</td>";
    echo "<td>$perisur[2]</td>";
    echo "<td>$valle[2]</td>";
    echo "<td>$lomas[2]</td>";
    echo "</tr>";
    echo "<td>Trimestre 4</td>";
    echo "<td>$perisur[3]</td>";
    echo "<td>$valle[3]</td>";
    echo "<td>$lomas[3]</td>";
    echo "</tr>";
    echo "</table>";

    echo "<h2>a) ¿Cuál fue el total anual de ventas de la agencia Lomas?</h2>";
    echo "<p>El total anual fue de: $" . array_sum($lomas) . "</p>";

    echo "<h2>b) ¿Cuál fue el promedio de ventas de Carro Fácil en el segundo trimestre del año?</h2>";
    $promedioT2 = ($perisur[1] + $valle[1] + $lomas[1]) / 3;
    echo "<p>El promedio de ventas en el segundo trimestre es de: $" . number_format($promedioT2, 2) . "</p>";

    echo "<h2>c) ¿Cuáles agencias superaron el promedio de ventas del tercer trimestre?</h2>";
    $promedioT3 = ($perisur[2] + $valle[2] + $lomas[2]) / 3;
    echo "<p>El promedio de ventas en el tercer trimestre es de: $" . number_format($promedioT3, 2) . " y fue superado por las agencias:</p>";
    if ($perisur[2] > $promedioT3) {
        echo "<p>Sucursal Perisur con ventas de: " . $perisur[2] . "</p>";
    }
    if ($valle[2] > $promedioT3) {
        echo "<p>Valle con ventas de: " . $valle[2] . "</p>";
    }
    if ($lomas[2] > $promedioT3) {
        echo "<p>Lomas con ventas de: " . $lomas[2] . "</p>";
    }

    echo "<h2>d) ¿En qué trimestre se registraron las menores ventas del año, considerando a todas las agencias?</h2>";
    $promedioT1 = ($perisur[0] + $valle[0] + $lomas[0]) / 3;
    $promedioT4 = ($perisur[3] + $valle[3] + $lomas[3]) / 3;
    $minT = min($promedioT1, $promedioT2, $promedioT3, $promedioT4);
    if ($minT == $promedioT1) {
        echo "<p>El menor promedio de ventas se registro el trimestre 1 con promedio de: " . $minT . "</p>";
    }; 
    if ($minT == $promedioT2) {
        echo "<p>El menor promedio de ventas se registro el trimestre 2 con promedio de: " . $minT . "</p>";
    };
     if ($minT == $promedioT3) {
        echo "<p>El menor promedio de ventas se registro el trimestre 3 con promedio de: " . $minT . "</p>";
    };
     if ($minT == $promedioT4) {
        echo "<p>El menor promedio de ventas se registro el trimestre 4 con promedio de: " . $minT . "</p>";
    };

    ?>
</body>
</html>