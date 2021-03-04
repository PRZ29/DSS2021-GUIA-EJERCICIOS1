<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-
scale=1.0,maximum-scale=1.0,minimum-scale=1.0" />
    <title>Numeros recibidos</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Nobile" />
    <link rel="stylesheet" href="css/tabla.css" />

</head>

<body background="img/fondo.jpg">
    <section>
        <article>
            <div id="info">
                <table id="hor-zebra" summary="Datos a convertir">
                    <thead>
                        <tr class="thead">
                            <th scope="col">Requerimientos de la lista:</th>
                            <th scope="col">Resultados:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            //definimos todas las variables con las respectivas asignaciones que usaremos
                            $contadorCeros=0;
                            $contadorNumerosTotales=0;
                                
                            //definimos las constantes
                            define("constantePorcentaje", "100");

                            //arreglo de numeros ingresados
                            $numerosIngresados=array();
                            
                            //definimos los arreglos que necesitaremos 
                            $numerosImpares=array();                           
                            $numerosNegativos=array();
                            $numerosParesPositivos=array();
                                              
                            if (isset($_POST['enviar'])) {
                                if (isset($_POST['ingresados'])) {
                                    $numerosIngresados =($_POST['ingresados']);
                                } else {
                                    $msgerr = "No hay numeros que procesar.";
                                }
                            }

                            $contadorNumerosTotales = count($numerosIngresados);

                            //primer foreach para obtener los datos de nuestro interes segun lo pedido en el ejercicio
                            foreach ($numerosIngresados as $clave => $valor) 
                            {   
                                //obtenemos los numeros iguales a cero y aumentamos su contador                                
                                if($valor == 0):
                                    $contadorCeros++;
                                endif;

                                //obtenemos los numeros negativos
                                if($valor < 0):
                                    $numerosNegativos[]=$valor;
                                endif;

                                //obtenemos los numeros q sin importar su signo sean un numero impar
                                if(($valor<0 || $valor>0) && $valor%2!=0):
                                    $numerosImpares[]=$valor;                                                                          
                                endif;

                                //obtenemos los numeros pares positivos
                                if($valor>0 && $valor%2==0):
                                    $numerosParesPositivos[]=$valor;                                       
                                endif;
                            }

                            /*------------------------------------------------------------------------------------------------------------*/

                            echo "\t\t<tr class=\"add\">\n";
                            echo "\t\t<td>Porcentaje de valores ceros en el listado ingresado.</td>";
                            //procesamos los numeros ceros que encontramos en los numeros que ingreso el usuario
                            $resultadoPorcentaje = ($contadorCeros * $contadorNumerosTotales)/constantePorcentaje;

                            //imprimimos por pantalla el porcentaje de numeros ceros
                            //primero verificamos si hubieron datos para mostrar un porcentaje
                            //sino se le indicara al usuario
                            if($resultadoPorcentaje != 0):
                                echo "\t\t<td>\n"."%".$resultadoPorcentaje."\n</td>\n";
                            else:
                                echo "\t\t<td>\n"."Lo sentimos, No hay ningun numero cero"."\n</td>\n";
                            endif;
                            echo "\n</tr>\n";

                            /*------------------------------------------------------------------------------------------------------------*/
                            
                            echo "\t<tr class=\"odd\">\n";
                            echo "\t\t<td>Valor promedio de los valores impares ingresados.</td>";
                            //sacamos la media de los valores impares, hacemos uso de la funcion especial
                            //array_sum, q nos permite sumar todos los valores de un array
                            $media = array_sum($numerosImpares)/$contadorNumerosTotales;
                            echo "\t\t<td>\n"."M ".$media."\n</td>\n";
                            echo "\n</tr>\n";
                            
                            /*------------------------------------------------------------------------------------------------------------*/
                            
                            echo "\t\t<tr class=\"add\">\n";
                            echo "\t\t<td>Lista de números negativos, ordenados de manera descendente.</td>";
                            //gracias al nuevo arreglo con solo numeros negativos, simplemente usamos la funcion especial
                            //de php (arsort) para ordenarlos de forma descendente
                            arsort($numerosNegativos);

                            //extraemos los nuemeros positivos ya ordenados de forma descendente con un nuevo foreach
                            echo "\t\t<td>\n";                           
                            //verificamos que el array que tendria los numeros positivos no este vacio
                            //si esta vacio se le indica al usuario sino se imprimen los numeros positivos
                            if(empty($numerosNegativos)):
                                echo 'Lo sentimos, No hay ningun numero negativo que mostrar';                                    
                            else:
                                foreach ($numerosNegativos as $clave => $negativo) 
                                { 
                                    //se imprime numero a numero
                                    echo $negativo.', ';                 
                                }
                            endif;                           
                            echo "\n</td>\n";
                            echo "\n</tr>\n";

                            /*------------------------------------------------------------------------------------------------------------*/

                            //extraemos los nuemeros pares positivos
                            
                            echo "\t<tr class=\"odd\">\n";
                            echo "\t\t<td>Menor y mayor de solamente los números pares positivos.</td>";
                            echo "\t\t<td>\n"; 
                            
                            if(empty($numerosParesPositivos)):
                                echo 'Lo sentimos, No hay ningun dato que mostrar';
                            else:
                                //para obtener el mayor de los pares positivos usamos la funcion especial max
                                //dicha fucnion recorre el arreglo buscando el mayor de todos los numeros dentro del mismo arreglo                         
                                echo 'Mayor: ' . max($numerosParesPositivos) . '<br>';
                                //para obtener el menor de los pares positivos usamos la funcion especial min
                                //dicha fucnion recorre el arreglo buscando el menor de todos los numeros dentro del mismo arreglo
                                echo 'Menor: ' . min($numerosParesPositivos); 
                            endif;                                                     
                            echo "\n</td>\n";
                            echo "\n</tr>\n";

                        ?>
                    </tbody>
                </table>
                <div id="link">
                    <a href="listanumeros.html" class="button-link">Ingresar nuevos numeros</a>
                </div>
            </div>
        </article>
    </section>
</body>

</html>