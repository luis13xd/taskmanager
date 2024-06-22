<?php

include_once '../config/db.php';
include_once '../models/task.php';

class TaskController {
    private $task;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->task = new Task($db);
    }

    public function createTask($title, $description) {
        $this->task->title = $title;
        $this->task->description = $description;

        if ($this->task->create()) {
            header('Location: ../../frontend/index.php'); 
            exit();
        } else {
            echo json_encode(array('message' => 'Error al crear la tarea.'));
        }
    }

    public function updateTask($id, $title, $description) {
        $this->task->id = $id;
        $this->task->title = $title;
        $this->task->description = $description;

        if ($this->task->update()) {
            header('Location: ../../frontend/index.php'); 
            exit();
        } else {
            echo json_encode(array('message' => 'Error al actualizar la tarea.'));
        }
    }

    public function deleteTask($id) {
        $this->task->id = $id;

        if ($this->task->delete()) {
            header('Location: ../../frontend/index.php'); 
            exit();
        } else {
            echo json_encode(array('message' => 'Error al eliminar la tarea.'));
        }
    }

    public function markTask($id, $completed) {
        $this->task->id = $id;
        $this->task->completed = $completed;

        if ($this->task->markAsCompleted()) {
            header('Location: ../../frontend/index.php'); 
            exit();
        } else {
            echo json_encode(array('message' => 'Error al marcar la tarea como completada.'));
        }
    }
}
?>
