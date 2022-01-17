<?php include "Views/Templates/header.php";?>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Categorias</li>
    </ol>
    <button class="btn btn-primary mb-2" type="button" onclick="frmCategoria();"><i class="fas fa-plus"></i></button>
    <table class="table table-dark table-hover" id="tblCategorias">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>nombre</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <!--formulario de agregar categorias-->
    <div id="nuevo_categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="title">Nuevo Categoria</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                         <!--<span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmCategoria">
                        <div class="form-group mb-2">
                            <label for="nombre">Nombre de Categoria</label>
                            <input type="hidden" id="id" name="id">
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Categoria">
                        </div>
                        <button class="btn btn-primary" type="button" onclick="registrarCateg(event);" id="btnAccion">Agregar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "Views/Templates/footer.php";?>