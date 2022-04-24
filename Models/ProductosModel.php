<?php
    class ProductosModel extends Query{
        private $codigo, $descripcion, $precio_compra, $precio_venta, $id_medida,$id_categoria,$id,$estado, $img;
       //Inicio de Productos
        public function __construct(){
            parent::__construct();
        }
        public function getMedidas(){
            $sql="SELECT * FROM medidas WHERE estado=1";
            $data=$this->selectAll($sql);
            return $data;
        }
        public function getCategorias(){
            $sql="SELECT * FROM categorias WHERE estado=1";
            $data=$this->selectAll($sql);
            return $data;
        }
        public function getProductos(){
            $sql="SELECT p.*, m.id AS id_medida, m.nombre AS medida, c.id AS id_categoria, c.nombre As categoria FROM productos p INNER JOIN medidas m ON p.id_medida = m.id INNER JOIN categorias c ON p.id_categoria= c.id";
            $data= $this->selectAll($sql);
            return $data;
        }
        public function registrarProdcutos(string $codigo, string $descripcion, string $precio_compra, string $precio_venta, string $id_medida, string $id_categoria, string $img ){
            $this->codigo = $codigo;
            $this->descripcion = $descripcion;
            $this->precio_compra = $precio_compra;
            $this->precio_venta = $precio_venta;
            $this->id_medida = $id_medida;
            $this->id_categoria = $id_categoria;
            $this->img = $img;
            $verificar="SELECT * FROM productos WHERE descripcion = '$this->descripcion'";
            $existe=$this->select($verificar);
            if (empty($existe)) {
                $sql="INSERT INTO productos(codigo, descripcion, precio_compra, precio_venta , id_medida, id_categoria, imagen) VALUES(?,?,?,?,?,?,?)";
                $datos= array($this->codigo, $this->descripcion, $this->precio_compra, $this->precio_venta, $this->id_medida, $this->id_categoria, $this->img);
                $data= $this->save($sql, $datos);
                    if($data == 1){
                        $res = "ok";
                    }else{
                        $res="error";
                    }
            }else {
                $res="existe";
            }
            return $res;
        }
        public function modificarProductos(string $codigo, string $descripcion, string $precio_venta, string $id_medida, string $id_categoria, string $img, int $id){
            $this->codigo=$codigo;
            $this->descripcion=$descripcion;
            $this->precio_venta=$precio_venta;
            $this->id = $id;
            $this->id_medida= $id_medida;
            $this->id_categoria=$id_categoria;
            $this->img=$img;
            $sql ="UPDATE productos SET  codigo=?, descripcion=?, precio_venta=?, id_medida=?, id_categoria=?, imagen=?  WHERE id=?";
            $datos= array($this->codigo, $this->descripcion, $this->precio_venta, $this->id_medida, $this->id_categoria, $this->img, $this->id);
            $data = $this->save($sql,$datos);
            if($data ==1){
                $res = "modificado";
            }else {
                $res = "Error";
            }
            return $res;
        }
        public function editarProductos(int $id){
            $sql= "SELECT * FROM productos WHERE id=$id";
            $data=$this->select($sql);
            return $data;
        }
        public function accionProd(int $estado, int $id){
            $this->id=$id;
            $this->estado=$estado;
            $sql = "UPDATE productos SET  estado =? WHERE id=?";
            $datos = array($this->estado, $this->id);
            $data = $this->save($sql, $datos);
            return $data;
        }
        //fin de productos
        //******************************************************************* */
        //Inicio de marcas
        public function getMarcas(){
            $sql="SELECT * FROM marcas";
            $data= $this->selectAll($sql);
            return $data;
        }
        public function registrarMarca(string $nombre){
            $this->nombre =$nombre;
            $verificar="SELECT * FROM marcas WHERE nombre = '$this->nombre'";
            $existe=$this->select($verificar);
            if (empty($existe)) {
                $sql="INSERT INTO marcas (nombre) VALUES (?)";
                $datos= array( $this->nombre);
                $data=$this->save($sql, $datos);
                if ($data == 1){
                        $res = "ok";
                }else{
                        $res = "error";
                    }
            }else{
                $res ="existe";
            }
            
            return $res;
        }
        public function modificarMarca( string $nombre, int $id){
            $this->nombre =$nombre;
            $this->id=$id;
            $sql="UPDATE marcas SET nombre=? WHERE id=?";
            $datos= array($this->nombre, $this->id);
            $data=$this->save($sql, $datos);
                if ($data == 1){
                    $res = "modificado";
                }else{
                    $res = "error";
                }
            return $res;
        }
        public function editarMarca(int $id){
            $sql = "SELECT * FROM marcas WHERE id = $id";
            $data = $this->select($sql);
            return $data;
        }
        
        public function accionMarca(int $estado, int $id){
            $this->id=$id;
            $this->estado=$estado;
            $sql = "UPDATE marcas SET  estado =? WHERE id=?";
            $datos = array($this->estado, $this->id);
            $data = $this->save($sql, $datos);
            return $data;
        }
        //fin de marcas
    }
?>