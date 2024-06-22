<?php
// backend/routes/web.php

include_once '../config/db.php';
include_once '../controller/taskcontroller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'create') {
        // Lógica para crear una tarea
        $taskController = new TaskController();
        $taskController->createTask($_POST['title'], $_POST['description']);
    } elseif ($_POST['action'] === 'update') {
        // Lógica para actualizar una tarea
        $taskController = new TaskController();
        $taskController->updateTask($_POST['id'], $_POST['title'], $_POST['description']);
    } elseif ($_POST['action'] === 'delete') {
        // Lógica para eliminar una tarea
        $taskController = new TaskController();
        $taskController->deleteTask($_POST['id']);
    } elseif ($_POST['action'] === 'mark') {
        // Lógica para marcar una tarea como completada o pendiente
        $taskController = new TaskController();
        $taskController->markTask($_POST['id'], $_POST['completed']);
    }
}
?>
