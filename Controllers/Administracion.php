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

       





    }
    



?>