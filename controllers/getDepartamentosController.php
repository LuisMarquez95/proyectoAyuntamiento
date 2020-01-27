<?php
header("Content-Type: text/html;charset=utf-8");
class gestorCategorias{
    static public function getInfoCategorias(){
        $respuesta = CtaerogiarClass::getCategoriesAll();
        foreach($respuesta as $key => $value){
            echo "<option value=".$value['id'].">".utf8_encode($value['Nombre_departamento'])."</option>";
        }
    }
    static public function getInfoCategoriasNiveles(){
        $respuesta = CtaerogiarClass::getNivelesAll();
        foreach($respuesta as $key => $value){
            echo "<option value=".$value['id'].">".utf8_encode($value['categoria'])."</option>";
        }
    }
}
