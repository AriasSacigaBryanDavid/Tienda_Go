<?php

    class Administracion extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        
        public function index(){
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }

            $data= $this->model->getEmpresa();
            $this->views->getView($this,"index",$data);
        }
        // Inicio de Configuracion de Empresa
        public function modificar()
        {
            $nombre = $_POST['nombre'];
            $ruc =$_POST['ruc'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $mensaje = $_POST['mensaje'];
            $id= $_POST['id'];
            $data= $this->model->modificar($nombre, $ruc, $telefono, $direccion, $mensaje, $id);
            if($data == 'ok'){
                $msg ='ok';
            }else{
                $msg = 'Error';
            }
            echo json_encode($msg);
            die();
        }

        // Inicio de Cargos
        public function cargos(){
            $this->views->getView($this,"cargos");
        }
        public function listar_cargos(){
            $data = $this->model->getCargos();
            for ($i =0; $i<count($data); $i++){
                if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary mb-2" type="button" onclick="btnEditarCar('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarCar('.$data[$i]['id'].');"><i class="fas fa-trash"></i></button>
                    </div>';
                }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarCar('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                    </div>';
                }       
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function registrar_cargo(){
            $nombre=$_POST['nombre'];
            $id=$_POST['id'];
            if(empty($nombre)){
                $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
            }else{
                if ($id== "") {
                    $data=$this->model->registrarCargo($nombre);
                    if($data == "ok") {
                        $msg =array('msg' =>'Cargo registrado con éxito','icono'=>'success');
                    }else if($data == "existe"){ 
                        $msg =array('msg' =>'El cargo ya éxiste','icono'=>'warning');
                    } else {
                        $msg =array('msg' =>'Error al registrar el cargo','icono'=>'error');
                    }
                }else {
                    $data=$this->model->modificarCargo($nombre,$id);
                    if($data == "modificado") {
                        $msg =array('msg' =>'Cargo modificado con éxito','icono'=>'success');
                    }else {
                        $msg =array('msg' =>'Error al modificado el cargo','icono'=>'error');
                    } 
                } 
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar_cargo(int $id){
            $data = $this->model->editarCargo($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar_cargo(int $id){
            $data = $this->model->accionCargo(0, $id);
            if($data ==1){
                $msg =array('msg' =>'Cargo dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar el cargo','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar_cargo(int $id){
            $data = $this->model->accionCargo(1,$id);
            if($data ==1){
                $msg =array('msg' =>'Cargo reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar el cargo','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        // Inicio de Almacenes
        public function almacenes(){
            $this->views->getView($this,"almacenes");
        }
        public function listar_almacenes(){
            $data = $this->model->getAlmacenes();
            for ($i =0; $i<count($data); $i++){
                if($data[$i]['estado']== 1){
                    $data[$i]['estado']= '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary mb-2" type="button" onclick="btnEditarAlm('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarAlm('.$data[$i]['id'].');"><i class="fas fa-trash"></i></button>
                    </div>';
                }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarAlm('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                    </div>';
                }
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function registrar_almacen(){
            $nombre=$_POST['nombre'];
            $direccion=$_POST['direccion'];
            $encargado=$_POST['encargado'];
            $telefono =$_POST['telefono'];
            $correo =$_POST['correo'];
            $id=$_POST['id'];
            if(empty($nombre) || empty($direccion) || empty($encargado) || empty($telefono) || empty($correo)){
                $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
            }else{
                if ($id== "") {
                    $data=$this->model->registrarAlmacen($nombre, $direccion, $encargado, $telefono, $correo);
                    if($data == "ok") {
                        $msg =array('msg' =>'Almacén registrado con éxito','icono'=>'success');
                    }else if($data == "existe"){ 
                        $msg =array('msg' =>'El almacén ya éxiste','icono'=>'warning');
                    } else {
                        $msg =array('msg' =>'Error al registrar el almacén','icono'=>'error');
                    }
                }else {
                    $data=$this->model->modificarAlmacen($nombre,$direccion,$encargado, $telefono, $correo,$id);
                    if($data == "modificado") {
                        $msg =array('msg' =>'Almacén modificado con éxito','icono'=>'success');
                    }else {
                        $msg =array('msg' =>'Error al modificado el almacén','icono'=>'error');
                    } 
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar_almacen(int $id){
            $data = $this->model->editarAlm($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar_almacen(int $id){
            $data = $this->model->accionAlm(0, $id);
            if($data ==1){
                $msg =array('msg' =>'Almacén dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar el almacén','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar_almacen(int $id){
            $data = $this->model->accionAlm(1,$id);
            if($data ==1){
                $msg =array('msg' =>'Almacén reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar el almacén','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>