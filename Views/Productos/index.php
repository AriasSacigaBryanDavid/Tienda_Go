<?php include "Views/Templates/header.php";?>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Productos</li>
    </ol>
    <button class="btn btn-primary mb-2" type="button" onclick="frmProducto();"><i class="fas fa-plus"></i></button>

    <table class="table table-dark" id ="tblProductos">
        <thead class="thead-light">
            <tr>
                <th>Id</th>
                <th>Imagen</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Media</th>
                <th>categoria</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <!--formulario de agregar productos-->
    <div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="title">Agregar Productos</h5>
                    <button type="button"  class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                            <!--<span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmProducto">
                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="codigo">Código de Productos</label>
                                    <input type="hidden" id="id" name="id">
                                    <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código de Productos">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción">
                                </div>
                            </div>
                            <div class="col-md-6" id="precios_compras">
                                <div class="form-group">
                                    <label for="precio_compra">Precio Compra</label>
                                    <input id="precio_compra" class="form-control" type="text" name="precio_compra" placeholder="Precio compra">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="precio_venta">Precio Venta</label>
                                    <input id="precio_venta" class="form-control" type="text" name="precio_venta" placeholder="Precio Venta">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="medida">Medidas</label>
                                    <select id="medida" class="form-control" name="medida">
                                        <?php foreach ($data['medidas'] as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria">categorias</label>
                                    <select id="categoria" class="form-control" name="categoria">
                                        <?php foreach ($data['categorias'] as $key => $row) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label >Imagen</label>
                                <div class="card border-primary">
                                    <div class="card-body">
                                        <label for="imagen"  id="icon-image" class="btn btn-primary mb-2"><i class="fas fa-image"></i></label>
                                        <span id="icon-cerrar"></span>
                                        <input id="imagen" class="d-none" type="file" name="imagen" onchange="preview(event)">
                                        <input type="hidden" id="imagen_actual" name="imagen_actual"> 
                                        <img class="img-thumbnail" id="img-preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="button" onclick="registrarProduc(event);" id="btnAccion">Agregar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>



                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "Views/Templates/footer.php";?>