<?php
require_once 'Conexion.php';


class Excursion implements JsonSerializable {
  private $codigo;
  private $categoria;
  private $nombre;
  private $precio;
  private $imagen;
  private $oferta;
  private $novedad;
  private $detalle;
  private $fecha_publicacion;
  
  function __construct($codigo, $categoria, $nombre, $precio, $imagen, $oferta, $novedad, $detalle,$fecha_publicacion) {
    $this->codigo = $codigo;
    $this->categoria = $categoria;
    $this->nombre = $nombre;
    $this->precio = $precio;
	$this->imagen = $imagen;
	$this->oferta = $oferta;
	$this->novedad = $novedad;
	$this->detalle = $detalle;
    $this->fecha_publicacion = $fecha_publicacion;
  }
  public function getCodigo() {
    return $this->codigo;
  }
  public function getCategoria() {
    return $this->categoria;
  }
  public function getNombre() {
    return $this->nombre;
  }
  public function getPrecio() {
    return $this->precio;
  }  
  
  public function getImagen() {
    return $this->imagen;
  } 
  public function getOferta() {
    return $this->oferta;
  } 
  public function getNovedad() {
    return $this->novedad;
  } 
  public function getDetalle() {
    return $this->detalle;
  } 
  public function getFecha_publicacion() {
    return $this->fecha_publicacion;
  }  
  public static function insertExcursion($datos) {
    $conexion = Conexion::connectDB();
    $insercion = "INSERT INTO excursiones (codigo, categoria, nombre, precio, imagen, oferta, novedad, detalle, fecha_publicacion) " .
				"VALUES ('$datos[codigo]', '$datos[categoria]', '$datos[nombre]', "
                . "'$datos[precio]', '$datos[imagen]', '$datos[oferta]', "
                . "'$datos[novedad]', '$datos[detalle]', '$datos[fecha_publicacion]')";
    $conexion->exec($insercion);
  }
  public static function deleteExcursion($codigo) {
    $conexion = Conexion::connectDB();
    $borrado = "DELETE FROM excursiones WHERE codigo='".$codigo."'";
    $conexion->exec($borrado);
  }
  
  public static function updateExcursion($datos, $codigoAntiguo) {
    $conexion = Conexion::connectDB();
    $modifica = "UPDATE excursiones SET codigo='$datos[codigo]', categoria='$datos[categoria]', nombre='$datos[nombre]', "
              . "precio='$datos[precio]', imagen='$datos[imagen]', oferta='$datos[oferta]', "
              . "novedad='$datos[novedad]', detalle='$datos[detalle]', fecha_publicacion='$datos[fecha_publicacion]' WHERE codigo='$codigoAntiguo'";
	$conexion->exec($modifica);
  }
  
  public static function getExcursiones() {
    $conexion = Conexion::connectDB();
    $seleccion = "SELECT * FROM excursiones";
    $consulta = $conexion->query($seleccion);
    $excursiones = [];
	
    while ($registro = $consulta->fetchObject()) {
      $excursiones[] = new Excursion($registro->codigo, $registro->categoria, $registro->nombre, $registro->precio, $registro->imagen, $registro->oferta, $registro->novedad, $registro->detalle, $registro->fecha_publicacion);
    }
   
    return $excursiones;    
  }
  
  public static function getExcursionById($codigo) {
    $conexion = Conexion::connectDB();
    $seleccion = "SELECT codigo, categoria, nombre, precio, imagen, oferta, novedad, detalle, fecha_publicacion FROM excursiones WHERE codigo=\"".$codigo."\"";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
	
	if ($registro == false) {
		$excursion = new Excursion("", "", "", "", "", "", "", "", ""); 
	} else {
		$excursion = new Excursion($registro->codigo, $registro->categoria, $registro->nombre, $registro->precio, $registro->imagen, $registro->oferta, $registro->novedad, $registro->detalle, $registro->fecha_publicacion);
	}
    return $excursion;    
  }
  
  public static function getExcursionesOrdenadas($columna, $orden) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM excursiones ORDER BY ".$columna." ".$orden;
        $consulta = $conexion->query($select);
        
        $excursiones = [];
        
        while ($excursion = $consulta->fetchObject()) {
            $excursiones[] = new Excursion ($excursion->codigo, $excursion->categoria, $excursion->nombre, $excursion->precio, $excursion->imagen, $excursion->oferta, $excursion->novedad, $excursion->detalle, $excursion->fecha_publicacion);
        }
        
        return $excursiones;
    }  
	 public static function getExcursionCompletaById($codigo) { 
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM excursiones WHERE codigo='$codigo'";
        $consulta = $conexion->query($select);
        $listado = $consulta->fetchObject();
        
        $excursion = new Excursion ($listado->codigo, $listado->categoria, $listado->nombre, $listado->precio, $listado->imagen, $listado->oferta, $listado->novedad, $listado->detalle, $listado->fecha_publicacion);
                
        return $excursion;    
    }
    
    public static function getExcursionesCompletaByCategoria($categoria) { 
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM excursiones WHERE categoria='$categoria'";
        $consulta = $conexion->query($select);
        
        $excursiones = [];
        
        while ($excursion = $consulta->fetchObject()) {
            $excursiones[] = new Excursion ($excursion->codigo, $excursion->categoria, $excursion->nombre, $excursion->precio, $excursion->imagen, $excursion->oferta, $excursion->novedad, $excursion->detalle, $excursion->fecha_publicacion);
        }   
		
        return $excursiones;    
    }    
    
       public static function getNovedades() { 
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM excursiones WHERE novedad='si'";
        $consulta = $conexion->query($select);
        
        $excursiones = [];
        
        while ($excursion = $consulta->fetchObject()) {
            $excursiones[] = new Excursion ($excursion->codigo, $excursion->categoria, $excursion->nombre, $excursion->precio, $excursion->imagen, $excursion->oferta, $excursion->novedad, $excursion->detalle, $excursion->fecha_publicacion);
        }   
		
        return $excursiones;    
    }    
        public static function getOfertas() { 
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM excursiones WHERE oferta='si'";
        $consulta = $conexion->query($select);
        
        $excursiones = [];
        
        while ($excursion = $consulta->fetchObject()) {
            $excursiones[] = new Excursion ($excursion->codigo, $excursion->categoria, $excursion->nombre, $excursion->precio, $excursion->imagen, $excursion->oferta, $excursion->novedad, $excursion->detalle, $excursion->fecha_publicacion);
        }   
		
        return $excursiones;    
    } 

	public function jsonSerialize() {
		return [
			"codigo" => $this->codigo,
			"categoria" => $this->categoria,
			"nombre" => $this->nombre,
			"precio" => $this->precio,
			"imagen" => $this->imagen,
			"oferta" => $this->oferta,
			"novedad" => $this->novedad,
			"detalle" => $this->detalle,
			"fechaPublicacion" => $this->fecha_publicacion
		];
	}

}
