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
        public function getCajas(){
            $sql = "SELECT * FROM caja WHERE estado=1";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function getUsuarios(){
            $sql = "SELECT u.*, c.id as id_caja, c.caja FROM usuarios u INNER JOIN caja c where u.id_caja = c.id";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function registrarUsuario(string $usuario, string $nombre, string $contrasena, string $id_caja){
            $this->usuario = $usuario;
            $this->nombre = $nombre;
            $this->contrasena = $contrasena;
            $this->id_caja = $id_caja;
            $verificar="SELECT * FROM usuarios WHERE usuario='$this->usuario '";
            $existe=$this ->select($verificar);
            if(empty($existe)){
                $sql ="INSERT INTO usuarios(usuario, nombre, contrasena, id_caja) VALUES (?,?,?,?)";
                $datos = array($this->usuario, $this->nombre, $this->contrasena, $this->id_caja);
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
        public function modificarUsuario(string $usuario, string $nombre, string $id_caja, int $id){
            $this->usuario = $usuario;
            $this->nombre = $nombre;
            $this->id = $id;
            $this->id_caja = $id_caja;
            $sql ="UPDATE usuarios SET usuario =?, nombre = ?, id_caja=? WHERE id=?";
            $datos = array($this->usuario, $this->nombre, $this->id_caja, $this->id);
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