<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-
scale=1.0,maximum-scale=1.0,minimum-scale=1.0" />
    <title>evaluacion de numeros</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Nobile" />
    <link rel="stylesheet" href="css/tabla.css" />

</head>

<body>
    <section>
        <article>
            <div id="info">
                <table id="hor-zebra" summary="Datos a convertir">
                    <thead>
                        <tr class="thead">
                            <th scope="col">Numero Ingresado:</th>
                            <th scope="col">Resultado del numero ingresado:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            if(isset($_POST['submit']) && $_POST['submit'] == "Comprobar"):
                               
                                //extraemos el numero introducido por el usuario
                                extract($_POST);    
                                $numeroEntero = !empty($numero) ? $numero : "<a href=\"ingresodatos.html\">No ingresó el numero</a>";
                                echo "\t\t<td>\n$numeroEntero\n</td>\n";
                                
                                //evaluamos q realmente el numero introducido sea un entero positivo
                                if(floatval($numeroEntero)>0):
                                
                                    //condicionamos que el numero realmente sea un entero positivo primo
                                    if((($numeroEntero/$numeroEntero)==1)&&(($numeroEntero/1)==$numeroEntero)&&($numeroEntero%2!=0)):

                                        echo "\t<td>\n" . "¡Si es un numero Primo!" . "\n</td>\n";
                                    else:
                                        //declaramos un contador que nos ayudara a encontrar uno a uno todos los numeros
                                        //por los cuales el numero que no es primo puede ser divido
                                        $contador = 1;

                                        //si no cumplio con el filtro de numeros primos, se le indica al usuario
                                        //que el numero que ingreso no es primo y que puede ser dividido por
                                        echo "\t<td>\n" ."<b>"."¡NO es un numero Primo!"."</b>"."<br>"."El numero: "."<b>" .$numeroEntero ."</b>".", " ." Tambien es divisible entre: " ."\n</td>\n";
                                        echo "\t<tr class=\"odd\">\n";
                                        echo "\t<td>\n" . "\n</td>\n";
                                        echo "\t<td>\n";
                                        
                                        //colocamos un pequeño bucle que continue buscando todos los numeros divisbles entre el numero
                                        //que ingreso el usuario con la ayuda del contador el cual por cada ciclo incrementa su valor 
                                        //hasta llegar al numero que sea identico al numero ingresado
                                        while ($contador!=$numeroEntero){
                                            if ($numeroEntero % $contador == 0)
                                                echo "<b>".$contador.", "."</b>";
                                                $contador++;
                                        }
                                        echo "\n</td>\n";
                                        echo "\t</tr>\n";
                                    endif;
                                    echo "\t</tr>\n";                           
                                endif;
                            else:
                                echo "\t<tr class=\"odd\">\n";
                                echo "\t\t<td>No se han ingresado desde el formulario.</td>";
                                echo "\t</tr>\n";
                            endif;
                        ?>
                    </tbody>
                </table>
                <div id="link">
                    <a href="ingresodatos.html" class="button-link">Ingresar un Nuevo Numero</a>
                </div>
            </div>
        </article>
    </section>
</body>

</html>