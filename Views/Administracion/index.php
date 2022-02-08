<?php include "Views/Templates/header.php";?>
<div class="card">
    <div class="card-header bg-dark text-white">
            <h4>Datos de la empresa</h4>
    </div>
    <div class="card-body">
        <form id="frmEmpresa">
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <input id="id" class="form-control" type="hidden" name="id" value="<?php echo $data['id'] ?>">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ruc">RUC</label>
                        <input id="ruc" class="form-control" type="text" name="ruc" placeholder="Registro Único de Contribuyente" value="<?php echo $data['ruc'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono" value="<?php echo $data['telefono'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <textarea id="direccion" class="form-control" name="direccion" placeholder="Dirección" rows="3"><?php echo $data['direccion'] ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" class="form-control" name="mensaje" placeholder="Mensaje" rows="3"><?php echo $data['mensaje'] ?></textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="button" onclick="modificarEmpresa()">Modificar</button>
        </form>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>
