<?php
require_once __DIR__ . '/../Models/Task.php';

class TaskController {
    public function index() {
        $tasks = Task::all();
        require __DIR__ . '/../Views/tasks/index.php';
    }

    public function toggle() {
        if (isset($_POST['id'])) {
            Task::toggleDone($_POST['id']);
        }
        header("Location: /"); // volta para a lista
        exit;
    }
}
