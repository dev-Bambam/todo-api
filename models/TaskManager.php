<?php
require '../config/Database.php';

function createTask($title, $pdo) {
    $sql = "INSERT INTO tasks (title) VALUES (:title)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->execute();
    echo json_encode([
        "message" => 'todo created'
    ]);
    return $pdo->lastInsertId();
} 
// function to delete a task
function deleteTask($id, $pdo) {
    $sql = "DELETE FROM tasks WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();  
}

// function to update a task
function updateTask($id, $title, $pdo) {
    $sql = "UPDATE tasks SET title = :title, WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo json_encode([
        "message" => 'todo updated'
    ]); 
}
// function to get all tasks
function getTasks($pdo) {
    $sql = "SELECT * FROM tasks";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // check if there are tasks
    if ($stmt->rowCount() === 0) {
        echo json_encode([
            "message" => "No tasks found"
        ]);
        return;
    }else{
        echo json_encode([
            "message" => "Tasks found",
            "tasks" => $tasks
        ]);
    }
}