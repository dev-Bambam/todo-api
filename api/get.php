<?php
require '../model/TaskManager.php';
require '../config/Database.php';

// get all todo
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    getTasks($pdo);
}