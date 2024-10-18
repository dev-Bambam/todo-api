<?php
require '../config/Database.php';
require '../model/TaskManager.php';

// get all todo
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'] ?? null;

    if (isset($id)){
        deleteTask($id, $pdo);
    }
}