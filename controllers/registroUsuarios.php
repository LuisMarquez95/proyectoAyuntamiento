<?php 

class gestorUsuarios {
    static public function registrarUsuario($datos){
        /*Generar el usuario para ingreso al portal*/
        $usuario = '';
        $pasword = '';
        $succes = false;
        /*Validar que los datos del usuario son correctos*/
        $regexMail ="/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/";
        $regexNombre = '/^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.-]+$/';
        $regexDireccion = '/^[ A-Z0-9a-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.-]+$/';
        $regexTel = '/^[0-9]{10}$/';
        $regexDepto = '/^[0-9]$/';
        #-- Validar email --- #
        if(preg_match($regexMail, $datos['correo'])){
            if(preg_match($regexNombre, $datos['nombre'])){
                if(preg_match($regexNombre, $datos['ap'] )){
                    if(preg_match($regexNombre, $datos['am'])){
                        if(preg_match($regexDepto, $datos['departamento'])){
                            if(preg_match($regexDireccion, $datos['direccion'])){
                                if(preg_match($regexDepto, $datos['departamento'])){
                                    if($datos['sexo'] == 1 || $datos['sexo'] == 2){
                                        if(preg_match($regexTel, $datos['numero'])){
                                            $succes = true;
                                        }else{
                                            echo "Numero de teléfono invalido";
                                        }
                                    }else{
                                        echo "Parametro de sexo invalido";
                                    }
                                }else{
                                    echo "Parametro de departamento";
                                }
                            }else{
                                echo "direccion Invalida";
                            }
                        }else{
                            echo "Departamento Invalido";
                        }
                    }else{
                        echo "Apellido materno invalido";
                    }
                }else{
                    echo "Apellido Invalido";
                }
            }else{
                echo "Nombre invalido";
            }
        }else{
            $succes = false;
        }
        if($succes == true){
            $partOne = substr($datos['nombre'], 0, 2);
            $partTwo = substr($datos['ap'], 0, 2);
            $partTree =substr($datos['am'], 0, 2);

            $usuario = $partOne.$partTwo.$partTree-mt_rand();
            $pasword = crypt($usuario.mt_rand(100,900).$usuario."AyntL".mt_rand(), '$5$rounds=5000$usesomesillystringforsalt$');
            /// Obtener los datos de la imagen
            if($datos['foto'] != null){
                list($ancho, $alto) = getimagesize($datos['foto']);
                if($ancho < 400 || $alto < 300){
                    echo 0;
                }else{
                    $aleatorio = mt_rand(100, 999);
                    $ruta = '../../views/imgUsers/'.$aleatorio.".jpg";
                    $origen = imagecreatefromjpeg($datos['foto']);
                    #imagecrop() ---> recorta las imagenes al tamaño especificado
                    $destino = imagecrop($origen, ['x'=>0, 'y'=>0, 'width'=>620, 'height'=>620]);

                    imagejpeg($destino, $ruta);

                    $imagen = $ruta;
                }
            }else{
                $imagen = '../../views/imgUsers/avatar.jpg';
            }
                $respuesta = gestorUsuariosModel::guardarRegistroModel($datos, $imagen, 'empleados');
                $respuestaTwo = gestorUsuariosModel::registrarUsuarios($datos, $usuario, $pasword, $respuesta['id'], 'usuarios');
                
                echo $respuestaTwo;
            
        }else{
            echo false;
        }
    }
    /*Mostrar registros de los usuarios*/
    static public function getUsuariosRegistrados(){
        $respuesta = gestorUsuariosModel::getUsuarios('empleados');
        /*Si necesitas agregar el id para poder editar el registro o eliminarlo o*/
        foreach($respuesta as $key => $item){
            echo '<tr>
                               
            <td class="text-center">'.($key+1).'</td>
            <td>'.$item['Nombre'].'</td>
            <td>'.$item['ap'].'</td>
            <td>'.$item['am'].'</td>
            <td>'.$item['nombre_usuario'].'</td>
            <td>'.$item['Nombre_departamento'].'</td>
            <td>'.$item['categoria'].'</td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" class="btn btn-success btn-round" style="height: 26px;">
                    <i class="material-icons" style="top: 10px;">edit</i>
                </button>
                <button type="button" rel="tooltip" class="btn btn-danger btn-round" style="height: 26px;">
                    <i class="material-icons" style="top: 10px;">close</i>
                </button>
            </td>
        </tr>';
        }
    }
    

    /*Obtener la fecha de registro*/
    static public function getFech(){
        /*Funcion para obtener la ultima Fecha*/
        function getElapsedTime($datetime){
            if( empty($datetime) )
            {
                  return;
            }
       
            
            $strTime = ( is_object($datetime) ) ? $datetime->format('Y-m-d H:i:s') : $datetime;
       
            $time = strtotime($strTime);
            $time = time() - $time;
            $time = ($time<1)? 1 : $time;
       
            $tokens = array (
                  31536000 => 'año',
                  2592000 => 'mes',
                  604800 => 'semana',
                  86400 => 'día',
                  3600 => 'hora',
                  60 => 'minuto',
                  1 => 'segundo'
            );
       
            foreach ($tokens as $unit => $text)
            {
                  if ($time < $unit) continue;
                  $numberOfUnits = floor($time / $unit);
                  $plural = ($unit == 2592000) ? 'es' : 's';
                  return $numberOfUnits . ' ' . $text . ( ($numberOfUnits > 1) ? $plural : '' );
            }
          }
        $respuesta = gestorUsuariosModel::getFechaRegistro('usuarios');
        foreach($respuesta as $key => $value){
            echo '<p>Ultimo registro hace  '.getElapsedTime($value['ultimo']).'</p>';
        }
    }
}