<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href=shttps://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="users/css/login.css?v=1.0">
    </head>
<body>
    <div id="login">
        <h2>Inicio de sesión</h2>
        <form action="/individual/index.php" method="POST">
            <div class="grupoInput">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Introduce tu nombre de usuario" required>
            </div>
            <div class="grupoInput">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Introduce tu contraseña" required>
           <?php
              if (isset($e) && $e->getMessage()) {
                  echo '<p style="margin: 5px 5px; color: red;">' . $e->getMessage() . '</p>';
              }

              if(isset($exito)){
                echo '<p style="margin: 5px 5px; color: green;">Contraseña cambiada correctamente</p>';
              }
            ?> 
            </div>
            <button type="submit">Entrar</button>
        </form>
        <a href="/individual/users/olvidadoContrasenia.php">He olvidado mi contraseña</a>
        <a href="#">Activar mi cuenta</a>
    </div>

</body>
</html>
