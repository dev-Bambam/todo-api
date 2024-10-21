<?php
$_REQUEST   = $_SERVER['REQUEST_METHOD'];

switch ($_REQUEST) {
    case 'GET':
        include '../api/get.php';
        break;
    case 'POST':
        include '../api/post.php';
        break;
    case 'DELETE':
        include '../api/delete.php';
        break; 
    case 'UPDATE':
        include '../api/update.php';
        break;
    default:
        header('Content-Type: application/json', 404);
        echo json_encode([
            "error" => "REQUEST NOT FOUND"
        ]);
        break;
}