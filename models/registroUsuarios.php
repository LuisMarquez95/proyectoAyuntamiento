<?php

require_once 'conexion.php';

class gestorUsuariosModel{
    static public function guardarRegistroModel($datos, $imagen, $tabla){
        
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Nombre, Ap, Am, telefono, correo, direccion, sexo, estatus,foto) 
        VALUES (:nombre, :ap, :am, :telefono, :correo, :direccion, :sexo, 1, :foto)");
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':ap', $datos['ap'], PDO::PARAM_STR);
        $stmt->bindParam(':am', $datos['am'], PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $datos['numero'], PDO::PARAM_INT);
        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $datos['sexo'], PDO::PARAM_INT);
        $stmt->bindParam(':foto', $imagen, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $datos['direccion'], PDO::PARAM_STR);
        if($stmt->execute()){
            $pdo = Conexion::conectar()->prepare("SELECT MAX(id) AS id FROM empleados");
            $pdo->execute();
            return $pdo->fetch();
        }else{
            return false;
        }
        
    }

    static public function registrarUsuarios($datos, $user, $pass, $id_empleado, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
        (nombre_usuario, pass, nivel_usuario, correo, telefono, departamento, fecha_registro, intentos, fecha_ultimo_login, activo, id_empleado) 
        VALUES (:user, :pas, :nivel, :correo, :telefono, :departamento, current_timestamp, 0, current_timestamp, 1, :idemple)");
        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->bindParam(':pas', $pass, PDO::PARAM_STR);
        $stmt->bindParam(':nivel', $datos['nivel'], PDO::PARAM_INT);
        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $datos['numero'], PDO::PARAM_STR);
        $stmt->bindParam(':departamento', $datos['departamento'], PDO::PARAM_STR);
        $stmt->bindParam(':idemple', $id_empleado, PDO::PARAM_INT);
        try{
            
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }catch( PDOException $Exception ) {
           return false;
        }
    }

   static public function getUsuarios($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT 
        us.Nombre,
        us.ap,
        us.am,
        usu.nombre_usuario,
        dep.Nombre_departamento,
        niv.categoria
        FROM $tabla us
        LEFT JOIN usuarios usu ON usu.id_empleado = us.id
        LEFT JOIN cat_departamentos as dep ON usu.departamento = dep.id
        LEFT JOIN cat_niveles as niv ON niv.id = usu.nivel_usuario");
        try{
            
            if($stmt->execute()){
                return $stmt->fetchAll();
            }else{
                return false;
            }
        }catch( PDOException $Exception ) {
           return false;
        }
    }
    /*Obtener la ultima fecha de registro */
    static public function getFechaRegistro($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT fecha_registro as ultimo FROM $tabla ORDER by fecha_registro desc limit 1");
        try{
            if($stmt->execute()){
                return $stmt->fetchAll();
            }else{
                return false;
            }
        }catch(PDOException $Exception){
            return false;
        }
    }
}
/* 	nombre_usuario	pass	nivel_usuario	correo	telefono	departamento	fecha_registro	intentos	fecha_ultimo_login	activo
*/