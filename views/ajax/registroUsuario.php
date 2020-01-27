<?php 
require_once "../../controllers/registroUsuarios.php";
require_once "../../models/registroUsuarios.php";

class Ajax{

    public $nombre;
    public $ap;
    public $am;
    public $foto;
    public $correo;
    public $numero;
    public $departamento;
    public $sexo;
    public $nivel;
    public $direccion;

    public function registarUsuario(){
        $datos = Array(
            'nombre' => $this->nombre,
            'ap' => $this->ap,
            'am' => $this->am,
            'foto' => $this->foto,
            'correo' => $this->correo,
            'numero' => $this->numero,
            'departamento' => $this->departamento,
            'sexo' => $this->sexo,
            'nivel' => $this->nivel,
            'direccion'=> $this->direccion
        );

        $response = gestorUsuarios::registrarUsuario($datos);

        echo $response;

    }
}
if(isset($_POST['nombre'])){
    $a = new Ajax();
    $a -> nombre = $_POST['nombre'];
    $a -> ap = $_POST['ap'];
    $a -> am = $_POST['am'];
    $a -> correo = $_POST['mail'];
    $a -> numero = $_POST['numero'];
    $a -> departamento = $_POST['depto'];
    $a -> sexo = $_POST['sex'];
    $a -> direccion = $_POST['direccion'];
    $a -> nivel = $_POST['nivel'];
    $a -> foto = $_FILES['foto']['tmp_name'];
    $a -> registarUsuario();

}