<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="/individual/users/css/login.css?v=1.0">
    </head>
<body>
    <div id="login">
        <h2>Recupera contraseña</h2> <form action="/individual/index.php?controlador=verificar" method="POST">
            <div class="grupoInput">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Introduce tu nombre de usuario" required>
           <?php
              if (isset($existe)) {
                if (!$existe) {
                    echo '<p style="color:red;"> El usuario no existe</p>';
                }
              }
            ?>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
