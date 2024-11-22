<?php  

class controlInicioSesion {

    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function verificarUser($nombre, $password){

        try {
            // Preparamos la consulta para obtener la contraseña hasheada
            $stmt = $this->db->prepare('SELECT contrasenia FROM administracion WHERE nombre = ?');
            $stmt->bind_param('s', $nombre); // Pasamos el nombre
            $stmt->execute();
            $result = $stmt->get_result();

            // Si encontramos un usuario con ese nombre
            if ($result->num_rows > 0) {
                // Obtenemos la contraseña hasheada almacenada en la base de datos
                $row = $result->fetch_assoc();
                $storedPassword = $row['contrasenia'];

                // Verificamos si la contraseña proporcionada coincide con la almacenada
                if (password_verify($password, $storedPassword)) {
                    // Contraseña correcta
                    return true;
                } else {
                    // Contraseña incorrecta
                    return false;
                }
            } else {
                // Si no se encuentra el usuario
                return false;
            }
        } catch (Throwable $th) {
            throw new Exception("Error al preparar la consulta SQL.");
        }
    }

}
