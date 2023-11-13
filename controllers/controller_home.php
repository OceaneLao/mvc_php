<?php
    require_once ("./services/class/Database.php");
    $db = new Database();
    $pictures = $db->query("SELECT * FROM pictures ORDER BY id DESC LIMIT 10");
// --- la vue
include "./views/layout.phtml";