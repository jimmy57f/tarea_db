<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con SQLite y PHP</title>
</head>
<body>
    <h2>Agregar Usuario</h2>
    <form action="crud.php?action=add" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="number" name="edad" placeholder="Edad" required>
        <input type="email" name="correo" placeholder="Correo" required>
        <button type="submit">Agregar</button>
    </form>

    <h2>Lista de Usuarios</h2>
    <?php include 'listar_usuarios.php'; ?>

    <!-- Formulario para editar usuario -->
    <div id="editar-form" style="display: none;">
        <h2>Editar Usuario</h2>
        <form action="crud.php?action=edit" method="POST">
            <input type="hidden" name="id" id="edit-id">
            <input type="text" name="nombre" id="edit-nombre" required>
            <input type="text" name="apellido" id="edit-apellido" required>
            <input type="number" name="edad" id="edit-edad" required>
            <input type="email" name="correo" id="edit-correo" required>
            <button type="submit">Actualizar</button>
        </form>
    </div>

    <!-- JavaScript para manejar la edición -->
    <script>
        function editarUsuario(id, nombre, apellido, edad, correo) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-nombre').value = nombre;
            document.getElementById('edit-apellido').value = apellido;
            document.getElementById('edit-edad').value = edad;
            document.getElementById('edit-correo').value = correo;
            document.getElementById('editar-form').style.display = 'block';
        }
    </script>
</body>
</html>
