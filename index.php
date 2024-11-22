<?php 
require __DIR__ . '/controlador/sonIguales.php';
require __DIR__ . '/modelo/dbConnect.php';
require __DIR__ . '/controlador/AuthControl.php';
require __DIR__ . '/controlador/ModfPasswdControl.php';
require __DIR__ . '/versiexisteuser.php';
try{

  $dbConexion = (new DatabaseConnection())->getConnection();
  $authController = new authControl($dbConexion);

  if($_SERVER['REQUEST_METHOD'] === 'POST'){

   if(isset($_GET['controlador'])){
    switch ($_GET['controlador']) {
      case 'verificar':
            $usernameVerify = trim($_POST['username']);
            $obj= new existe($dbConexion);
            $existe = $obj->existe($usernameVerify);
            if($existe){
              require __DIR__ . '/users/nuevasContrasenias.php';
            }else{
              require __DIR__ . '/users/olvidadoContrasenia.php';
            }
        break;
      case 'insertar': 
        $usernameModify = $_POST['usuario'];
         $nueva_psswd = trim($_POST['new_password']);
        $repeat_psswd = trim($_POST['repeat_password']);
         $iguales = sonIguales::siOno($nueva_psswd,$repeat_psswd);

          if($iguales){
            $exito = (new modRegControl($dbConexion))->modificar($usernameModify,$nueva_psswd);
            if($exito){
                require __DIR__ . '/users/login.php';
            }
          }else{
            require __DIR__ . '/users/nuevasContrasenias.php';
          }
        break;
      default:
        break;
    }   

    }else{
      $username = trim($_POST['username']) ?? '';
      $password = trim($_POST['password']) ?? '';

      $authController->login($username,$password);
    }
  }else{
    require __DIR__ . '/users/login.php';
  }
}catch (Exception $e){
  
  require __DIR__ . '/users/login.php';

}
