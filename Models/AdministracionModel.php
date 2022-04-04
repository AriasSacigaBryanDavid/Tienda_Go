<?php
    class AdministracionModel extends Query{
    
    public function __construct(){
            parent::__construct();
    }
     // Inicio de Configuracion de Empresa
    public function getEmpresa(){
        $sql = "SELECT * FROM configuracion";
        $data = $this->select($sql);
        return $data;
    }
    public function modificar(String $nombre, string $ruc, string $telefono, string $direccion, string $mensaje, int $id ){ 
        $sql="UPDATE configuracion SET nombre=?,ruc=?, telefono=?, direccion=?, mensaje=? WHERE id=?";
        $datos= array($nombre, $ruc, $telefono, $direccion, $mensaje, $id);
        $data=$this->save($sql, $datos);
        if ($data == 1){
                $res = "ok";
        }else{
                $res = "error";
        }
        return $res;
    }
    // Inicio de Cargos
    public function getCargos(){
        $sql="SELECT * FROM cargos";
        $data= $this->selectAll($sql);
        return $data;
    }
    public function registrarCargo(string $nombre){
        $this->nombre =$nombre;
        $verificar="SELECT * FROM cargos WHERE nombre = '$this->nombre'";
        $existe=$this->select($verificar);
        if (empty($existe)) {
            $sql="INSERT INTO cargos (nombre) VALUES (?)";
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
    public function modificarCargo( string $nombre, int $id){
        $this->nombre =$nombre;
        $this->id=$id;
        $sql="UPDATE cargos SET nombre=? WHERE id=?";
        $datos= array($this->nombre, $this->id);
        $data=$this->save($sql, $datos);
            if ($data == 1){
                $res = "modificado";
            }else{
                $res = "error";
            }
        return $res;
    }
    public function editarCargo(int $id){
        $sql = "SELECT * FROM cargos WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function accionCargo(int $estado, int $id){
        $this->id=$id;
        $this->estado=$estado;
        $sql = "UPDATE cargos SET  estado =? WHERE id=?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
    // Inicio de Almacenes
    public function getUsuarios(){
        $sql = "SELECT * FROM usuarios WHERE estado=1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getAlmacenes(){
        $sql="SELECT * FROM almacenes";
        $data= $this->selectAll($sql);
        return $data;
    }

    }
    
    


?>