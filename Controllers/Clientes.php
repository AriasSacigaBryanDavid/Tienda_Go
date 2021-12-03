<?php
    class Clientes extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        public function index(){
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            $this->views->getView($this,"index");
        }
        public function listar(){
             $data = $this->model->getClientes();
             for ($i=0; $i<count($data); $i++){
                 if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary" type="button" onclick="btnEditarCli('.$data[$i]['id'].');"><i class="fas fa-user-edit"></i></button>
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
        public function registrar(){
            $dni= $_POST['dni'];
            $nombre=$_POST['nombre'];
            $telefono=$_POST['telefono'];
            $direccion=$_POST['direccion'];
            $id=$_POST['id'];
            if(empty($dni) || empty($nombre) || empty($telefono) || empty($direccion)){
                $msg= "Todos los campos son obligatorios";
            }else{
                if ($id== "") {
                    $data=$this->model->registarCliente($dni,$nombre,$telefono,$direccion);
                    if($data == "ok") {
                        $msg="si";
                    }else if($data == "existe"){
                        $msg="El cliente ya existe";
                    }else {
                        $msg="Error al registrar el cliente";
                    } 
                }else {
                    $data=$this->model->modificarCliente($dni,$nombre,$telefono,$direccion,$id);
                    if($data == "modificado") {
                        $msg="modificado";
                    }else {
                        $msg="Error al modificar el cliente";
                    } 
                }     
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar(int $id){
            $data = $this->model->editarCli($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar(int $id){
            $data = $this->model->accionCli(0, $id);
            if($data ==1){
                $msg="ok";
            }else {
                $msg ="Error al eliminar el cliente";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionCli(1, $id);
            if($data ==1){
                $msg="ok";
            }else {
                $msg ="Error al reingresar el cliente";
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

