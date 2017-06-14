
<?php
abstract class Conexion {
  private static $server = 'localhost';
  private static $db = 'u955539718_viaje';
  private static $user = 'u955539718_root';
  private static $password = '9c3XcNly35qs';
  
  
  public static function connectDB() {
    try {
      $conexion = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";charset=utf8", self::$user, self::$password);
   
      } catch (PDOException $e) {
          
      echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
      die ("Error: " . $e->getMessage());
    }
 
    return $conexion;
  }
}
