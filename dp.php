<?php
$host = "localhost";
$user = "root";  // ganti sesuai servermu
$pass = "";
$db   = "kelas7d";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode(["status"=>"error","message"=>"DB error"]));
}
?>