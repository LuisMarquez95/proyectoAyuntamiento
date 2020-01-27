<?php 

class gestorUsuarios {
    static public function registrarUsuario($datos){
        /*Generar el usuario para ingreso al portal*/
        $usuario = '';
        $pasword = '';
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
            $destino = imagecrop($origen, ['x'=>0, 'y'=>0, 'width'=>400, 'height'=>300]);

            imagejpeg($destino, $ruta);

            $imagen = $ruta;
            $respuesta = gestorUsuariosModel::guardarRegistroModel($datos, $imagen, 'empleados');
            $respuestaTwo = gestorUsuariosModel::registrarUsuarios($datos, $usuario, $pasword, 'usuarios');
            
            echo $respuesta;

        }
    }
}