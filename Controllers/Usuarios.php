<?php
    class Usuarios extends Controller{
        public function __construct(){
            session_start();
            
            parent::__construct();
        }
        public function index(){
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            $data['cargos'] = $this->model->getCargos();
            $data['almacenes'] = $this->model->getAlmacenes();
            $data['identidades'] = $this->model->getIdentidades();
            $this->views->getView($this,"index", $data);
        }
        public function listar(){
            $data = $this-> model->getUsuarios();
            for ($i=0; $i < count($data) ; $i++) { 
                if ($data[$i]['estado'] == 1) {
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-primary" type="button" onclick="btnEditarUser('.$data[$i]['id'].');"><i class="fas fa-user-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarUser('.$data[$i]['id'].');"><i class="fas fa-user-slash"></i></button>
                    </div>';
                }else{
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarUser('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                    </div>';
                }
                
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
            
        }
        public function validar(){
            if(empty($_POST['usuario']) || empty($_POST['contrasena'])){
                $msg="Los campos estan vacios";
            }else{
                $usuario =$_POST['usuario'];
                $contrasena=$_POST['contrasena'];
                $hash = hash("SHA256", $contrasena);
                $data = $this ->model->getUsuario($usuario, $hash);
               
                if($data){
                    $_SESSION['id_usuario'] = $data['id'];
                    $_SESSION['usuario']= $data['usuario'];
                    $_SESSION['nombre']= $data['nombre'];
                    $_SESSION['activo']= true;
                    $msg = "ok";
                }else{
                    $msg ="Usuario o contraseña incorrecta";
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function registrar(){
            $usuario =$_POST['usuario'];
            $contrasena =$_POST['contrasena'];
            $confirmar =$_POST['confirmar'];
            $cargo =$_POST['cargo'];
            $almacen =$_POST['almacen'];
            $nombre =$_POST['nombre'];
            $identidad =$_POST['identidad'];
            $n_identidad =$_POST['n_identidad'];
            $telefono =$_POST['telefono'];
            $correo =$_POST['correo'];
            $direccion =$_POST['direccion'];
            $id =$_POST['id'];
            $hash = hash("SHA256",$contrasena);
            if(empty($usuario) || empty($cargo) || empty($almacen) || empty($nombre) || empty($identidad) || empty($n_identidad) || empty($telefono) || empty($correo) || empty($direccion)){
                $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
            }else{
                if ($id == ""){
                    if($contrasena != $confirmar){
                        $msg =array('msg' =>'Las contraseñas no coinciden','icono'=>'warning');
                    }else {
                        $data= $this->model->registrarUsuario($usuario,$hash,$cargo,$almacen,$nombre,$identidad,$n_identidad,$telefono,$correo,$direccion);
                        if ($data == "ok"){
                            $msg =array('msg' =>'Usuario registrado con éxito','icono'=>'success');
                        }else if($data =="existe") {
                            $msg =array('msg' =>'El usuario ya existe','icono'=>'warning');
                        }else {
                            $msg =array('msg' =>'Error al registrar el usuario','icono'=>'error');
                        }
                    }
                }else {
                    $data= $this->model->modificarUsuario($usuario,$cargo,$almacen,$nombre,$identidad,$n_identidad,$telefono,$correo,$direccion, $id);
                        if ($data == "modificado"){
                            $msg =array('msg' =>'Usuario modificado con éxito','icono'=>'success');
                        }else {
                            $msg =array('msg' =>'Error al modificado el usuario','icono'=>'error');
                        }
                }
                
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar(int $id){
            $data = $this->model->editarUser($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar(int $id){
            $data = $this->model->accionUser(0, $id);
            if($data == 1){
                $msg =array('msg' =>'Usuario dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar el usuario','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionUser(1, $id);
            if($data == 1){
                $msg =array('msg' =>'Usuario reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar el usuario','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function salir(){
            session_destroy();
            header("location: ".base_url);
        }

    }
?>


