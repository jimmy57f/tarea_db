<?php
// Incluir el archivo 'crud.php' para acceder a las funciones CRUD
include 'crud.php';

// Función para obtener todos los usuarios
function obtenerUsuarios() {
    $db = conectarDB();
    $query = "SELECT * FROM usuarios";
    $result = $db->query($query);
    $usuarios = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $usuarios[] = $row;
    }
    $db->close();
    return $usuarios;
}

// Obtener la lista de usuarios
$usuarios = obtenerUsuarios();

// Mostrar la lista de usuarios en una tabla HTML
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>";
foreach ($usuarios as $usuario) {
    echo "<tr>";
    echo "<td>{$usuario['id']}</td>";
    echo "<td>{$usuario['nombre']}</td>";
    echo "<td>{$usuario['apellido']}</td>";
    echo "<td>{$usuario['edad']}</td>";
    echo "<td>{$usuario['correo']}</td>";
    echo "<td>
            <button onclick=\"editarUsuario('{$usuario['id']}', '{$usuario['nombre']}', '{$usuario['apellido']}', '{$usuario['edad']}', '{$usuario['correo']}')\">Editar</button>
            <a href='crud.php?action=delete&id={$usuario['id']}' onclick=\"return confirm('¿Estás seguro de que deseas eliminar este usuario?');\">Eliminar</a>
          </td>";
    echo "</tr>";
}
echo "</table>";
?>
