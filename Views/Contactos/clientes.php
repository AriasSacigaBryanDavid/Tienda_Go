<?php include "Views/Templates/header.php";?>

    <div class="card-header card-header-a mb-2 text-white d-flex justify-content-between">
        <h4>CLIENTES</h4>
        <!--button de agregar clientes-->
        <button class="btn btn-a" type="button" onclick="frmCliente();"><i class="fas fa-user-plus text-white"></i></button>
    </div>
   
<!--tabla de clientes-->
<div class="table-responsive text-white">
    <table class="table table-a table-hover text-white" id="tblClientes">
        <thead class="table-a text-white">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Documento de Identidad</th>
                <th>Número de Identidad</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
            <tbody>
            </tbody>
    </table>
</div>

<!--formulario de agregar clientes-->
<div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header card-header-a">
                <h5 class="modal-title text-white" id="title">Nuevo Cliente</h5>
                <button type="button" class="btn text-white" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div> -->
            <div class="modal-body card-header-a text-white">
                <form method="post" id="frmCliente">
                    <div class="form-group d-flex justify-content-between">
                        <h4 class="modal-title text-white" id="title">Nuevo Cliente</h4>
                        <button class="btn card-header-a text-white" type="button" data-bs-dismiss="modal"><i class="fas fa-arrow-right"></i></button>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="hidden" id="id" name="id">
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del cliente">
                    </div>
                    <div class="form-group">
                        <label for="identidad">Documento de Identidad</label>
                            <select id="identidad" class="form-control" name="identidad">
                                <?php foreach ($data['identidades'] as $row) { ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="n_identidad">N° de Identidad</label>
                        <input id="n_identidad" class="form-control" type="text" name="n_identidad" placeholder="Registro Único de Contribuyentes">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input id="correo" class="form-control" type="text" name="correo" placeholder="Correo">
                    </div>
                    <div class="form-group mb-3">
                        <label for="direccion">Dirección</label>
                        <textarea id="direccion" class="form-control" name="direccion" placeholder="Dirección" rows="3"></textarea>
                    </div>
                    <button class="btn btn-b text-white" type="button" onclick="registrarCli(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-c text-white" type="button" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>