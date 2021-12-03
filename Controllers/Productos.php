<?php
    class Productos extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        public function index(){
            if(empty($_SESSION['activo'])){
                header("location: ".base_url);
            }
            $data['medidas']=$this->model->getMedidas();
            $data['categorias']=$this->model->getCategorias();
            $this->views->getView($this, "index",$data);
        }
        public function listar(){  
           $data = $this->model->getProductos();
           for ($i=0; $i < count($data) ; $i++){
               $data[$i]['imagen']= '<img class="img-thumbnail" src="'.base_url."Assets/img/".$data[$i]['imagen'].'" width="100">';
               if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
               }else {
                $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';  
               }
               $data[$i]['acciones'] = '<div>
                    <button class="btn btn-primary" type="button" onclick="btnEditarProd('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarProd('.$data[$i]['id'].');"><i class="fas fa-trash"></i></i></button>
                    <button class="btn btn-success" type="button" onclick="btnReingresarProd('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                    </div>';
           }
           echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function registrar(){
            
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcion'];
            $precio_compra = $_POST['precio_compra'];
            $precio_venta = $_POST['precio_venta'];
            $medida = $_POST['medida'];
            $categoria = $_POST['categoria'];
            $id=$_POST['id'];
            $img= $_FILES['imagen'];
            $name= $img['name'];
            $tmpname = $img['tmp_name'];
            $fecha = date("YmdHis");
            if(empty($codigo) || empty($descripcion)  || empty($precio_venta) || empty($medida) || empty ($categoria)){
                $msg="Todos los campos son obligatorios";
            }else {
                   
                if(!empty($name)){
                    $imgNombre= $fecha . ".jpg";
                    $destino= "Assets/img/" . $imgNombre; 
                }else if(!empty($_POST['imagen_actual']) && empty($name)){
                    $imgNombre= $_POST['imagen_actual'];
                }else {
                    $imgNombre= "default.jpg";
                }
            
                if ($id == "") {
                    if (empty($precio_compra)) {
                        $msg="Todos los campos son obligatorios";
                    }else {
                        $data= $this->model->registrarProdcutos($codigo,$descripcion,$precio_compra,$precio_venta, $medida, $categoria, $imgNombre);
                        if($data == "ok"){
                            if(!empty($name)){
                                 move_uploaded_file($tmpname, $destino);
                            }
                            $msg ="si";
                           
                        }else if($data =="existe"){
                            $msg="La descripcion ya existe";
                        }else {
                            $msg= "Error al agregar el producto";
                        }
                    } 
                }else {
                        $imgDelete= $this->model->editarProductos($id);
                        if($imgDelete['imagen'] != 'default.jpg' || $imgDelete['imagen'] != ""){
                            if(file_exists("Assets/img/" . $imgDelete['imagen'])){
                                unlink("Assets/img/" . $imgDelete['imagen']);
                            }
                        }
                        $data= $this->model->modificarProductos($codigo, $descripcion, $precio_venta, $medida, $categoria, $imgNombre, $id);
                        if($data == "modificado"){
                            if(!empty($name)){
                                move_uploaded_file($tmpname, $destino);
                           }
                            $msg= "modificado";
                        }else {
                            $msg="Error al modificar la productos";
                        }
                    
                }   
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar(int $id){
            $data= $this->model->editarProductos($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function eliminar(int $id){
            $data = $this->model->accionProd(0, $id);
            if($data == 1){
                $msg ="ok";
            }else {
                $msg ="Error al eliminar el producto ";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionProd(1, $id);
            if($data == 1){
                $msg ="ok";
            }else {
                $msg ="Error al reingresar el producto ";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
      
    }
    
?>