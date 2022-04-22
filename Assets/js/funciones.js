let tblUsuarios,tblCargos,tblAlmacenes,tblIdentidades,tblDocumentos,tblProveedores,tblCajas ,tblClientes,tblCategorias,tblMedidas,tblProductos;
document.addEventListener("DOMContentLoaded", function(){
    /** Inicio de Usuario */
    tblUsuarios = $('#tblUsuarios').DataTable( {
        ajax: {
            url: base_url + "Usuarios/listar",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'usuario'},
            {'data' : 'cargo'},
            {'data' : 'almacen'},
            {'data' : 'nombre'},
            {'data' : 'identidad'},
            {'data' : 'n_identidad'},
            {'data' : 'telefono'},
            {'data' : 'correo'},
            {'data' : 'direccion'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de Productos',
                    filename: 'Reporte de Productos',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de Productos',
                    filename: 'Reporte de Productos',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para ocultar
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    } );
    /** Fin de la tabla usuarios*/ 
    /** Inicio de cargos */
    tblCargos = $('#tblCargos').DataTable( {
        ajax: {
            url: base_url + "Administracion/listar_cargos" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
     /** Fin de la tabla cargos*/
      /** Inicio de almacenes */
    tblAlmacenes = $('#tblAlmacenes').DataTable( {
        ajax: {
            url: base_url + "Administracion/listar_almacenes" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'direccion'},
            {'data' : 'encargado'},
            {'data' : 'telefono'},
            {'data' : 'correo'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de Almacenes',
                    filename: 'Reporte de Almacenes',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de Almacenes',
                    filename: 'Reporte de Almacenes',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para ocultar
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });
    /** Fin de almacenes */
    /** Inicio de identidades */
    tblIdentidades = $('#tblIdentidades').DataTable( {
    ajax: {
        url: base_url + "Administracion/listar_identidades" ,
        dataSrc: ''
    },
    columns: [
        {'data' : 'id'},
        {'data' : 'nombre'},
        {'data' : 'estado'},
        {'data' : 'acciones'}
    ],
    language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
    },
    dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
    /** Fin de la tabla identidades*/
    /** Inicio de documentos */
    tblDocumentos = $('#tblDocumentos').DataTable( {
        ajax: {
            url: base_url + "Administracion/listar_documentos" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
    /** Fin de documentos*/
    /** Inicio de proveedores */
    tblProveedores = $('#tblProveedores').DataTable( {
        ajax: {
            url: base_url + "Proveedores/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'identidad'},
            {'data' : 'n_identidad'},
            {'data' : 'telefono'},
            {'data' : 'correo'},
            {'data' : 'direccion'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de Proveedores',
                    filename: 'Reporte de Proveedores',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de Proveedores',
                    filename: 'Reporte de Proveedores',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para ocultar
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
        
    });
     /** Fin de la tabla proveedores*/ 
     /** Inicio de cajas */
     tblCajas = $('#tblCajas').DataTable( {
        ajax: {
            url: base_url + "Cajas/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'caja'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ]
    });
     /** Fin de la tabla cajas*/
    /** Inicio de clientes */
    tblClientes = $('#tblClientes').DataTable( {
        ajax: {
            url: base_url + "Clientes/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'dni'},
            {'data' : 'nombre'},
            {'data' : 'telefono'},
            {'data' : 'direccion'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ]
    });
     /** Fin de la tabla clientes*/ 
    /** Inicio de categoria */
    tblCategorias = $('#tblCategorias').DataTable( {
        ajax: {
            url: base_url + "Categorias/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ]
    });
    /** Fin de categoria */
    /** Inicio de medidas */
    tblMedidas = $('#tblMedidas').DataTable( {
        ajax: {
            url: base_url + "Medidas/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'nombre_corto'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ]
    });
    /** Fin de medidas */
    /** Inicio de productos */
    tblProductos = $('#tblProductos').DataTable( {
        ajax: {
            url: base_url + "Productos/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'imagen'},
            {'data' : 'codigo'},
            {'data' : 'descripcion'},
            {'data' : 'medida'},
            {'data' : 'categoria'},
            {'data' : 'precio_venta'},
            {'data' : 'cantidad'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de Productos',
                    filename: 'Reporte de Productos',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de Productos',
                    filename: 'Reporte de Productos',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para ocultar
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });
    /** Inicio de historial de compra */
    $('#t_historial_c').DataTable( {
        ajax: {
            url: base_url + "Compras/listar_historial" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'total'},
            {'data' : 'fecha'},
            {'data' : 'acciones'}
        ]
    });
    /** Fin de medidas */
})

function frmUsuario(){
    document.getElementById("title").innerHTML = "Registrar usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("contrasenas").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevo_usuario").modal("show");
    document.getElementById("id").value ="";
}
function registrarUser(e){
    e.preventDefault();
    const usuario=document.getElementById("usuario");
    //const contrasena=document.getElementById("contrasena");
    //const confirmar=document.getElementById("confirmar");
    const cargo=document.getElementById("cargo");
    const almacen=document.getElementById("almacen");
    const nombre=document.getElementById("nombre");
    const identidad=document.getElementById("identidad");
    const n_identidad=document.getElementById("n_identidad");
    const telefono=document.getElementById("telefono");
    const correo=document.getElementById("correo");
    const direccion=document.getElementById("direccion");

    if(usuario.value == "" || cargo.value == "" || almacen.value == "" || nombre.value == "" || identidad.value == "" || n_identidad.value == "" || telefono.value == "" || correo.value == "" || direccion.value == "") {
       alertas('Todo los campos son obligatorios', 'warning' );
    }else{
        const url =base_url + "Usuarios/registrar";
        const frm =document.getElementById("frmUsuario");
        const http=new XMLHttpRequest();
        http.open("POST", url, true);
        http.send( new FormData(frm));
        http.onreadystatechange=function(){
            if(this.readyState == 4 && this.status ==200){
               const res = JSON.parse(this.responseText);
               $("#nuevo_usuario").modal("hide");
               alertas(res.msg, res.icono);
               tblUsuarios.ajax.reload();
                   
                
            
            }
        }
    }
}
function btnEditarUser(id){
    document.getElementById("title").innerHTML = "Actualizar usuario";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url =base_url + "Usuarios/editar/"+id;
        const http=new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange=function(){
            if(this.readyState == 4 && this.status ==200){
               const res = JSON.parse(this.responseText);
               document.getElementById("id").value = res.id;
               document.getElementById("usuario").value = res.usuario;
               document.getElementById("cargo").value = res.id_cargo;
               document.getElementById("almacen").value = res.id_almacen;
               document.getElementById("nombre").value = res.nombre;
               document.getElementById("identidad").value = res.id_identidad;
               document.getElementById("n_identidad").value = res.n_identidad;
               document.getElementById("telefono").value = res.telefono;
               document.getElementById("correo").value = res.correo;
               document.getElementById("direccion").value = res.direccion;
               document.getElementById("contrasenas").classList.add("d-none");
               $("#nuevo_usuario").modal("show");

            }
        }
    
}
function btnEliminarUser(id){
    Swal.fire({
        title: '¿Deseas Eliminar Usuario?',
        text: "¡El usuario no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Usuarios/eliminar/"+id;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    tblUsuarios.ajax.reload();
                    
                }
            }
            
        }
      })
}
function btnReingresarUser(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Usuarios/reingresar/"+id;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    tblUsuarios.ajax.reload();
                    alertas(res.msg, res.icono);
                    
                }
            }
            
        }
      })
}
/** Fin de Usuario */
/*******************************/
/** inicio de cargo */
function frmCargo(){
    document.getElementById("title").innerHTML ="Agregar Cargo";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmCargo").reset();
    $("#nuevo_cargo").modal("show");
    document.getElementById("id").value ="";
}
function registrarCar(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    if( nombre.value=="" ){
        alertas('Todo los campos son obligatorios', 'warning');
    }else{
        const url = base_url +"Administracion/registrar_cargo";
        const frm = document.getElementById("frmCargo");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                $("#nuevo_cargo").modal("hide");
                alertas(res.msg, res.icono);
                tblCargos.ajax.reload();
            }    
        }
    }
}
function btnEditarCar(id){
    document.getElementById("title").innerHTML ="Actualizar Cargo";
    document.getElementById("btnAccion").innerHTML ="Actualizar";
    const url = base_url +"Administracion/editar_cargo/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre; 
            $("#nuevo_cargo").modal("show");  
        }

    }
}
function btnEliminarCar(id){
    Swal.fire({
        title: '¿Deseas Eliminar Cargo?',
        text: "¡El cargo no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Administracion/eliminar_cargo/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res=JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblCargos.ajax.reload();  
                }
            }
        }
    })
}
function btnReingresarCar(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Administracion/reingresar_cargo/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblCargos.ajax.reload();
                  alertas(res.msg, res.icono);   
                }
            }
        }
      })
}
/** Fin de cargos */
/*******************************/
/** inicio de almacenes */
function frmAlmacen(){
    document.getElementById("title").innerHTML ="Agregar Almacén";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmAlmacen").reset();
    $("#nuevo_almacen").modal("show");
    document.getElementById("id").value ="";
}
function registrarAlm(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const direccion = document.getElementById("direccion");
    const encargado = document.getElementById("encargado");
    const telefono = document.getElementById("telefono");
    const correo = document.getElementById("correo");
    if( nombre.value=="" || direccion.value=="" || encargado.value=="" || telefono.value=="" || correo.value==""){
        alertas('Todo los campos son obligatorios', 'warning');
    }else{
        const url = base_url +"Administracion/registrar_almacen";
        const frm = document.getElementById("frmAlmacen");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                $("#nuevo_almacen").modal("hide");
                alertas(res.msg, res.icono);
                tblAlmacenes.ajax.reload();
            }  
        }
    }
}
function btnEditarAlm(id){
    document.getElementById("title").innerHTML ="Actualizar Almacén";
    document.getElementById("btnAccion").innerHTML="Actualizar";
    const url = base_url +"Administracion/editar_almacen/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          const res = JSON.parse(this.responseText); 
          document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre;
            document.getElementById("direccion").value=res.direccion;
            document.getElementById("encargado").value=res.encargado;
            document.getElementById("telefono").value=res.telefono;
            document.getElementById("correo").value=res.correo;
            $("#nuevo_almacen").modal("show");  
        }
    }   
}
function btnEliminarAlm(id){
    Swal.fire({
        title: '¿Deseas Eliminar Almacén?',
        text: "¡El almacén no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Administracion/eliminar_almacen/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblAlmacenes.ajax.reload();
                }
            }
        }
    })
}
function btnReingresarAlm(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Administracion/reingresar_almacen/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblAlmacenes.ajax.reload();
                  alertas(res.msg, res.icono);   
                }
            }
        }
    })
}
/** Fin de almacenes */
/*******************************/
/** inicio de identidad */
function frmIdentidad(){
    document.getElementById("title").innerHTML ="Agregar Identidad";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmIdentidad").reset();
    $("#nuevo_identidad").modal("show");
    document.getElementById("id").value ="";
}
function registrarIden(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    if( nombre.value=="" ){
        alertas('Todo los campos son obligatorios', 'warning');
    }else{
        const url = base_url +"Administracion/registrar_identidad";
        const frm = document.getElementById("frmIdentidad");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                $("#nuevo_identidad").modal("hide");
                alertas(res.msg, res.icono);
                tblIdentidades.ajax.reload();
            }    
        }
    }
}
function btnEditarIden(id){
    document.getElementById("title").innerHTML ="Actualizar Identidad";
    document.getElementById("btnAccion").innerHTML ="Actualizar";
    const url = base_url +"Administracion/editar_identidad/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre; 
            $("#nuevo_identidad").modal("show");  
        }
    }
}
function btnEliminarIden(id){
    Swal.fire({
        title: '¿Deseas Eliminar la Identidad?',
        text: "¡La Identidad no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Administracion/eliminar_identidad/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res=JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblIdentidades.ajax.reload();
               }
            }

        } 
    })
}
function btnReingresarIden(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Administracion/reingresar_identidad/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblIdentidades.ajax.reload();
                  alertas(res.msg, res.icono);   
                }
            }
        }
    })
}
/** Fin de identidad */
/*******************************/
/** inicio de documento */
function frmDocumento(){
    document.getElementById("title").innerHTML ="Agregar Documento";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmDocumento").reset();
    $("#nuevo_documento").modal("show");
    document.getElementById("id").value ="";
}
function registrarDoc(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    if( nombre.value=="" ){
        alertas('Todo los campos son obligatorios', 'warning');
    }else{
        const url = base_url +"Administracion/registrar_documento";
        const frm = document.getElementById("frmDocumento");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                $("#nuevo_documento ").modal("hide");
                alertas(res.msg, res.icono);
                tblDocumentos.ajax.reload();
            }     
        }
    }
}
function btnEditarDoc(id){
    document.getElementById("title").innerHTML ="Actualizar Documento";
    document.getElementById("btnAccion").innerHTML ="Actualizar";
    const url = base_url +"Administracion/editar_documento/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre; 
            $("#nuevo_documento").modal("show");  
        }

    }
}
function btnEliminarDoc(id){
    Swal.fire({
        title: '¿Deseas Eliminar documento?',
        text: "¡El documento no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Administracion/eliminar_documento/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res=JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblDocumentos.ajax.reload();
               }
            }
        }
    })
}
function btnReingresarDoc(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Administracion/reingresar_documento/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblDocumentos.ajax.reload();
                  alertas(res.msg, res.icono);   
                }
            }
        }
    })
}
/** Fin de documento */
/*******************************/
/*******************************/
/** inicio de Proveedor */
function frmProveedor(){
    document.getElementById("title").innerHTML ="Registrar Proveedor";
    document.getElementById("btnAccion").innerHTML ="Registrar";
    document.getElementById("frmProveedor").reset();
    $("#nuevo_proveedor").modal("show");
    document.getElementById("id").value ="";
}
function registrarPro(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const identidad = document.getElementById("identidad");
    const n_identidad = document.getElementById("n_identidad");
    const telefono = document.getElementById("telefono");
    const correo = document.getElementById("correo");
    const direccion = document.getElementById("direccion");
    if(nombre.value=="" || identidad.value=="" || n_identidad.value=="" || telefono.value==""||correo.value=="" ||direccion.value==""){
        alertas('Todo los campos son obligatorios', 'warning');
    }else{
        const url = base_url +"Proveedores/registrar";
        const frm = document.getElementById("frmProveedor");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                $("#nuevo_proveedor").modal("hide");
                alertas(res.msg, res.icono);
                tblProveedores.ajax.reload();
            }
        }
    }
}
function btnEditarPro(id){
    document.getElementById("title").innerHTML ="Actualizar Proveedor";
    document.getElementById("btnAccion").innerHTML="Actualizar";
    const url = base_url +"Proveedores/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre;
            document.getElementById("identidad").value =res.id_identidad;
            document.getElementById("n_identidad").value = res.n_identidad;
            document.getElementById("telefono").value=res.telefono;
            document.getElementById("correo").value = res.correo;
            document.getElementById("direccion").value=res.direccion;  
            $("#nuevo_proveedor").modal("show");  
        }

    }

    
}
function btnEliminarPro(id){
    Swal.fire({
        title: '¿Deseas Eliminar proveedor?',
        text: "¡El proveedor no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Proveedores/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblProveedores.ajax.reload();
                }
            }
        }
      })
}
function btnReingresarPro(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Proveedores/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblProveedores.ajax.reload();
                  alertas(res.msg, res.icono);
                }
            }
        }
    })
}
/** Fin de proveedores */
/*******************************/
/** inicio de caja */
function frmCaja(){
    document.getElementById("title").innerHTML ="Agregar Caja";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmCaja").reset();
    $("#nuevo_caja").modal("show");
    document.getElementById("id").value ="";
}
function registrarCaj(e){
    e.preventDefault();
    const caja = document.getElementById("caja");
    if( caja.value=="" ){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url +"Cajas/registrar";
        const frm = document.getElementById("frmCaja");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                    if(res == "si"){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Caja registrado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          frm.reset();
                          tblCajas.ajax.reload();
                          $("#nuevo_caja").modal("hide");
                    }else if (res == "modificado") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Caja modificado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          $("#nuevo_caja").modal("hide");
                          tblCajas.ajax.reload();
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res,
                            showConfirmButton: false,
                            timer: 3000
                          })
                    }
                    
                }
                
            }

        }
}
function btnEditarCaj(id){
    document.getElementById("title").innerHTML ="Actualizar Categoria";
    document.getElementById("btnAccion").innerHTML ="Actualizar";
    const url = base_url +"Cajas/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("caja").value=res.caja; 
            $("#nuevo_caja").modal("show");  
        }

    }
}
function btnEliminarCaj(id){
    Swal.fire({
        title: '¿Deseas Eliminar Caja?',
        text: "¡La caja no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Cajas/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res=JSON.parse(this.responseText);
                  if(res == "ok"){
                    Swal.fire(
                     'Mensaje!',
                     'Caja eliminado con éxito.',
                     'success'
                     )
                     tblCajas.ajax.reload();
               }else{
                 Swal.fire(
                     'Mensaje!',
                     res,
                     'error'
                     )
                    }
               }
            }

            Swal.fire(
            'Mensaje!',
            'elimiado',
            'error'
            )
        }
        
    })
}
function btnReingresarCaj(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Cajas/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Caja reingresado con éxito.',
                        'success'
                        )
                        tblCajas.ajax.reload();
                  }else{
                    Swal.fire(
                        'Mensaje!',
                        res,
                        'error'
                        )
                  }
                }
            }
        }
      })
}
/** Fin de cajas */
/*******************************/
/** inicio de cliente */
function frmCliente(){
    document.getElementById("title").innerHTML ="Registrar Cliente";
    document.getElementById("btnAccion").innerHTML ="Registrar";
    document.getElementById("frmCliente").reset();
    $("#nuevo_cliente").modal("show");
    document.getElementById("id").value ="";
}
function registrarCli(e){
    e.preventDefault();
    const dni= document.getElementById("dni");
    const nombre = document.getElementById("nombre");
    const telefono = document.getElementById("telefono");
    const direccion = document.getElementById("direccion");
    if(dni.value=="" || nombre.value=="" || telefono.value==""||direccion.value==""){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url +"Clientes/registrar";
        const frm = document.getElementById("frmCliente");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if(res == "si" ){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Cliente registrado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      frm.reset();
                      tblClientes.ajax.reload();
                      $("#nuevo_cliente").modal("hide");

                }else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Cliente modificado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      $("#nuevo_cliente").modal("hide");
                      tblClientes.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                      })
                }
            }

        }
    }
}
function btnEditarCli(id){
    document.getElementById("title").innerHTML ="Actualizar Cliente";
    document.getElementById("btnAccion").innerHTML="Actualizar";
    const url = base_url +"Clientes/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("dni").value =res.dni;
            document.getElementById("nombre").value=res.nombre;
            document.getElementById("telefono").value=res.telefono;
            document.getElementById("direccion").value=res.direccion;  
            $("#nuevo_cliente").modal("show");  
        }

    }

    
}
function btnEliminarCli(id){
    Swal.fire({
        title: '¿Deseas Eliminar Cliente?',
        text: "¡El cliente no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Clientes/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Cliente eliminado con éxito.',
                        'success'
                        )
                        tblClientes.ajax.reload();
                  }else{
                    Swal.fire(
                        'Mensaje!',
                        res,
                        'error'
                        )
                  }
                }
            }
        }
      })
}
function btnReingresarCli(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Clientes/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Cliente reingresado con éxito.',
                        'success'
                        )
                        tblClientes.ajax.reload();
                  }else{
                    Swal.fire(
                        'Mensaje!',
                        res,
                        'error'
                        )
                  }
                }
            }
        }
      })
}
/** Fin de cliente */
/*******************************/
/** inicio de categorias */
function frmCategoria(){
    document.getElementById("title").innerHTML ="Agregar Categoria";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmCategoria").reset();
    $("#nuevo_categoria").modal("show");
    document.getElementById("id").value ="";
}
function registrarCateg(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    if( nombre.value=="" ){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url +"Categorias/registrar";
        const frm = document.getElementById("frmCategoria");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                    if(res == "si"){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Categoria agregado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          frm.reset();
                          tblCategorias.ajax.reload();
                          $("#nuevo_categoria").modal("hide");
                    }else if (res == "modificado") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Categoria modificado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          $("#nuevo_categoria").modal("hide");
                          tblCategorias.ajax.reload();
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res,
                            showConfirmButton: false,
                            timer: 3000
                          })
                    }
                    
                }
                
            }

        }
}
function btnEditarCateg(id){
    document.getElementById("title").innerHTML ="Actualizar Categoria";
    document.getElementById("btnAccion").innerHTML ="Actualizar";
    const url = base_url +"Categorias/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre; 
            $("#nuevo_categoria").modal("show");  
        }

    }
}
function btnEliminarCateg(id){
    Swal.fire({
        title: '¿Deseas Eliminar Categoria?',
        text: "¡La categoria no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Categorias/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res=JSON.parse(this.responseText);
                  if(res == "ok"){
                    Swal.fire(
                     'Mensaje!',
                     'Categoria eliminado con éxito.',
                     'success'
                     )
                     tblCategorias.ajax.reload();
               }else{
                 Swal.fire(
                     'Mensaje!',
                     res,
                     'error'
                     )
                    }
               }
            }

            Swal.fire(
            'Mensaje!',
            'elimiado',
            'error'
            )
        }
        
    })
}
function btnReingresarCateg(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Categorias/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Catalogo reingresado con éxito.',
                        'success'
                        )
                        tblCategorias.ajax.reload();
                  }else{
                    Swal.fire(
                        'Mensaje!',
                        res,
                        'error'
                        )
                  }
                }
            }
        }
      })
}
/** Fin de categorias */
/*******************************/
/** inicio de medidas */
function frmMedida(){
    document.getElementById("title").innerHTML ="Agregar Categoria";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmMedida").reset();
    $("#nuevo_medida").modal("show");
    document.getElementById("id").value ="";
}
function registrarMed(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const nombre_corto = document.getElementById("nombre_corto");
    if( nombre.value=="" || nombre_corto.value==""){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url +"Medidas/registrar";
        const frm = document.getElementById("frmMedida");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                    if(res == "si"){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Medida registrado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          frm.reset();
                          tblMedidas.ajax.reload();
                          $("#nuevo_medida").modal("hide");
                    }else if (res == "modificado") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Medida modificado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          $("#nuevo_medida").modal("hide");
                          tblMedidas.ajax.reload();
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res,
                            showConfirmButton: false,
                            timer: 3000
                          })
                    }
                    
                }
                
            }

        }
}
function btnEditarMed(id){
    document.getElementById("title").innerHTML ="Actualizar Cliente";
    document.getElementById("btnAccion").innerHTML="Actualizar";
    const url = base_url +"Medidas/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          const res = JSON.parse(this.responseText); 
          document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre;
            document.getElementById("nombre_corto").value=res.nombre_corto;
            $("#nuevo_medida").modal("show");  
        }
    }   
}
function btnEliminarMed(id){
    Swal.fire({
        title: '¿Deseas Eliminar medida?',
        text: "¡la medida no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Medidas/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Medida eliminado con éxito.',
                        'success'
                        )
                        tblMedidas.ajax.reload();
                  }else{
                    Swal.fire(
                        'Mensaje!',
                        res,
                        'error'
                        )
                  }
                }
            }
        }
      })
}
function btnReingresarMed(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Medidas/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Medidas reingresado con éxito.',
                        'success'
                        )
                        tblMedidas.ajax.reload();
                  }else{
                    Swal.fire(
                        'Mensaje!',
                        res,
                        'error'
                        )
                  }
                }
            }
        }
      })
}
/** Fin de medidas */
/*******************************/
/** inicio de productos */
function frmProducto(){
    document.getElementById("title").innerHTML ="Agregar producto";
    document.getElementById("btnAccion").innerHTML = "Agregar";
    document.getElementById("precios_compras").classList.remove("d-none");
    document.getElementById("frmProducto").reset();
    document.getElementById("id").value ="";
    $("#nuevo_producto").modal("show");
    deleteImg();

}
function registrarProduc(e){
    e.preventDefault();
    const codigo =document.getElementById("codigo");
    const descripcion= document.getElementById("descripcion");
    const precio_compra= document.getElementById("precio_compra");
    const precio_venta= document.getElementById("precio_venta");
    const medida= document.getElementById("medida");
    const categoria = document.getElementById("categoria");
    if(codigo.value == "" || descripcion.value == "" || precio_compra.value == "" || precio_venta.value == "" || medida.value == "" || categoria.value == ""){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorio',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url + "Productos/registrar";
        const frm = document.getElementById("frmProducto");
        const http = new XMLHttpRequest();
        http.open("POST",url,true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if(res == "si"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto agregado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $("#nuevo_producto").modal("hide");
                    tblProductos.ajax.reload();
                }else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto modificado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                    $("#nuevo_producto").modal("hide");
                    tblProductos.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                     timer: 3000
                    })
                }
            }
        }
        
    }

}
function btnEditarProd(id){
    document.getElementById("title").innerHTML ="Actualizar producto";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + "Productos/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url,true);
    http.send();
    http.onreadystatechange = function (){
        if (this.readyState == 4 && this.status == 200){
            const res =JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("codigo").value = res.codigo;
            document.getElementById("descripcion").value = res.descripcion;
            document.getElementById("precios_compras").classList.add("d-none");
            document.getElementById("precio_venta").value = res.precio_venta;
            document.getElementById("medida").value = res.id_medida;
            document.getElementById("categoria").value =res.id_categoria;
            document.getElementById("img-preview").src =base_url + 'Assets/img/'+res.imagen;
            document.getElementById("icon-cerrar").innerHTML= `
            <button class="btn btn-danger" onclick="deleteImg()"><i class="fas fa-times"></i></button>`;
            document.getElementById("icon-image").classList.add("d-none");
            document.getElementById("imagen_actual").value =res.imagen;
            $("#nuevo_producto").modal("show");
        }
    }
    
}
function btnEliminarProd(id){
    Swal.fire({
        title: '¿Deseas Eliminar Producto?',
        text: "¡El producto no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Productos/eliminar/"+id;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok" ){
                        Swal.fire(
                            'Mensaje!',
                            'Producto eliminado con éxito.',
                            'success'
                        )
                        tblProductos.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarProd(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Productos/reingresar/"+id;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok" ){
                        Swal.fire(
                            'Mensaje!',
                            'producto reingresado con éxito.',
                            'success'
                        )
                        tblProductos.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function preview(e){
    const url= e.target.files[0];
    const urlTmp= URL.createObjectURL(url);
    document.getElementById("img-preview").src= urlTmp;
    document.getElementById("icon-image").classList.add("d-none");
    document.getElementById("icon-cerrar").innerHTML= `
    <button class="btn btn-danger" onclick="deleteImg()"><i class="fas fa-times"></i></button>
    ${url['name']}`;
}
function deleteImg(){
    document.getElementById("icon-cerrar").innerHTML=''; 
    document.getElementById("icon-image").classList.remove("d-none");
    document.getElementById("img-preview").src='';
    document.getElementById('imagen').value='';
    document.getElementById('imagen_actual').value='';
}
/** Fin de productos*/
/*******************************/
/** inicio de compras */
function buscarCodigo(e){
    e.preventDefault();
    const cod = document.getElementById("codigo").value;
    if (cod !='') {
        if(e.which == 13){
            const url =base_url + "Compras/buscarCodigo/"+ cod;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                    if(this.readyState == 4 && this.status ==200){
                        const res =JSON.parse(this.responseText);
                        if(res){
                            document.getElementById("nombre").value = res.descripcion;
                            document.getElementById("precio").value = res.precio_compra;
                            document.getElementById("id").value = res.id;
                            document.getElementById("cantidad").removeAttribute('disabled');
                            document.getElementById("cantidad").focus();
                        }else{
                            alertas('El Producto no existe', 'warning');
                            document.getElementById("codigo").value='';
                            document.getElementById("codigo").focus();
                        }
            
                    }
            }
        } 
    }else{
        alertas('Ingrese el Código de Barras ', 'warning');
    }
}

function buscarCodigoV(e){
    e.preventDefault();
    const cod = document.getElementById("codigo").value;
    if (cod !='') {
        if(e.which == 13){
            const url =base_url + "Compras/buscarCodigo/" + cod;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                    if(this.readyState == 4 && this.status ==200){
                        const res =JSON.parse(this.responseText);
                        if(res){
                            document.getElementById("nombre").value = res.descripcion;
                            document.getElementById("precio").value = res.precio_venta;
                            document.getElementById("id").value = res.id;
                            document.getElementById("cantidad").removeAttribute('disabled');
                            document.getElementById("cantidad").focus();
                        }else{
                            alertas('El Producto no existe', 'warning');
                            document.getElementById("codigo").value='';
                            document.getElementById("codigo").focus();
                        }
            
                    }
            }
        } 
    }else{
        alertas('Ingrese el Código de Barras ', 'warning');
    }
}
function calcularPrecio(e){
    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    const precio = document.getElementById("precio").value;
    document.getElementById("sub_total").value= precio * cant;
    if(e.which == 13){
        if(cant > 0){
            const url =base_url + "Compras/ingresar";
            const frm =document.getElementById("frmCompra");
            const http=new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData (frm));
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    frm.reset();
                    cargaDetalle();
                    document.getElementById("cantidad").setAttribute('disabled', 'disabled');
                    document.getElementById("codigo").focus();
                        
            
                }
            }
        }

    }
    
}
if(document.getElementById('tblDetalle')){
    cargaDetalle();
}
function cargaDetalle(){
    const url =base_url + "Compras/listar";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
        if(this.readyState == 4 && this.status ==200){
           const res = JSON.parse(this.responseText);
           let html ='';
           res.detalle.forEach(row => {
                html +=`<tr>
                    <td>${row['id']}</td>
                    <td>${row['descripcion']}</td>
                    <td>${row['cantidad']}</td>
                    <td>${row['precio']}</td>
                    <td>${row['sub_total']}</td>
                    <td>
                        <button class="btn btn-danger" type="button" onclick="deleteDetalle(${row['id']})">
                        <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>`;
            }); 
            document.getElementById("tblDetalle").innerHTML = html; 
            document.getElementById("total").value = res.total_pagar.total;      
   
        }
    }
}
function deleteDetalle(id){
        const url =base_url + "Compras/delete/"+id;
        const http=new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange=function(){
            if(this.readyState == 4 && this.status ==200){
              const res=JSON.parse(this.responseText);
              if( res == 'ok'){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Producto Eliminado',
                    showConfirmButton: false,
                    timer: 2000
                })
                cargaDetalle();
              }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error de Eliminar Producto',
                    showConfirmButton: false,
                     timer: 2000
                })
              }
            }
        }
}
function generarCompra(){
    Swal.fire({
        title: '¿Está seguro de realizar la compra?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Compras/registrarCompra";
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    if (res.msg == "ok" ){
                        Swal.fire(
                            'Mensaje!',
                            'Compra generada.',
                            'success'
                        )
                        const ruta =base_url +'Compras/generarPdf/'+ res.id_compra;
                        window.open(ruta);
                        setTimeout(() =>{
                            window.location.reload();
                        },300);
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })   
}
function CancelarCompra(){
    Swal.fire({
        title: '¿Está seguro de cancelar la compra?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Compras/cancelarCompra";
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    if (res.msg == "ok" ){
                        Swal.fire(
                            'Mensaje!',
                            'Compra Cancelada.',
                            'success'
                        )
                        
                        setTimeout(() =>{
                            window.location.reload();
                        },300);
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })   
}
/** Fin de compras*/
/*******************************/
/** inicio de Administracion */
function modificarEmpresa() {
    const frm = document.getElementById('frmEmpresa');
    const url =base_url + "Administracion/modificar";
            const http=new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData(frm));
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    if(res =='ok'){
                        Swal.fire(
                            'Mensaje!',
                            'Modificado.',
                            'success'
                        )
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                   
                }
            }
}
/** Fin de Administracion */
/*******************************/
/** inicio de alertas */
function alertas(mensaje, icono) {
    Swal.fire({
        position: 'top-end',
        icon: icono,
        title: mensaje,
        showConfirmButton: false,
        timer: 3000
    })
}





                     