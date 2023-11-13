<?php
require_once ("./models/Picture.php");
$db = new Database();
$pictures = $db->query("SELECT * FROM pictures ORDER BY id DESC LIMIT 10");
header('content-type:application/json');
echo json_encode($pictures);