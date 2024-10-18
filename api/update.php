<?php
require '../model/TaskManager.php';
require '../config/Database.php';

// get all todo
if ($_SERVER['REQUEST_METHOD'] === 'UPDATE') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id']?? null;
    $task = $data['task'] ?? null;

    if(isset($id, $task)){
        updateTask($id, $task, $pdo);
    }
} 