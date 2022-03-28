<?php
    class UsuariosModel extends Query{
        private $usuario, $nombre, $contrasena, $id_caja, $id, $estado;
        public function __construct(){
            parent::__construct();
        }
        public function getUsuario(string $usuario, string $contrasena){
            $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
            $data = $this->select($sql);
            return $data;
        }
        public function getUsuario_home($id_usuario){
            $sql = "SELECT * FROM usuarios WHERE id=$id_usuario";
            $data = $this->select($sql);
            return $data;
        }
        public function getCargos(){
            $sql = "SELECT * FROM cargos WHERE estado=1";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function getAlmacenes(){
            $sql = "SELECT * FROM almacenes WHERE estado=1";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function getIdentidades(){
            $sql = "SELECT * FROM identidades WHERE estado=1";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function getUsuarios(){
            $sql = "SELECT u.*, c.id AS id_cargo, c.nombre AS cargo, a.id AS id_almacen, a.nombre AS almacen, i.id AS id_identidad, i.nombre AS identidad FROM usuarios u INNER JOIN cargos c ON u.id_cargo = c.id INNER JOIN almacenes a ON  u.id_almacen = a.id INNER JOIN identidades i ON u.id_identidad =i.id";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function registrarUsuario(string $usuario, string $contrasena, string $id_cargo, string $id_almacen, string $nombre, string $id_identidad, string $n_identidad, string $telefono, string $correo, string $direccion){
            $this->usuario = $usuario;
            $this->contrasena = $contrasena;
            $this->id_cargo = $id_cargo;
            $this->id_almacen = $id_almacen;
            $this->nombre = $nombre;
            $this->id_identidad = $id_identidad;
            $this->n_identidad = $n_identidad;
            $this->telefono = $telefono;
            $this->correo = $correo;
            $this->direccion =$direccion;
            $verificar="SELECT * FROM usuarios WHERE usuario='$this->usuario '";
            $existe=$this ->select($verificar);
            if(empty($existe)){
                $sql ="INSERT INTO usuarios(usuario, contrasena, id_cargo, id_almacen, nombre, id_identidad, n_identidad, telefono, correo, direccion) VALUES (?,?,?,?,?,?,?,?,?,?)";
                $datos = array($this->usuario, $this->contrasena, $this->id_cargo, $this->id_almacen, $this->nombre,$this->id_identidad, $this->n_identidad, $this->telefono, $this->correo, $this->direccion);
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
        public function modificarUsuario(string $usuario, string $id_cargo, string $id_almacen, string $nombre, string $id_identidad, string $n_identidad, string $telefono, string $correo, string $direccion, int $id){
            $this->usuario = $usuario;
            $this->id_cargo = $id_cargo;
            $this->id_almacen = $id_almacen;
            $this->nombre = $nombre;
            $this->id_identidad = $id_identidad;
            $this->n_identidad = $n_identidad;
            $this->telefono = $telefono;
            $this->correo = $correo;
            $this->direccion =$direccion;
            $this->id = $id;
            $sql ="UPDATE usuarios SET usuario =?, id_cargo = ?, id_almacen=?, nombre=?, id_identidad=?, n_identidad=?, telefono=?, correo=?, direccion=? WHERE id=?";
            $datos = array($this->usuario, $this->id_cargo, $this->id_almacen,$this->nombre, $this->id_identidad, $this->n_identidad, $this->telefono, $this->correo, $this->direccion, $this->id);
            $data =$this->save($sql, $datos);
            if($data ==1){
                    $res= "modificado";
            }else{
                    $res= "Error";
            }
            return $res;
                
        }
        public function editarUser(int $id){
            $sql = "SELECT * FROM usuarios WHERE id =$id";
            $data = $this->select($sql);
            return $data;
        }
        public function accionUser(int $estado, int $id){
            $this->id= $id;
            $this->estado =$estado;
            $sql = "UPDATE usuarios SET estado=? where id=? ";
            $datos= array($this->estado, $this->id);
            $data = $this->save ($sql, $datos);
            return $data;
        }
}
?>