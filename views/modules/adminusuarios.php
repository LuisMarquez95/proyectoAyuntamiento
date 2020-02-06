<?php
session_start();
if (!$_SESSION['validar']){
    header("location:ingreso");
    exit();
}
include "views/modules/barra_menu.php";
?>
<div class="main-panel">
<?php include "views/modules/header.php"; ?>
    <div class="content">
        <!-- Cards for registrer-->
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="card card-nav-tabs text-center">
                    <div class="card-header card-header-success">
                    Reigstrar un nuevo Usario
                    </div>
                    <div class="card-body">
                       
                        <p class="card-text">Recuerda que es necesario llenar todos los campos</p>
                        <a  class="btn btn-success" data-toggle="modal" data-target="#registroModal" style="color:white;">Registrar</a>
                        
                    </div>
                    <div class="card-footer text-muted">
                        <?php
                            $usuarios = new gestorUsuarios();
                            $usuarios-> getFech(); 
                        ?> 
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="card card-nav-tabs text-center">
                    <div class="card-header card-header-info">
                    Reigstrar un nuevo Departamento
                    </div>
                    <div class="card-body">
                        <p class="card-text">Recuerda que es necesario llenar todos los campos</p>
                        <a href="#0" class="btn btn-info">Registrar</a>
                    </div>
                    <div class="card-footer text-muted">
                        ultimo registro 2 days ago
                    </div>
                </div>
            </div>
        </div>
        
        <!-- DatatTable for data user registrer-->
        <div class="row">
            <div class="col-12">
                <div class="card card-nav-tabs text-center">
                    <div class="card-header card-header-primary">
                        Usuarios registrados
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Usuario</th>
                                    <th>Departamento</th>
                                    <th>Categoria</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $usuarios = new gestorUsuarios();
                                    $usuarios->getUsuariosRegistrados(); 
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
            </div>
        </div>

        <!--Modal de registro del usuario -->
        <?php include_once 'views/modal/modal_registro_usuario.php' ?>
        
    </div>
</div>
 