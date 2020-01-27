<?php 
/*Debemos especificar la zona horaria*/
date_default_timezone_set('America/Mexico_City');
class IngresoSystema{
    /*Funcion de ingreso al panel de control*/
    public function IngresoController(){
        $user = false;
        $password = false;
        $ingreso = false;
        $maximoIntentos = 3;
        if(isset($_POST['usuarioIngreso'])){
            /*Verificar el usuario que venga sin caracteres especiales*/
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['usuarioIngreso'])){
                $user = true;
            }else{
                $user = false;
            }

            /* Verificar que la contraseña venga sin caracteres especiales */
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['passwordIngreso'])){
                $password = true;
            }else{
                $password = false;
            }

            /* Si todo sale bien las validaciones puede pasar
                al siguiente nivel
             */ 
            if($user == true && $password == true){
                
                /* Arreglo de datos del usuario*/
                $datosController = Array(
                    "usuario" => $_POST['usuarioIngreso'],
                    "pass" => $_POST['passwordIngreso']
                );

                $respuesta_usuario = IngresoSistemaModel::revisarModel($datosController, 'usuarios');
                /*Trae los intentos que ha hecho el usuario por ingresar al sistema*/
                $respuesta = IngresoSistemaModel::getIntentosModel($datosController, 'usuarios');
                $intentos = $respuesta['intentos']; // Igualamos la variable de intentos para poder ser utilizada
                if(empty($respuesta_usuario)){ // Si el arreglo de respuesta usuario esta vacio quiere decir que no existe el usuario que intenta ingresar
                    $ingreso = false;
                    echo "<br><div class=\"alert alert-danger\" role=\"alert\">No hemos podido encontrar el usuario que nos solicitas</div>";
                } 
                /*En el caso contrario entra en esta sección*/
                else{
                    $respuesta_usuarioPass = IngresoSistemaModel::revisarPassModel($datosController, 'usuarios');
                    if($respuesta_usuarioPass == true){
                        $ingreso = true;
                    }else{
                        $intentos ++;
                        $datosController = Array(
                            "usuario" => $_POST['usuarioIngreso'],
                            "intentos" => $intentos
                        );
                        /*En caso de ser incorrecta la contraseña ingresa un intento fallido*/
                        IngresoSistemaModel::intentosModel($datosController, 'usuarios');
                        echo "<br><div class=\"alert alert-danger\" role=\"alert\">El password que ingresas no es el correcto</div>";
                        if($intentos == 3){
                            $intentos = 0;
                            $datosController = Array(
                                "usuario" =>  $_POST['usuarioIngreso'],
                                "intentos" =>  $intentos
                            );
                           
                            IngresoSistemaModel::intentosModel($datosController, 'users');
                            header('location:404'); // Aquí debe ir el captcha
                        }

                    }
                }  
                if($ingreso == true){
                    /*Otener los datos necesarios del inicio de sesión */
                    $respuesta = IngresoSistemaModel::ingresoModel($datosController, 'usuarios');
                    if($respuesta == false){
                        echo "<br><div class=\"alert alert-danger\" role=\"alert\">No existen datos para el inicio de seción contacta con soporte</div>";
                    }else{
                        if($respuesta['usuario'] == $_POST['usuarioIngreso'] && $respuesta['pass'] == $_POST['passwordIngreso'] && $intentos < $maximoIntentos){
                            $intentos = 0;
                            $datosController = Array(
                                "usuario" =>  $_POST['usuarioIngreso'],
                                "intentos" =>  $intentos
                            );
                           
                            IngresoSistemaModel::intentosModel($datosController, 'usuarios');
                            /*Si inicia seción se registra en un log el usuario que ingreso; */
                            $res_login = IngresoSistemaModel::logModel($datosController, 'usuarios');
                            /*Iniciar variables de seción */
                            session_start();
                            $_SESSION['validar'] = true;
                            $_SESSION['usuario'] = $respuesta['nombre']. '-' . $respuesta['ap'];
                            $_SESSION['id'] = $respuesta['id'];
                            $_SESSION['foto'] = $respuesta['foto'];
                            $_SESSION['email'] = $respuesta['correo'];
                            $_SESSION['rol'] = $respuesta['rol'];
                            header("location:inicio");

                        }else{
                            echo "<br><div class=\"alert alert-danger\" role=\"alert\">Por favor revisa tu ingreso</div>"; 
                        }
                    }
                }                                      
            }

        }
    }
}