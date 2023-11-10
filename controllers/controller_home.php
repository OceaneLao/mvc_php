<?php
require_once ("./models/Picture.php");
$model = new Picture();
$pictures = Picture::getAll();
// --- la vue
include "./views/layout.phtml";