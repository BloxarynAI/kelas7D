<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $res = $conn->query("SELECT * FROM announcements ORDER BY created_at DESC");
    $rows = [];
    while($row=$res->fetch_assoc()){ $rows[] = $row; }
    echo json_encode($rows);
} else {
    $data = json_decode(file_get_contents("php://input"), true);
    $title = $data['title'];
    $content = $data['content'];
    $author = $data['author'];
    $conn->query("INSERT INTO announcements (title,content,author) 
                  VALUES ('$title','$content','$author')");
    echo json_encode(["status"=>"success"]);
}