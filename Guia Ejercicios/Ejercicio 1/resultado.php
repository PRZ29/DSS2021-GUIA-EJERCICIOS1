<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Resultado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div>
        <hr>
        <?php
        if (isset($_POST['enviar'])) {
            $cap1 = $_POST['cap1'] ?? '';
            $cap2 = $_POST['cap2'] ?? '';
            $res1 = $_POST['res1'] ?? '';
            $res2 = $_POST['res2'] ?? '';
            $operacionCap = $_POST['selectCap'] ?? '';
            $operacionRes = $_POST['selectRes'] ?? '';
            $total;

            if ($cap1 == null && $cap2 == null) {
                if ($operacionRes == "serie"){
                    $total = $res1 + $res2;
                    echo "<p>La resistencia del circuito equivale a $res1 kΩ + $res2 kΩ</p>";
                    echo "<p>El total de resistencia electrica del circuito es: $total kΩ</p>";
                } else if ($operacionRes == "paralelo"){
                    $total = 1/((1/$res1) + (1/$res2));
                    echo "<p>La resistencia del circuito equivale a 1/((1/$res1 kΩ) + (1/$res2 kΩ))</p>";
                    echo "<p>El total de resistencia electrica del circuito es: $total kΩ</p>";
                }
            } else if ($res1 == null && $res2 == null) {
                if ($operacionCap == "serie"){
                    $total = ($cap1 * $cap2)/($cap1 + $cap2);
                    echo "<p>La capacitancia del circuito equivale a ($cap1 μF * $cap2 μF)/($cap1 μF + $cap2 μF)</p>";
                    echo "<p>El total de capacitancia electrica del circuito es: $total kΩ</p>";
                } else if ($operacionCap == "paralelo"){
                    $total = $cap1 + $cap2;
                    echo "<p>La capacitancia del circuito equivale a $cap1 μF + $cap2 μF</p>";
                    echo "<p>El total de capacitancia electrica del circuito es: $total μF</p>";
                }
            } 
        }

        ?>
        <hr>
    </div>
</body>
</html>