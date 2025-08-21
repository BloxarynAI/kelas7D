<?php
include "db.php";
$data = json_decode(file_get_contents("php://input"), true);

$username = $data['username'];
$fullname = $data['fullname'];
$password = md5($data['password']);
$role     = $data['role'];

$sql = "INSERT INTO users (username, fullname, password, role) 
        VALUES ('$username','$fullname','$password','$role')";

if ($conn->query($sql)) {
    echo json_encode(["status"=>"success"]);
} else {
    echo json_encode(["status"=>"error","message"=>$conn->error]);
}