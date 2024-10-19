<?php

function createTask($title, $pdo) {
    $sql = "INSERT INTO tasks (title) VALUES (:title)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->execute();
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
    $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($stmt);
}