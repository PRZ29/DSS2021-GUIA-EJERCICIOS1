<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Secuencia Fibonnacci</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

<div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Ingresar Valor Máximo de Secuencia:
        <input type="number" name="limite">
        <br><br>
        <input type="submit">
        <br>
    </form>
    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $n1 = 0;
        $n2 = 1;
        $actual = 0;
        $counter = 0;
        $concat;
        $limite = $_POST['limite'];
        if (strlen($_POST['limite']) == 0) {
            echo "Por favor ingrese un valor.";
        } else if ($limite < 0) {
            echo "No se puede calcular la secuencia con un valor negativo.";
        } else {
            do {
                if ($limite == 0) {
                    $concat = "$n1 ";
                    $counter = $counter + 1;
                } else if ($counter == 0) {
                    $concat = "$n1 $n2 ";
                    $counter = $counter + 2;
                }
                $n3 = $n2 + $n1;
                $actual = $n3;
                if ($actual <= $limite) {
                    $concat = $concat . "$n3 ";
                    $counter = $counter + 1;
                }
                $n1 = $n2;
                $n2 = $n3;
            } while ($actual <= $limite);

            echo "<br>";
            echo "Los $counter terminos de Fibonnacci hasta $limite son: ";
            echo $concat;
            echo "<br><br>";
        }
    }
    ?>
</div>
 <br>

</body>

</html>