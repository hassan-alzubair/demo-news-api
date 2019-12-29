<?php

include 'config.php';

if (empty($_GET['id'])){
    header('Content-Type: application/json');
    echo json_encode([
        'status' => false,
        'message' => 'id is empty'
    ]);
    exit;
}

$id = intval($_GET['id']);

$query = mysqli_query($conn,"SELECT * FROM news WHERE id = '$id' ");

if (mysqli_num_rows($query) == 0){
    header('Content-Type: application/json');
    echo json_encode([
        'status' => false,
        'message' => 'id is invalid'
    ]);
    exit;
}

$obj = mysqli_fetch_object($query);
header('Content-Type: application/json');
echo json_encode([
    'status' => true,
    'news' => [
        'id' => $obj->id,
        'title' => $obj->title,
        'short_body' => $obj->short_body,
        'body' => $obj->body
    ]
]);