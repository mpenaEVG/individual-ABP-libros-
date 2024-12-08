<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="/individual-ABP/users/css/login.css?v=1.0">
    </head>
<body>
    <div id="login">
        <h2>Recuperar Contraseña</h2>

         <form action="index.php?controlador=insertar" method="POST">
            <div class="grupoInput">
                <i class="fas fa-user"></i>
                    <div class="grupoInput">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="new_password" placeholder="Introduce tu nueva contraseña" required>
                        <?php 
                          echo '<input type="hidden" name="usuario" value="'. $usernameVerify .'">'
                        ?>
                    </div>
                    <div class="grupoInput">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="repeat_password" placeholder="Repite tu nueva contraseña" required>
                    </div>
                <?php
                          if(isset($iguales)){
                            if(!$iguales){
                              echo '<p style="color:red">Las contraseñas no coinciden</p>';
                            }
                          }
                ?>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>

</body>
</html>
