<div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="registroModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de un nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form ng-cloack ng-submit="registrarUsuario(datos)">
                    <div class="form-row" style="padding-top: 7px;">
                        <div class="col">
                            <label for="nombre" style="margin-bottom: 18px;">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre o Nombres" ng-model="datos.nombre" required>
                        </div>
                        <div class="col">
                            <label for="ap" style="margin-bottom: 18px;">Apellido Paterno</label>
                            <input type="text" class="form-control" id="ap" placeholder="Apellido Paterno" ng-model="datos.ap" required >
                        </div>
                        <div class="col">
                            <label for="am" style="margin-bottom: 18px;">Apellido Materno</label>
                            <input type="text" class="form-control" id="am" placeholder="Apellido Materno" ng-model="datos.am" required>
                        </div>
                    </div>
                    <div class="form-row" style="margin-top:36px;">
                        <div class="col">
                            <label for="tel" style="margin-bottom: 18px;">Teléfono</label>
                            <input type="text" id="tel" class="form-control" placeholder="Numero de Télefono" ng-model="datos.number" required pattern="[0-9]{10}"> 
                        </div>
                        <div class="col">
                            <label for="mail" style="margin-bottom: 18px;">Correo Electrónico</label>
                            <input type="mail" id="mail" class="form-control" placeholder="Correo electrónico" ng-model="datos.mail" requiered pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        </div>
                        <div class="col">
                            <label for="sexoClient" style="margin-bottom: 13px;">Sexo</label>
                            <select class="form-control" data-style="btn btn-link" id="sexoClient" ng-model="datos.sex" required>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:36px;">
                        <label for="direccion" style="margin-bottom: 18px;">Direccion</label>
                        <textarea class="form-control" id="direccion" rows="3" ng-model="datos.direc" required pattern="[^'\x22]+"></textarea>
                    </div>
                    <div class="form-row" style="margin-top:36px;">
                        <div class="col">
                            <label for="departamento">Departamento</label>
                            <select class="form-control" data-style="btn btn-link" id="departamento" ng-model="datos.depto" required>
                            <?php
                                $categorias = new gestorCategorias();
                                $categorias ->getInfoCategorias(); 
                            ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Nivel de usuario</label>
                            <select class="form-control" data-style="btn btn-link"  ng-model="datos.nivel" required>
                                <?php
                                    $categorias = new gestorCategorias();
                                    $categorias ->getInfoCategoriasNiveles(); 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row " style="margin-top:36px;">
                        <div class="col">
                            <div class="containerFoto" id="containerFoto">

                            </div>
                            
                        </div>
                    </div>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Registrar</button>
            </div>
            </form>
        </div>
    </div>
</div>