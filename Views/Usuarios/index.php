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
                <div class="modal-header card-header-a">
                    <h5 class="modal-title text-white" id="title">Nuevo Usuario</h5>
                    <button type="button" class="btn text-white" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmUsuario">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="hidden" id="id" name="id">
                            <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre Completo">
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
                        <div class="form-group mb-2" > 
                            <label for="caja">Caja</label>
                            <select id="caja" class="form-control" name="caja">
                            <?php foreach ($data['cajas'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['caja']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button class="btn btn-outline-primary" type="button" onclick="registrarUser(event);" id="btnAccion">Registrar</button>
                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "Views/Templates/footer.php";?>