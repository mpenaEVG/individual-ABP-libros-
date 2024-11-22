<?php 

require __DIR__ . '/../modelo/controlInicioSesion.php';

class authControl {

  private $controlInicio;

  public function __construct ($dbConexion){

    $this->controlInicio = new controlInicioSesion($dbConexion);
  }

  public function login($nombre,$password){
    if(empty($nombre) || empty($password)){
      throw new Exception("Usuario o contraseña vacías");
    }

    if($this->controlInicio->verificarUser($nombre,$password)){

      $this->redirect('admin/index.html');
    }else{
      throw new Exception("Credenciales Incorrectas");
    }
  }

  private function redirect($url){
    header('Location: '. $url);
    exit;
  }
}
