<?php
// create a new task
require '../config/Database.php';
require '../models/TaskManager.php';

// create a new task
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $todo_task = $data['todo'] ?? null;
    if(isset($todo_task)){
        createTask($todo_task, $pdo);
    }else{
        echo json_encode([
            "error" => "todo cannot be empty"
        ]);
    }
}