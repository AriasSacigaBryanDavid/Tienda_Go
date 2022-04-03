<?php include "Views/Templates/header.php";?>
    

    <div class="card-header card-header-a mb-2 text-white d-flex justify-content-between">
        <h4>ALMACENES</h4>
        <!--button de agregar almacen-->
        <button class="btn btn-a" type="button" onclick="frmAlmacen();"><i class="fas fa-plus text-white"></i></button>
    </div>
    
    <!--tabla de almacenes-->
    <div class="table-responsive text-white">
        <table class="table table-a table-hover text-white" id="tblAlmacenes">
            <thead class="table-a text-white">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Encargado</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!--formulario de agregar almacenes-->
    <div id="nuevo_almacen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header card-header-a">
                    <h5 class="modal-title text-white" id="title">Nueva almacén</h5>
                    <button type="button" class="btn text-white" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div> -->
                <div class="modal-body card-header-a text-white">
                    <form method="post" id="frmAlmacen">
                        <div class="form-group d-flex justify-content-between">
                            <h4 class="modal-title text-white" id="title">Nueva almacén</h4>
                            <button class="btn card-header-a text-white" type="button" data-bs-dismiss="modal"><i class="fas fa-arrow-right"></i></button>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre de Almacén</label>
                            <input type="hidden" id="id" name="id">
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Almacén">
                        </div>      
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <textarea id="direccion" class="form-control" name="direccion" placeholder="Dirección" rows="3"></textarea>
                        </div>  
                        <div class="form-group" > 
                            <label for="usuario">Encargado</label>
                                <select id="usuario" class="form-control" name="usuario">
                                    <?php foreach ($data['usuarios'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                    <?php } ?>
                                </select>
                        </div>    
                        <button class="btn btn-b text-white" type="button" onclick="registrarAlm(event);" id="btnAccion">Agregar</button>
                        <button class="btn btn-c text-white" type="button" data-bs-dismiss="modal">Cancelar</button>         
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "Views/Templates/footer.php";?>