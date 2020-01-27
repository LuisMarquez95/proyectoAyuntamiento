<?php
class gestorCategorias{
    static public function getInfoCategorias(){
        $respuesta = CtaerogiarClass::getCategoriesAll();
        foreach($respuesta as $key => $value){
            echo "<option value=".$value['id'].">".$value['Nombre_departamento']."</option>";
        }
    }
    static public function getInfoCategoriasNiveles(){
        $respuesta = CtaerogiarClass::getNivelesAll();
        foreach($respuesta as $key => $value){
            echo "<option value=".$value['id'].">".$value['categoria']."</option>";
        }
    }
}
