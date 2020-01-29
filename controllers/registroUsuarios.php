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
        $regexDireccion = '/^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.-]+$/';
        $regexTel = '/^[0-9]{10}$/';
        $regexDepto = '/^[0-9]$/';
        #-- Validar email --- #
        if(preg_match($regexMail, $datos['correo'])){
            if(preg_match($regexNombre, $datos['nombre'])){
                if(preg_match($regexNombre, $datos['ap'] )){
                    if(preg_match($regexNombre, $datos['am'])){
                        if(preg_match($regexDepto, $datos['departamento'])){
                            if(preg_match($regexNombre, $datos['direccion'])){
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

            $usuario = $partOne.$partTwo.$partTree;
            $pasword = $usuario.mt_rand(100,900).$usuario."AyntL".mt_rand(); 
            /// Obtener los datos de la imagen
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
                $respuesta = gestorUsuariosModel::guardarRegistroModel($datos, $imagen, 'empleados');
                $respuestaTwo = gestorUsuariosModel::registrarUsuarios($datos, $usuario, $pasword, $respuesta['id'], 'usuarios');
                
                echo $respuestaTwo;
            }
        }else{
            echo false;
        }
    }
    /*Mostrar registros de los usuarios*/
    /*static public function getUsuariosRegistrados(){
        $respuesta = gestorUsuariosModel::getUsuarios('usuarios');
    }*/
}