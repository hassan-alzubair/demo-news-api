<?php

include 'config.php';

if(!$_POST) die('error');

// return error if title is empty
if(empty($_POST['title'])){
    header('Content-Type: application/json');
    echo json_encode([
        'status' => false,
        'message' => 'title is empty'
    ]);
    die;
}

// return error if short body is empty
if(empty($_POST['short_body'])){
    header('Content-Type: application/json');
    echo json_encode([
        'status' => false,
        'message' => 'short body is empty'
    ]);
    die;
}


// return error if body is empty
if(empty($_POST['body'])){
    header('Content-Type: application/json');
    echo json_encode([
        'status' => false,
        'message' => 'body is empty'
    ]);
    die;
}

// put values into variables
$title = $_POST['title'];
$short_body = $_POST['short_body'];
$body = $_POST['body'];

// insert values
$result = mysqli_query($conn,"INSERT INTO `news` (`title`, `short_body`, `body`) VALUES ('$title', '$short_body', '$body');");

// if result is ok return a success message
if ($result) {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => true,
        'message' => 'news added successfully'
    ]);
}else{
    header('Content-Type: application/json');
    echo json_encode([
        'status' => false,
        'message' => 'there is an error'
    ]);
}