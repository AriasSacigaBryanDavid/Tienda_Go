<?php
    class Contactos extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        //Inicio de Proveedores
        public function index(){
            if(empty($_SESSION['activo'])){
                header("location: ".base_url);
            }
            $data['identidades']=$this->model->getIdentidades();
            $this->views->getView($this, "index",$data);
        }
    
        public function listar_proveedores(){
             $data = $this->model->getProveedores();
             for ($i=0; $i<count($data); $i++){
                 if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary mb-2" type="button" onclick="btnEditarPro('.$data[$i]['id'].');"><i class="fas fa-user-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarPro('.$data[$i]['id'].');"><i class="fas fa-user-slash"></i></button>
                    </div>';
                 }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarPro('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                    </div>';
                 }
                 
             }
             echo json_encode($data, JSON_UNESCAPED_UNICODE);
             die();
        }
        public function registrar_proveedor(){
            $nombre=$_POST['nombre'];
            $identidad= $_POST['identidad'];
            $n_identidad = $_POST['n_identidad'];
            $telefono=$_POST['telefono'];
            $correo =$_POST['correo'];
            $direccion=$_POST['direccion'];
            $id=$_POST['id'];
            if(empty($nombre) || empty($identidad) || empty($n_identidad) || empty($telefono) || empty($correo)  || empty($direccion)){
                $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
            }else{
                if ($id== "") {
                    $data=$this->model->registarProveedor($nombre,$identidad,$n_identidad,$telefono,$correo,$direccion);
                    if($data == "ok") {
                        $msg =array('msg' =>'Proveedor registrado con ??xito','icono'=>'success');
                    }else if($data == "existe"){
                        $msg =array('msg' =>'El proveedor ya ??xiste','icono'=>'warning');
                    }else {
                        $msg =array('msg' =>'Error al registrar el proveedor','icono'=>'error');

                    } 
                }else {
                    $data=$this->model->modificarProveedor($nombre,$identidad,$n_identidad,$telefono,$correo,$direccion,$id);
                    if($data == "modificado") {
                        $msg =array('msg' =>'Proveedor modificado con ??xito','icono'=>'success');
                    }else {
                        $msg =array('msg' =>'Error al modificado el proveedor','icono'=>'error');
                    } 
                }     
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar_proveedor(int $id){
            $data = $this->model->editarPro($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar_proveedor(int $id){
            $data = $this->model->accionPro(0, $id);
            if($data ==1){
                $msg =array('msg' =>'Proveedor dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar el proveedor','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar_proveedor(int $id){
            $data = $this->model->accionPro(1, $id);
            if($data ==1){
                $msg =array('msg' =>'Proveedor reingresado con ??xito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar el proveedor','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        //Inicio de clientes

        public function clientes(){
            $data['identidades']=$this->model->getIdentidades();
            $this->views->getView($this,"clientes", $data);
        }
        public function listar_clientes(){
            $data = $this->model->getClientes();
            for ($i=0; $i<count($data); $i++){
                if($data[$i]['estado'] ==1){
                   $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                   $data[$i]['acciones']='<div>
                   <button class="btn btn-primary mb-2" type="button" onclick="btnEditarCli('.$data[$i]['id'].');"><i class="fas fa-user-edit"></i></button>
                   <button class="btn btn-danger" type="button" onclick="btnEliminarCli('.$data[$i]['id'].');"><i class="fas fa-user-slash"></i></button>
                   </div>';
                }else {
                   $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                   $data[$i]['acciones']='<div>
                   <button class="btn btn-success" type="button" onclick="btnReingresarCli('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                   </div>';
                }  
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
       }
       public function registrar_cliente(){
           $nombre=$_POST['nombre'];
           $identidad=$_POST['identidad'];
           $n_identidad=$_POST['n_identidad'];
           $telefono=$_POST['telefono'];
           $correo= $_POST['correo'];
           $direccion=$_POST['direccion'];
           $id=$_POST['id'];
           if( empty($nombre) || empty($identidad) || empty($n_identidad) || empty($telefono) || empty($correo) || empty($direccion)){
               $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
           }else{
               if ($id== "") {
                   $data=$this->model->registarCliente($nombre, $identidad, $n_identidad, $telefono, $correo,$direccion);
                   if($data == "ok") {
                       $msg =array('msg' =>'Cliente registrado con ??xito','icono'=>'success');
                   }else if($data == "existe"){
                       $msg =array('msg' =>'El cliente ya ??xiste','icono'=>'warning');
                   }else {
                       $msg =array('msg' =>'Error al registrar el cliente','icono'=>'error');
                   } 
               }else {
                   $data=$this->model->modificarCliente($nombre, $identidad, $n_identidad, $telefono, $correo, $direccion,$id);
                   if($data == "modificado") {
                       $msg =array('msg' =>'Cliente modificado con ??xito','icono'=>'success');
                   }else {
                       $msg =array('msg' =>'Error al modificado el cliente','icono'=>'error');
                   } 
               }     
           }
           echo json_encode($msg, JSON_UNESCAPED_UNICODE);
           die();
       }
       public function editar_cliente(int $id){
           $data = $this->model->editarCli($id);
           echo json_encode($data, JSON_UNESCAPED_UNICODE);
           die();
       }
       public function eliminar_cliente(int $id){
           $data = $this->model->accionCli(0, $id);
           if($data ==1){
               $msg =array('msg' =>'Cliente dado de baja','icono'=>'success');
           }else {
               $msg =array('msg' =>'Error al eliminar el cliente','icono'=>'error');
           }
           echo json_encode($msg, JSON_UNESCAPED_UNICODE);
           die();
       }
       public function reingresar_cliente(int $id){
           $data = $this->model->accionCli(1, $id);
           if($data ==1){
               $msg =array('msg' =>'Cliente reingresado con ??xito','icono'=>'success');
           }else {
               $msg =array('msg' =>'Error al reingresar el cliente','icono'=>'error');
           }
           echo json_encode($msg, JSON_UNESCAPED_UNICODE);
           die();
       }


    }
?>