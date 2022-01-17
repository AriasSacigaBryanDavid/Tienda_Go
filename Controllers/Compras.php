<?php

    class Compras extends Controller{
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

        public function buscarCodigo($cod){
            $data =$this->model->getProCod($cod);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();

        }
        public function ingresar(){
            $id= $_POST['id'];
            $datos= $this->model->getProductos($id);
            $id_producto= $datos['id'];
            $id_usuario = $_SESSION['id_usuario'];
            $precio =$datos['precio_compra'];
            $cantidad =$_POST['cantidad'];
            $sub_total= $precio * $cantidad;
            $data=$this->model->registrarDetalle($id_producto,$id_usuario,$precio,$cantidad, $sub_total);
            if($data == "ok"){
                $msg = "ok";
            }else{
                $msg = "Error al ingresar el producto";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function listar(){
            $id_usuario =$_SESSION['id_usuario'];
            $data['detalle'] = $this->model->getDetalle($id_usuario);
            $data['total_pagar'] = $this->model->calcularCompra($id_usuario);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function delete($id){
            $data = $this->model->deleteDetalle($id);
            if($data == 'ok'){
                $msg ='ok';
            }else{
                $msg ='error';
            }
            echo json_encode($msg);
            die();
        }

    }

?>