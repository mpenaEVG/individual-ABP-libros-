<?php 

class databaseconnection {

  private $mysqli;
  
  public function __construct(){
    $this->connect();
  }
  
  private function connect() {
    require __DIR__ . '/../modelo/configdb.php';

    try {
      $this->mysqli = new mysqli($host, $user, $passwd, $db);
    } catch (Throwable $th) {

         throw  new Exception('Error al conectarse a la base de datos');
    }
  }

  public function getconnection() {
    return $this->mysqli;
  }
}
