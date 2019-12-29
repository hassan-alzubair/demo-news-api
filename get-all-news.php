<?php

include 'config.php';

$query = mysqli_query($conn,'SELECT * FROM `news` order by id desc');

$news = [];

while($obj = mysqli_fetch_object($query)){
    $news[] = [
        'id' => $obj->id,
        'title' => $obj->title,
        'short_body' => $obj->short_body
    ];
}

header('Content-Type: application/json');
echo json_encode([
    'status' => true,
    'news' => $news
]);