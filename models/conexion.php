<?php
class Conexion{
    static public function Conectar(){
        $link = new PDO("mysql:host=localhost;dbname=ayuntamiento", "root", "");
        return $link;
    }
}