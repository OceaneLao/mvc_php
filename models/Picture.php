<?php
require_once("./services/class/Database.php"); // Charger un seul fichier

class Picture{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAll($nb=null) 
    {
        //Indiquer la limite
        $limit = !is_null($nb) ? "LIMIT " . $nb : "";
        $pictures = [];
        $db = new Database();
        $pictures = $db->query("SELECT * FROM pictures ORDER BY id DESC". $limit);
        return $pictures;
    }

}