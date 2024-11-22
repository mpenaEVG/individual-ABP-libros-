<?php
class existe{

  private $mysqli;
  public function __construct($dbconexion)
  { 
    $this->mysqli = $dbconexion;
  }

  public function existe($username){

    $sql= 'SELECT nombre FROM administracion WHERE nombre = ?';
    $stmt = $this->mysqli->prepare($sql);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
      return true;
    }else{
      return false;
    }
  }
}
