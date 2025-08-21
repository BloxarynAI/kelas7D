<?php
session_start();
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);
$username = $data['username'];
$password = md5($data['password']);

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$res = $conn->query($sql);

if ($res->num_rows == 1) {
    $user = $res->fetch_assoc();
    $_SESSION['user'] = $user;

    $conn->query("INSERT INTO login_logs (username) VALUES ('$username')");
    echo json_encode(["status"=>"success", "user"=>$user]);
} else {
    echo json_encode(["status"=>"error", "message"=>"Login gagal"]);
}