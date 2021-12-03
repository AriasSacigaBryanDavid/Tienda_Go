<?php include "Views/Templates/header.php";?>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Usuarios</li>
    </ol>
    <button class="btn btn-primary mb-2" type="button" onclick="frmUsuario();" ><i class="fas fa-user-plus"></i></button>
    <table class="table table-dark " id="tblUsuarios">
        <thead class="thead-dark">
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
    <div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="title">Nuevo Usuario</h5>
                    <button type="button"    class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                        <!--<span aria-hidden="true">&times;</span>-->
                    </button>
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
                        <button class="btn btn-primary" type="button" onclick="registrarUser(event);" id="btnAccion">Registrar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "Views/Templates/footer.php";?>