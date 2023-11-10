<?php
require_once("./services/database.php"); // Charger un seul fichier

class Picture{
    //Affiche toutes les images
    public static function getAll() {
        $pictures = [];
        $db = connectDB();
        $sql = $db->prepare("SELECT * FROM pictures ORDER BY id DESC");
        $sql->execute();
        $pictures = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $pictures;
    }

}