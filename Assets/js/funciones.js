
let tblUsuarios,tblCajas ,tblClientes,tblCategorias,tblMedidas,tblProductos;

/** Inicio de Usuario */
document.addEventListener("DOMContentLoaded", function(){
    tblUsuarios = $('#tblUsuarios').DataTable( {
        ajax: {
            url: base_url + "Usuarios/listar",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'usuario'},
            {'data' : 'nombre'},
            {'data' : 'caja'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ]
    } );
    /** Fin de la tabla usuarios*/ 
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
        ]
    });
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
    const nombre=document.getElementById("nombre");
    const contrasena=document.getElementById("contrasena");
    const confirmar=document.getElementById("confirmar");
    const caja=document.getElementById("caja");
    if(usuario.value == "" || nombre.value== "" || caja.value== "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorio',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url =base_url + "Usuarios/registrar";
        const frm =document.getElementById("frmUsuario");
        const http=new XMLHttpRequest();
        http.open("POST", url, true);
        http.send( new FormData(frm));
        http.onreadystatechange=function(){
            if(this.readyState == 4 && this.status ==200){
               const res = JSON.parse(this.responseText);
               if(res == "si"){
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Usuario Registrado con éxito',
                    showConfirmButton: false,
                    timer: 3000
                    })
                  frm.reset();
                  $("#nuevo_usuario").modal("hide");
                  tblUsuarios.ajax.reload();
               }else if(res == "modificado"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario modificado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_usuario").modal("hide");
                    tblUsuarios.ajax.reload();
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
               document.getElementById("nombre").value = res.nombre;
               document.getElementById("caja").value = res.id_caja;
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
                    if (res == "ok" ){
                        Swal.fire(
                            'Mensaje!',
                            'Usuario eliminado con éxito.',
                            'success'
                        )
                        tblUsuarios.ajax.reload();
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
                    if (res == "ok" ){
                        Swal.fire(
                            'Mensaje!',
                            'Usuario reingresado con éxito.',
                            'success'
                        )
                        tblUsuarios.ajax.reload();
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
/** Fin de Usuario */
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


                     