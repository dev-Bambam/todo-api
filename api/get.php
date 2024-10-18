<?php
require '../config/Database.php';
require '../model/TaskManager.php';

// get all todo
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    getTasks($pdo);
}