<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar Tarea</h1>
        <?php
        include_once '../../backend/config/db.php';
        include_once '../../backend/models/task.php';

        $database = new Database();
        $db = $database->getConnection();
        $task = new Task($db);

        $id = isset($_GET['id']) ? $_GET['id'] : die('ID de la tarea no encontrado.');

        $taskDetails = $task->getById($id);

        if ($taskDetails) {
            ?>
            <form action="../../backend/routes/web.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $taskDetails['id']; ?>">
                <input type="text" name="title" value="<?php echo htmlspecialchars($taskDetails['titulo']); ?>" required>
                <textarea name="description" required><?php echo htmlspecialchars($taskDetails['descripcion']); ?></textarea>
                <input type="hidden" name="action" value="update">
                <button class="button_text" type="submit">Actualizar Tarea</button>
                <a class="button_text" href="../../frontend/index.php">Cancelar</a>
            </form>
            <?php
        } else {
            echo "Tarea no encontrada.";
        }
        ?>
    </div>
</body>
</html>
