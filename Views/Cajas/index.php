<?php include "Views/Templates/header.php";?>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Cajas</li>
    </ol>

    <button class="btn btn-primary m-2" type="button" onclick="frmCaja();"><i class="fas fa-plus"></i></button>

    <table class="table table-dark table-hover" id="tblCajas">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Caja</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <!--formulario de agregar caja-->

    <div id="nuevo_caja" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark" >
                    <h5 class="modal-title text-white" id="title">Nuevo Caja</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                       <!-- <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" id="frmCaja">
                        <div class="form-group mb-2">
                            <label for="caja">Nombre de Caja</label>
                            <input type="hidden" id="id" name="id">
                            <input id="caja" class="form-control" type="text" name="caja" placeholder="Caja">
                        </div>
                        <button class="btn btn-primary" type="button" onclick="registrarCaj(event);" id="btnAccion">Agregar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "Views/Templates/footer.php";?>