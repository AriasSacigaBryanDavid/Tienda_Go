<?php
    class Productos extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        //Inicio de productos
        public function index(){
            if(empty($_SESSION['activo'])){
                header("location: ".base_url);
            }
            $data['marcas']=$this->model->getMarcas_productos();
            $data['categorias']=$this->model->getCategorias_productos();
            $data['unidades']=$this->model->getUnidades_productos();
            $this->views->getView($this, "index",$data);
        }
        public function listar_productos(){
            $data = $this-> model->getProductos();
            for ($i=0; $i < count($data) ; $i++) { 
                if ($data[$i]['estado'] == 1) {
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-primary mb-2" type="button" onclick="btnEditarProd('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarProd('.$data[$i]['id'].');"><i class="fas fa-trash"></i></button>
                    </div>';
                }else{
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarProd('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                    </div>';
                }
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();  
        }
        public function registrar_producto(){
            $codigo =$_POST['codigo'];
            $nombre =$_POST['nombre'];
            $descripcion=$_POST['descripcion'];
            $marca=$_POST['marca'];
            $categoria=$_POST['categoria'];
            $unidad= $_POST['unidad'];
            $precio_compra=$_POST['precio_compra'];
            $precio_venta=$_POST['precio_venta'];
            $id=$_POST['id'];
            if(empty($codigo) || empty($nombre) || empty($descripcion) || empty($marca)|| empty($categoria) || empty($unidad) || empty($precio_compra) || empty($precio_venta)){
                $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
            }else{
                if ($id == ""){
                        $data= $this->model->registrarProducto($codigo, $nombre, $descripcion, $marca, $categoria, $unidad, $precio_compra, $precio_venta);
                        if ($data == "ok"){
                            $msg =array('msg' =>'Producto registrado con éxito','icono'=>'success');
                        }else if($data =="existe") {
                            $msg =array('msg' =>'El producto ya éxiste','icono'=>'warning');
                        }else {
                            $msg =array('msg' =>'Error al registrar el producto','icono'=>'error');
                        }
                }else {
                    $data= $this->model->modificarProducto($codigo, $nombre, $descripcion, $marca, $categoria, $unidad, $precio_compra, $precio_venta, $id);
                        if ($data == "modificado"){
                            $msg =array('msg' =>'Producto modificado con éxito','icono'=>'success');
                        }else {
                            $msg =array('msg' =>'Error al modificado el producto','icono'=>'error');
                        }
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar_producto(int $id){
            $data = $this->model->editarProd($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar_producto(int $id){
            $data = $this->model->accionProd(0, $id);
            if($data == 1){
                $msg =array('msg' =>'Producto dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar el producto','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar_producto(int $id){
            $data = $this->model->accionProd(1, $id);
            if($data == 1){
                $msg =array('msg' =>'Producto reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar el producto','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        //Fin de productos
        //************************************/
        //Inicio de Marcas
        public function marcas(){
            $this->views->getView($this,"marcas");
        }
        public function listar_marcas(){
            $data = $this->model->getMarcas();
            for ($i =0; $i<count($data); $i++){
                if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary mb-2" type="button" onclick="btnEditarMar('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarMar('.$data[$i]['id'].');"><i class="fas fa-trash"></i></button>
                    </div>';
                }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarMar('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                    </div>';
                }
                    
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function registrar_marca(){
            $nombre=$_POST['nombre'];
            $id=$_POST['id'];
            if(empty($nombre)){
                $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
            }else{
                if ($id== "") {
                    $data=$this->model->registrarMarca($nombre);
                    if($data == "ok") {
                        $msg =array('msg' =>'Marca registrado con éxito','icono'=>'success');
                    }else if($data == "existe"){ 
                        $msg =array('msg' =>'La marca ya éxiste','icono'=>'warning');
                    } else {
                        $msg =array('msg' =>'Error al registrar la marca','icono'=>'error');
                    }
                }else {
                    $data=$this->model->modificarMarca($nombre,$id);
                    if($data == "modificado") {
                        $msg =array('msg' =>'Marca modificado con éxito','icono'=>'success');
                    }else {
                        $msg =array('msg' =>'Error al modificado la marca','icono'=>'error');
                    } 
                }
                
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar_marca(int $id){
            $data = $this->model->editarMarca($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar_marca(int $id){
            $data = $this->model->accionMarca(0, $id);
            if($data ==1){
                $msg =array('msg' =>'Marca dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar la marca','icono'=>'error');

            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar_marca(int $id){
            $data = $this->model->accionMarca(1,$id);
            if($data ==1){
                $msg =array('msg' =>'Marca reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar la marca','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        // Fin de Marcas 
        //************************************/
        // Inicio de categorias
        public function categorias(){
            $this->views->getView($this,"categorias");
        }
        public function listar_categorias(){
            $data = $this->model->getCategorias();
            for ($i =0; $i<count($data); $i++){
                if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary mb-2" type="button" onclick="btnEditarCateg('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarCateg('.$data[$i]['id'].');"><i class="fas fa-trash"></i></button>
                    </div>';
                }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarCateg('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                    </div>';
                }    
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function registrar_categoria(){
            $nombre=$_POST['nombre'];
            $id=$_POST['id'];
            if(empty($nombre)){
                $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
            }else{
                if ($id== "") {
                    $data=$this->model->registrarCategoria($nombre);
                    if($data == "ok") {
                        $msg =array('msg' =>'Categoría registrado con éxito','icono'=>'success');
                    }else if($data == "existe"){
                        $msg =array('msg' =>'La categoría ya éxiste','icono'=>'warning');
                    } else {
                        $msg =array('msg' =>'Error al registrar la categoría','icono'=>'error');
                    }
                }else {
                    $data=$this->model->modificarCategoria($nombre,$id);
                    if($data == "modificado") {
                        $msg =array('msg' =>'Categoría modificado con éxito','icono'=>'success');
                    }else {
                        $msg =array('msg' =>'Error al modificado la categoría','icono'=>'error');
                    } 
                } 
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar_categoria(int $id){
            $data = $this->model->editarCategoria($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar_categoria(int $id){
            $data = $this->model->accionCateg(0, $id);
            if($data ==1){
                $msg =array('msg' =>'Categoría dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar la categoría','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar_categoria(int $id){
            $data = $this->model->accionCateg(1,$id);
            if($data ==1){
                $msg =array('msg' =>'Categoría reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar la categoría','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        // Fin de categorias
        //********************************** */
        // Inicio de unidades
        public function unidades(){
            $this->views->getView($this, "unidades");
        }
        public function listar_unidades(){
            $data = $this->model->getUnidades();
            for ($i =0; $i<count($data); $i++){
                if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary mb-2" type="button" onclick="btnEditarUni('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarUni('.$data[$i]['id'].');"><i class="fas fa-trash"></i></button>
                    </div>';
                }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarUni('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                    </div>';
                }    
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function registrar_unidad(){
            $nombre=$_POST['nombre'];
            $id=$_POST['id'];
            if(empty($nombre)){
                $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
            }else{
                if ($id== "") {
                    $data=$this->model->registrarUnidad($nombre);
                    if($data == "ok") {
                        $msg =array('msg' =>'Unidad registrado con éxito','icono'=>'success');
                    }else if($data == "existe"){ 
                        $msg =array('msg' =>'La unidad ya éxiste','icono'=>'warning');
                    } else {
                        $msg =array('msg' =>'Error al registrar la unidad','icono'=>'error');
                    }
                }else {
                    $data=$this->model->modificarUnidad($nombre,$id);
                    if($data == "modificado") {
                        $msg =array('msg' =>'Unidad modificado con éxito','icono'=>'success');
                    }else {
                        $msg =array('msg' =>'Error al modificado la unidad','icono'=>'error');
                    } 
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar_unidad(int $id){
            $data = $this->model->editarUnidad($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar_unidad(int $id){
            $data = $this->model->accionUnidad(0, $id);
            if($data ==1){
                $msg =array('msg' =>'Unidad dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar la unidad','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar_unidad(int $id){
            $data = $this->model->accionUnidad(1,$id);
            if($data ==1){
                $msg =array('msg' =>'Unidad reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar la unidad','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        // Fin de unidades
        //********************************** */
    }
    
?>