<?php
include "db.php";
$res = $conn->query("SELECT * FROM login_logs ORDER BY time DESC");
$rows = [];
while($row=$res->fetch_assoc()){ $rows[] = $row; }
echo json_encode($rows);