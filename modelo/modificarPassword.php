<?php  

class modPasswd{

    private $db;

    public function __construct($db){
        
      $this->db = $db;
    }

    public function modificar($nombre,$password){
        
      try {
        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $stmt = $this->db->prepare('UPDATE administracion SET contrasenia = ? WHERE nombre = ?');
        $stmt->bind_param('ss',$password_hash,$nombre);
        $stmt->execute();
        if($stmt->affected_rows > 0){
          return true;
        }else{
          return false;
        }
      } catch (Throwable $th) {
        throw new Exception("Error al preparar la consulta SQL.");
      }

    }

}
