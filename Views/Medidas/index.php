<?php include "Views/Templates/header.php";?>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Medidas</li>
    </ol>
    <button class="btn btn-primary mb-2" type="button" onclick="frmMedida();"><i class="fas fa-plus"></i></button>
    <table class="table table-dark table-hover" id="tblMedidas">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Nom_corto</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <!--formulario de agregar medidas-->
    <div id="nuevo_medida" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="title">Nueva medidas</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                       <!-- <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmMedida">
                        <div class="form-group">
                            <label for="nombre">Nombre de Medidas</label>
                            <input type="hidden" id="id" name="id">
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Medidas">
                        </div>      
                        <div class="form-group mb-2">
                            <label for="nombre_corto">Abreviatura de Medidas</label>
                            <input id="nombre_corto" class="form-control" type="text" name="nombre_corto" placeholder="abreviatura">
                        </div>     
                        <button class="btn btn-primary" type="button" onclick="registrarMed(event);" id="btnAccion">Agregar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>         
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "Views/Templates/footer.php";?>
    
  