<?php
// create a new task
require '../config/Database.php';
require '../model/TaskManager.php';

// create a new task
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $todo_task = $data['todo'] ?? null;
    if(isset($todo_task)){
        createTask($todo_task, $pdo);
    }
}