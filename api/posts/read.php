<?php

header("Allow-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once "../../config/Database.php";
include_once "../../models/Post.php";

// instantiating Database and connection
$database = new Database();
$conn = $database->connection();

$posts = new Post($conn);
$result = $posts->readPost();

if ($result->rowCount() > 1) {
    $posts_arr = array();
    $posts_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $res_arr = array(
            'post_id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category' => $category_name,
            'created_at' => $created_at
        );

        array_push($posts_arr['data'], $res_arr);
    }
    echo json_encode($posts_arr);
} else {
    echo json_encode(array(
        'Message' => "No Post found"
    ));
}
