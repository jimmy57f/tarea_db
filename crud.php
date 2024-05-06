<?php
// Función para conectar con la base de datos SQLite
function conectarDB() {
    return new SQLite3('usuarios.db');
}

// Función para crear la tabla 'usuarios' si no existe
function crearTablaUsuarios() {
    $db = conectarDB();
    $query = "CREATE TABLE IF NOT EXISTS usuarios (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nombre TEXT,
                apellido TEXT,
                edad INTEGER,
                correo TEXT
            )";
    $db->exec($query);
    $db->close();
}

// Crear la tabla 'usuarios' si no existe
crearTablaUsuarios();

// Agregar un nuevo usuario
if (isset($_GET['action']) && $_GET['action'] == 'add') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $correo = $_POST['correo'];
        
        $db = conectarDB();
        $query = "INSERT INTO usuarios (nombre, apellido, edad, correo) VALUES ('$nombre', '$apellido', $edad, '$correo')";
        $db->exec($query);
        $db->close();
        header("Location: index.php");
    }
}

// Editar un usuario existente
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $correo = $_POST['correo'];
        
        $db = conectarDB();
        $query = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', edad=$edad, correo='$correo' WHERE id=$id";
        $db->exec($query);
        $db->close();
        header("Location: index.php");
    }
}

// Eliminar un usuario
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = conectarDB();
    $query = "DELETE FROM usuarios WHERE id=$id";
    $db->exec($query);
    $db->close();
    header("Location: index.php");
}
?>
