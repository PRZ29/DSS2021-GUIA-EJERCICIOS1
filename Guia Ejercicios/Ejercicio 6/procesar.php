<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-
scale=1.0,maximum-scale=1.0,minimum-scale=1.0" />
    <title>Información recibida</title>
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
                            <th scope="col">Resultado numero en binario:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            //definimos los arreglos
                            $resultadoResiduo=array();
                            
                            //definimos las constantes
                            define("constanteConversionNegativo", "-1");
                            define("const2", "2");

                            if(isset($_POST['submit']) && $_POST['submit'] == "Convertir"):
                            
                            //extraemos el numero en decimal para trabajar las conversiones
                            extract($_POST);    
                            $numeroConvertir =  $byte ;
                            echo "\t\t<td>\n$numeroConvertir\n</td>\n";

                            /*-------------------------------------------------------------------------------------------------*/

                                //si el numero decimal es 0, imprimimos el mismo cero porq cero en decimal a byte
                                //es el mismo cero.
                                if($numeroConvertir == 0):
                                    
                                    echo "\t\t<td>\n$numeroConvertir\n</td>\n";
                            
                            /*-------------------------------------------------------------------------------------------------*/        

                                //si tenemos un numero negativo, primero convertimos el numero negativo a positivo
                                elseif($numeroConvertir < 0):
                                    
                                    //conversion de negativo a positivo
                                    $nuevoNumero = $numeroConvertir * constanteConversionNegativo;

                                    //calculamos el binario del numero positivo
                                    echo "\t\t<td>\n";

                                         /*Creamos un array para ir almacenando los restos*/
                                        while ($nuevoNumero > 0)
                                        {
                                            /*efectuamos las divisiones entre 2*/
                                            $resultadoDiv=$nuevoNumero/const2; 
                                            
                                            /*Calculamos el residuo de cada division*/
                                            $residuo=$nuevoNumero%const2; 
                                            
                                            /*Almacenamos los residuos en el arreglo*/
                                            $resultadoResiduo[]=$residuo; 
                                            
                                            /*si el resultado de las divisiones no es entero exacto
                                            lo forzamos a serlo con la funcion especial intval que nos ayuda
                                            quitando los decimales*/
                                            $nuevoNumero=intval($resultadoDiv); 
                                        }
                                        /*como en las divisiones de conversion los ceros y unos resultantes se toman de el ultimo al primero
                                        necesitamos ordenarlo en forma descendente cada indice del arreglo, por lo q usamos la 
                                        funcion especial ksort para hacerlo*/
                                        krsort($resultadoResiduo); 
                                        
                                        //contamos el total de binarios resultantes
                                        $cantidadBinarios = count($resultadoResiduo);
                                       
                                        //recorremos ahora para sacar cada binario el arreglo con un foreach
                                        foreach ($resultadoResiduo as $clave => $valor) 
                                        { 
                                            //para crear los nibbles, preguntamos la cantidad de binarios y en base a eso
                                            //los partimos a la mitad
                                            if($cantidadBinarios > 4):
                                                
                                                //hacemos la conversion de cada byte, como el numero originalmente era un numero negativo
                                                //debemos invertir el resultado de cada numero binario a su contrario,por ejemplo
                                                //si el binario resutante es 0, entonces lo invertimos por un 1, o viceversa.
                                                if ($clave == 3):                                                    
                                                    if($valor == 0):
                                                        echo "<em>".'1'."</em>"." - "; /*Imprimimos el valor*/
                                                    elseif($valor == 1):
                                                        echo "<em>".'0'."</em>"." - "; /*Imprimimos el valor*/
                                                    endif;                                                                                         
                                                else:
                                                    if($valor == 0):
                                                        echo "<em>".'1'."</em>"; /*Imprimimos el valor*/
                                                    elseif($valor == 1):
                                                        echo "<em>".'0'."</em>"; /*Imprimimos el valor*/
                                                    endif;
                                                endif;

                                            else :

                                                if($valor == 0):
                                                        echo "<em>".'1'."</em>"; /*Imprimimos el valor*/
                                                    elseif($valor == 1):
                                                        echo "<em>".'0'."</em>"; /*Imprimimos el valor*/
                                                    endif;
                                            endif;
                                        }       
                                        echo "\n</td>\n";
                                

                            /*-------------------------------------------------------------------------------------------------*/

                                else:
                                    
                                    //si no existe ninguna restriccion, calculamos el numero tal cual lo ingreso el usuario
                                    echo "\t\t<td>\n";
                                        
                                        while ($numeroConvertir > 0)
                                        {
                                            /*efectuamos las divisiones entre 2*/
                                            $resultadoDiv=$numeroConvertir/const2; 
                                            
                                            /*Calculamos el residuo de cada division*/
                                            $residuo=$numeroConvertir%const2; 
                                            
                                             /*Almacenamos los residuos en el arreglo*/
                                            $resultadoResiduo[]=$residuo; 
                                            
                                            /*si el resultado de las divisiones no es entero exacto
                                            lo forzamos a serlo con la funcion especial intval que nos ayuda
                                            quitando los decimales*/
                                            $numeroConvertir=intval($resultadoDiv); 
                                        }
                                        /*como en las divisiones de conversion los ceros y unos resultantes se toman de el ultimo al primero
                                        necesitamos ordenarlo en forma descendente cada indice del arreglo, por lo q usamos la 
                                        funcion especial ksort para hacerlo*/
                                        krsort($resultadoResiduo); 
                                         
                                        //recorremos ahora para sacar cada binario el arreglo con un foreach
                                        foreach ($resultadoResiduo as $clave => $valor) 
                                        { 
                                            //para crear los nibbles, preguntamos la cantidad de binarios y en base a eso
                                            //los partimos a la mitad
                                            $cantidadBinarios = count($resultadoResiduo);

                                            if($cantidadBinarios > 4):
                                                if ($clave == 3):
                                                    echo "<em>".$valor."</em>"." - "; /*Imprimimos el valor*/                                      
                                                else: 
                                                    echo "<em>".$valor."</em>"; /*Imprimimos el valor*/
                                                endif;
                                            else:
                                                echo "<em>".$valor."</em>";/*Imprimimos el valor*/
                                            endif;
                                        }       
                                    echo "\n</td>\n";
                                
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
                    <a href="ingresobyte.html" class="button-link">Ingresar un Nuevo Byte en Decimal</a>
                </div>
            </div>
        </article>
    </section>
</body>

</html>