<?php 


require __DIR__ . '/../modelo/modificarPassword.php';

class modRegControl{

  private $control;

  public function __construct($dbconexion)
  {
    $this->control = new modPasswd($dbconexion);
  }

  public function modificar($nombre,$password){
    if($this->control->modificar($nombre,$password)){
      return true;
    }else{
      throw new Exception("Error, no se ha podido cambiar la contraseña");
      
    }
  }

}
