<?php include "Views/Templates/header.php";?>

    <div class="card-header card-header-a mb-2 text-white d-flex justify-content-between">
        <h4>USUARIOS</h4>
        <!--button de agregar usuario-->
        <button class="btn btn-a mb-2" type="button" onclick="frmUsuario();" ><i class="fas fa-user-plus text-white"></i></button>
    </div>
    <div class="table-responsive text-white">
        <table class="table table-a table-hover text-white" id="tblUsuarios">
            <thead class="table-a text-white">
                <tr>
                    <th>Id</th>
                    <th>Usuarios</th>
                    <th>Nombre</th>
                    <th>Caja</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header card-header-a">
                    <h5 class="modal-title text-white" id="title">Nuevo Usuario</h5>
                    <button type="button" class="btn text-white" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div> -->
                <div class="modal-body card-header-a text-white">
                    <form method="post" id="frmUsuario">
                        <div class="form-group d-flex justify-content-between">
                            <h4 class="modal-title text-white" id="title">Nuevo Usuario</h4>
                            <button class="btn card-header-a text-white" type="button" data-bs-dismiss="modal"><i class="fas fa-arrow-right"></i></button>
                            <!-- <button type="button" class="btn text-white" data-bs-dismiss="modal" aria-label="Close">X</button> -->
                        </div>
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="hidden" id="id" name="id">
                            <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                        </div>
                        <div class="row" id="contrasenas">
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contrasena">Contraseña</label>
                                    <input id="contrasena" class="form-control" type="password" name="contrasena" placeholder="Contraseña">
                                </div>    
                           </div> 
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirmar">Confirmar Contraseña</label>
                                    <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar contraseña">
                                </div>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" > 
                                    <label for="cargo">Cargo</label>
                                    <select id="cargo" class="form-control" name="cargo">
                                    <?php foreach ($data['cargos'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" > 
                                    <label for="almacen">Almacén</label>
                                    <select id="almacen" class="form-control" name="almacen">
                                    <?php foreach ($data['almacenes'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre Completo">
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group" > 
                                    <label for="identidad">Documento Identidad</label>
                                    <select id="identidad" class="form-control" name="identidad">
                                    <?php foreach ($data['identidades'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="n_identidad">Número de Identidad</label>
                                    <input id="n_identidad" class="form-control" type="text" name="n_identidad" placeholder="Número de Identidad">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input id="telefono" class="form-control" type="number" name="telefono" placeholder="Teléfono">
                        </div>
                        <div class="form-group">
                            <label for="correo">correo</label>
                            <input id="correo" class="form-control" type="email" name="correo" placeholder="Correo electrónico">
                        </div>
                        <div class="form-group mb-3">
                            <label for="direccion">Dirección</label>
                            <textarea id="direccion" class="form-control" name="direccion" placeholder="Dirección" rows="3"></textarea>
                        </div>

                        <button class="btn btn-b text-white" type="button" onclick="registrarUser(event);" id="btnAccion">Registrar</button>
                        <button class="btn btn-c text-white" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "Views/Templates/footer.php";?>