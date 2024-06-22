<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
    <link rel="stylesheet" href="../frontend/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Tareas</h1>
        <form action="../backend/routes/web.php" method="POST">
            <input type="text" name="title" placeholder="Título de la tarea" required>
            <textarea name="description" placeholder="Descripción de la tarea" required></textarea>
            <input type="hidden" name="action" value="create">
            <button class="button_text" type="submit">Añadir Tarea</button>
        </form>
        <h2>Tareas</h2>
        <div class="filters">
            <button onclick="filterTasks('all')">Todas</button>
            <button onclick="filterTasks('completed')">Completadas</button>
            <button onclick="filterTasks('pending')">Pendientes</button>
        </div>
        <div id="task-list">
            <?php
            include_once '../backend/config/db.php';
            include_once '../backend/models/task.php';

            $database = new Database();
            $db = $database->getConnection();
            $task = new Task($db);
            
            $stmt = $task->read();
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="task" data-completed="' . $row['completado'] . '">';
                echo '<h3>' . $row['titulo'] . '</h3>';
                echo '<p>' . $row['descripcion'] . '</p>';
                echo '<p class="date_text">Fecha: ' . $row['fechaRegistro'] . '</p>';
                echo '<div class="buttons_group">';
                
                // Formulario para editar tarea
                echo '<form action="../frontend/includes/edit.php" method="GET">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<button class="button_text" type="submit">Editar</button>';
                echo '</form>';

                // Formulario para eliminar tarea
                echo '<form action="../backend/routes/web.php" method="POST" style="display: inline;">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<input type="hidden" name="action" value="delete">';
                echo '<button class="button_text" type="submit">Eliminar</button>';
                echo '</form>';

                // Formulario para marcar tarea como completada/pendiente
                echo '<form action="../backend/routes/web.php" method="POST" style="display: inline;">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<input type="hidden" name="action" value="mark">';
                echo '<input type="hidden" name="completed" value="' . ($row['completado'] == '0' ? '1' : '0') . '">';
                echo '<button class="button_text" type="submit">' . ($row['completado'] == '0' ? 'Marcar como Completada' : 'Marcar como Pendiente') . '</button>';
                echo '</form>';

                echo '</div></div>';
            }
            ?>
        </div>
    </div>
    <script src="../frontend/js/scripts.js"></script>
</body>
</html>
