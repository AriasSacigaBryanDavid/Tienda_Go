<?php
    class ProductosModel extends Query{
       //Inicio de Productos
        public function __construct(){
            parent::__construct();
        }
        public function getMarcas_productos(){
            $sql="SELECT * FROM marcas WHERE estado=1";
            $data=$this->selectAll($sql);
            return $data;
        }
        public function getCategorias_productos(){
            $sql="SELECT * FROM categorias WHERE estado=1";
            $data=$this->selectAll($sql);
            return $data;
        }
        public function getUnidades_productos(){
            $sql="SELECT * FROM unidades WHERE estado=1";
            $data=$this->selectAll($sql);
            return $data;
        }
        public function getProductos(){
            $sql = "SELECT p.*, m.id AS id_marca, m.nombre AS marca, c.id As id_categoria, c.nombre AS categoria, u.id AS id_unidad, u.nombre AS unidad FROM productos p INNER JOIN marcas m ON p.id_marca = m.id INNER JOIN categorias c ON p.id_categoria = c.id INNER JOIN unidades u ON p.id_unidad = u.id; ";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function registrarProducto(string $codigo,string $nombre,string $descripcion, string $id_marca, string $id_categoria, string $id_unidad, string $precio_compra, string $precio_venta){
            $this->codigo= $codigo;
            $this->nombre = $nombre;
            $this->descripcion =$descripcion;
            $this->id_marca = $id_marca;
            $this->id_categoria = $id_categoria;
            $this->id_unidad = $id_unidad;
            $this->precio_compra = $precio_compra;
            $this->precio_venta = $precio_venta;
            $verificar="SELECT * FROM productos WHERE nombre='$this->nombre'";
            $existe=$this ->select($verificar);
            if(empty($existe)){
                $sql ="INSERT INTO productos(codigo, nombre, descripcion, id_marca, id_categoria, id_unidad, precio_compra, precio_venta) VALUES (?,?,?,?,?,?,?,?)";
                $datos = array($this->codigo, $this->nombre, $this->descripcion, $this->id_marca, $this->id_categoria, $this->id_unidad, $this->precio_compra, $this->precio_venta);
                $data =$this->save($sql, $datos);
                if($data ==1){
                    $res= "ok";
                }else{
                    $res= "Error";
                }
            }else {
                $res="existe";
            }
            
            return $res;
        }
        public function modificarProducto(string $codigo, string $nombre,string $descripcion, string $id_marca, string $id_categoria, string $id_unidad, string $precio_compra, string $precio_venta, int $id){
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->descripcion =$descripcion;
            $this->id = $id;
            $this->id_marca = $id_marca;
            $this->id_categoria=$id_categoria;
            $this->id_unidad= $id_unidad;
            $this->precio_compra =$precio_compra;
            $this->precio_venta =$precio_venta;
            $sql ="UPDATE productos SET codigo=? ,nombre =?, descripcion = ?, id_marca=?, id_categoria=?, id_unidad =?, precio_compra =?, precio_venta =? WHERE id=?";
            $datos = array($this->codigo, $this->nombre, $this->descripcion, $this->id_marca, $this->id_categoria,$this->id_unidad, $this->precio_compra, $this->precio_venta, $this->id);
            $data =$this->save($sql, $datos);
            if($data ==1){
                    $res= "modificado";
            }else{
                    $res= "Error";
            }
            return $res;
                
        }
        public function editarProd(int $id){
            $sql = "SELECT * FROM productos WHERE id =$id";
            $data = $this->select($sql);
            return $data;
        }
        public function accionProd(int $estado, int $id){
            $this->id= $id;
            $this->estado =$estado;
            $sql = "UPDATE productos SET estado=? where id=? ";
            $datos= array($this->estado, $this->id);
            $data = $this->save ($sql, $datos);
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
        // fin de marcas
        //******************************************************************* */
        // inicio de categorias
        public function getCategorias(){
            $sql="SELECT * FROM categorias";
            $data= $this->selectAll($sql);
            return $data;
        }
        public function registrarCategoria(string $nombre){
            $this->nombre =$nombre;
            $verificar="SELECT * FROM categorias WHERE nombre = '$this->nombre'";
            $existe=$this->select($verificar);
            if (empty($existe)) {
                $sql="INSERT INTO categorias (nombre) VALUES (?)";
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
        public function modificarCategoria( string $nombre, int $id){
            $this->nombre =$nombre;
            $this->id=$id;
            $sql="UPDATE categorias SET nombre=? WHERE id=?";
            $datos= array($this->nombre, $this->id);
            $data=$this->save($sql, $datos);
                if ($data == 1){
                    $res = "modificado";
                }else{
                    $res = "error";
                }
            return $res;
        }
        public function editarCategoria(int $id){
            $sql = "SELECT * FROM categorias WHERE id = $id";
            $data = $this->select($sql);
            return $data;
        }
        public function accionCateg(int $estado, int $id){
            $this->id=$id;
            $this->estado=$estado;
            $sql = "UPDATE categorias SET  estado =? WHERE id=?";
            $datos = array($this->estado, $this->id);
            $data = $this->save($sql, $datos);
            return $data;
        }
        // fin de categorias
        //******************************************************************* */ 
        // Inicio de unidades
        public function getUnidades(){
            $sql="SELECT * FROM unidades";
            $data= $this->selectAll($sql);
            return $data;
        }
        public function registrarUnidad(string $nombre){
            $this->nombre =$nombre;
            $verificar="SELECT * FROM unidades WHERE nombre = '$this->nombre'";
            $existe=$this->select($verificar);
            if (empty($existe)) {
                $sql="INSERT INTO unidades (nombre) VALUES (?)";
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
        public function modificarUnidad( string $nombre, int $id){
            $this->nombre =$nombre;
            $this->id=$id;
            $sql="UPDATE unidades SET nombre=? WHERE id=?";
            $datos= array($this->nombre, $this->id);
            $data=$this->save($sql, $datos);
                if ($data == 1){
                    $res = "modificado";
                }else{
                    $res = "error";
                }
            return $res;
        }
        public function editarUnidad(int $id){
            $sql = "SELECT * FROM unidades WHERE id = $id";
            $data = $this->select($sql);
            return $data;
        }
        public function accionUnidad(int $estado, int $id){
            $this->id=$id;
            $this->estado=$estado;
            $sql = "UPDATE unidades SET  estado =? WHERE id=?";
            $datos = array($this->estado, $this->id);
            $data = $this->save($sql, $datos);
            return $data;
        }
        // Fin de unidades
        //******************************************************************* */
    }
?>