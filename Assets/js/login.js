function frmLogin(e){
    e.preventDefault();
    const usuario=document.getElementById("usuario");
    const contrasena=document.getElementById("contrasena");
    if(usuario.value == ""){
        contrasena.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    }else if (contrasena.value == ""){
        usuario.classList.remove("is-invalid");
        contrasena.classList.add("is-invalid");
        contrasena.focus();
    }else{
        const url =base_url + "Usuarios/validar";
        const frm =document.getElementById("frmLogin");
        const http=new XMLHttpRequest();
        http.open("POST", url, true);
        http.send( new FormData(frm));
        http.onreadystatechange=function(){
            if(this.readyState == 4 && this.status ==200){
               //console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if(res == "ok"){
                    window.location = base_url + "Usuarios";
                }else{
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").innerHTML =res;
                }
            }
        }
    }
}