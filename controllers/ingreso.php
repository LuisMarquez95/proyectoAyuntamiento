<?php 
date_default_timezone_set('America/Mexico_City');
class IngresoAyuntmiento{
    public function ingresoControllerr(){
        $user = false;
        $password = false;
        $ingreso = false;
        $maximoIntentos = 3;
        $intentosDos = 0;
        if(isset($_POST['userInput'])){
            /*Verificar el usuario */
            if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['userInput'])){
                $user = true;
            }else{
                $user = false;
            }
            /*Verificar que la contraseña venga sin caracteres especiales */
            if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['passInput'])){
                $password = true;
            }else{
                $password = false;
            }
            /* Si los dos parametros son validos pasa al segundo proceso*/
            if($user == true && $password == true){
                // $passWord = crypt($_POST['passwordIngreso'], '$5$rounds=5000$usesomesillystringforsalt$');
                $datosController = Array(
                    "usuario" =>  $_POST['userInput'],
                    "pass" =>  $_POST['passInput']
                );
                /*Revisar que el usuario Existe*/
                $respuesta_usuario = IngresoSistemaModel::revisarModel($datosController, 'usuarios');
                if($respuesta_usuario){
                    /*Trae los intentos del usuario que ingresa*/
                    $intentos = IngresoSistemaModel::getIntentosModel($datosController, 'usuarios');
                    $intentosDos = $intentos['intentos'];
                    if($intentos['intentos'] <= 2){
                        /*Verificar el password*/
                        $verificar_pass =  IngresoSistemaModel::revisarPassModel($datosController, 'usuarios');
                        if($verificar_pass){
                            $ingreso = true;
                        }else{
                            $intentosDos ++;
                            $datosController = Array(
                                "usuario" =>  $_POST['userInput'],
                                "intentos" =>  $intentosDos
                            );
                            IngresoSistemaModel::intentosModel($datosController, 'usuarios');
                            echo "<br><div class=\"alert alert-danger\" role=\"alert\">La contraseña es incorrecta</div>";
                            /*Si los intentos exeden de 3*/
                            if($intentosDos == 3){
                                echo "<br><div class=\"alert alert-danger\" role=\"alert\">El usuario sera desactivado</div>";
                                $intentosDos = 0;
                                $datosController = Array(
                                    "usuario" =>  $_POST['userInput'],
                                    "intentos" =>  $intentosDos
                                );
                                IngresoSistemaModel::intentosModel($datosController, 'usuarios');
                                header('location:404'); // Aquí debe ir el captcha
                            }
                        }
                    }else{
                        echo "<br><div class=\"alert alert-danger\" role=\"alert\">Este usuario exedio el numero de intentos</div>";
                    }
                }else{
                    echo "<br><div class=\"alert alert-danger\" role=\"alert\">El usuario no existe</div>";
                }
            }else{
                echo "<br><div class=\"alert alert-danger\" role=\"alert\">El usuario o Contraseñas contienen caracteres no perminitos</div>";
            }

            if($ingreso){
                $datosController = Array(
                    "usuario" =>  $_POST['userInput'],
                    "pass" =>  $_POST['passInput']
                );
                $respuesta = IngresoSistemaModel::ingresoModel($datosController, 'usuarios');
               
                /*Si inicia seción se registra en un log el usuario que ingreso; */
                IngresoSistemaModel::logModel($datosController, 'usuarios');
                /*Iniciar variables de seción */
                session_start();
                $_SESSION['validar'] = true;
                $_SESSION['user'] = $respuesta['Nombre'];
                $_SESSION['nivel'] = $respuesta['nivel'];
                $_SESSION['foto'] = $respuesta['foto'];
                $_SESSION['depto'] = $respuesta['depto'];
                header("location:inicio");
            }
        }
    }
}