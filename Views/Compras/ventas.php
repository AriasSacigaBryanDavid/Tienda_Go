<?php include "Views/Templates/header.php";?>
    <div class="card">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Nueva Venta</h4>
            </div>
        </div>
        <div class="card-body">
            <form id="frmVenta">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="codigo"><i class="fas fa-barcode"></i>Código de barras</label>
                            <input type="hidden" id="id" name="id">
                            <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código de barras" onkeyup="buscarCodigoV(event)">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="nombre">Descripción</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Descripción" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="calcularPrecio(event)" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="precio">Precio de Venta </label>
                            <input id="precio" class="form-control" type="text" name="precio" placeholder="Precio de Venta" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sub_total">Sub Total </label>
                            <input id="sub_total" class="form-control" type="text" name="sub_total" placeholder="Sub Total" disabled>
                        </div>
                    </div>
                   

                </div>

            </form>
            
        </div>
    </div>
    <table class="table table-dark table-hover">
        <thead class="thead-dark">
            <tr>
                 <th>ID</th>
                 <th>Descripción</th>
                 <th>Cantidad</th>
                 <th>Precio</th>
                 <th>Sub Total</th>
                 <th></th>
            </tr>
        </thead>
        <tbody id="tblDetalle">
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="cliente"><i class="fas fa-users"></i> Buscar Cliente</label>
                <input id="cliente" class="form-control" type="text" name="cliente" placeholder="Nombre">
                <input type="hidden" id="id" name="id">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="telefono"><i class="fas fa-phone"></i> Teléfono</label>
                <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono" disabled>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="direccion"><i class="fas fa-home"></i> Dirección</label>
                <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Dirección" disabled>
            </div>
        </div>
        <div class="col-md-3">
                <div class="form-group">
                <label for="total" class="font-weight-bold">Total </label>
                <input id="total" class="form-control" type="text" name="total" placeholder="Total" disabled>
                <button class="btn btn-primary mt-2 btn-block" type="button" onclick="generarVenta()">Generar venta</button>
                <button class="btn btn-danger mt-2 btn-block" type="button" onclick="CancelarVenta()">Cancelar Venta</button>
                </div>
        </div>

    </div>
<?php include "Views/Templates/footer.php";?>