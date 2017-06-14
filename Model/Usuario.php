<?php
require_once 'Conexion.php';

class Usuario implements JsonSerializable {
    
    private $id;
    private $usuario;
    private $password;
   
    
    function __construct($id, $usuario, $password) {
        
            $this->id = $id;
            $this->usuario = $usuario;
            $this->password = $password;          
    }
    
    public static function getUsuarios() { 
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM usuario";
        $consulta = $conexion->query($select);
        
        $usuarios = [];
        
        while ($usuario = $consulta->fetchObject()) {
            $usuarios[] = new Usuario ($usuario->id, $usuario->usuario, $usuario->password);
        }
        
        return $usuarios;
    }

    public static function getUsuariosOrdenados($columna, $orden) { 
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM usuario ORDER BY ".$columna." ".$orden;
        $consulta = $conexion->query($select);
        
        $usuarios = [];
        
        while ($usuario = $consulta->fetchObject()) {
            $usuarios[] = new Usuario ($usuario->id, $usuario->usuario, $usuario->password);
        }
        
        return $usuarios;
    }     
  
    public static function getUsuarioByID($id) { 
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM usuario WHERE usuario='$id'";
        $consulta = $conexion->query($select);
        $listado = $consulta->fetchObject();
        
        $usuario = new Usuario ($listado->id, $listado->usuario, $listado->password);
                
        return $usuario;    
    }
    
    
    public static function getUsuarioByUsuario($us) { 
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM usuario WHERE usuario='$us'";
        $consulta = $conexion->query($select);
        $listado = $consulta->fetchObject();
        
        $usuario = new Usuario ($listado->id, $listado->usuario, $listado->password);
                
        return $usuario;    
    }    
    
    public static function actualizaUsuario($datos) { 
        $conexion = Conexion::connectDB();
        $update = "UPDATE usuario SET usuario='$datos[usuario]', password='$datos[password]'";
        $conexion->exec($update);
    }
    
    public static function borraUsuarioById($id) {
        $conexion = Conexion::connectDB();
        $conexion->exec("DELETE FROM usuario WHERE id='$id'");
    }
    
    public static function insertaUsuario($datos) { 
        $conexion = Conexion::connectDB();
        $insert = "INSERT INTO usuario (usuario, password) VALUES ('$datos[usuario]', '$datos[password]')";
        $conexion->exec($insert);
    }    
    
    function getId() {
        return $this->id;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getPassword() {
        return $this->password;
    }

    
    public function jsonSerialize() {
        return [
            "id" => $this->id,
            "usuario" => $this->usuario,
            "password" => $this->password,
        ];
    }
}

