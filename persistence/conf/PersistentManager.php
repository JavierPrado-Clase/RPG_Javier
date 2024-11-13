<?php

class PersistentManager {

  // Instancia privada de conexión.
  private static $instance = null;
  // Conexión a BD
  private static $connection = null;
  // Parámetros de conexión a la BD.
  private $userBD = "";
  private $psswdBD = "";
  private $nameBD = "";
  private $hostBD = "";

  // Obtiene la instancia de la conexión (Patrón Singleton).
  public static function getInstance() {
    if (!self::$instance instanceof self) {
      self::$instance = new self;
    }
    return self::$instance;
  }

  // Constructor privado: solo se debe crear una instancia de esta clase.
  private function __construct() {
    $this->establishCredentials();

    // Intentamos la conexión a la base de datos
    PersistentManager::$connection = mysqli_connect($this->hostBD, $this->userBD, $this->psswdBD, $this->nameBD);
    
    // Configurar la codificación de caracteres
    mysqli_query(PersistentManager::$connection, "SET NAMES 'utf8'");
}

  // Lee las credenciales de conexión desde un archivo JSON.
  private function establishCredentials() {
    $dir = __DIR__;  // Obtiene el directorio actual de la clase.
    
    if (file_exists( $dir.'\credentials.json')) {
      $credentialsJSON = file_get_contents($dir.'\credentials.json');
      $credentials = json_decode($credentialsJSON, true);

      $this->userBD = $credentials["user"];
      $this->psswdBD = $credentials["password"];
      $this->nameBD = $credentials["name"];
      $this->hostBD = $credentials["host"];
    
    }
  }

  // Cierra la conexión con la base de datos.
  public function close_connection() {
    if (self::$connection) {
      mysqli_close(self::$connection);  // Cierra la conexión usando el objeto de conexión.
    }
  }

  // Retorna la instancia de la conexión
  public function get_connection() {
    if (PersistentManager::$connection) {
        return PersistentManager::$connection;
    } else {
        die("No se pudo obtener la conexión.");
    }
}


  // Métodos getter para los parámetros de configuración de la BD.
  public function get_hostBD() {
    return $this->hostBD;
  }

  public function get_usuarioBD() {
    return $this->userBD;
  }

  public function get_psswdBD() {
    return $this->psswdBD;
  }

  public function get_nombreBD() {
    return $this->nameBD;
  }

}

?>
