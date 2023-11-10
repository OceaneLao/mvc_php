<?php
//connect DB
$db = connectDB();

//DELETE
if( isset($_GET['id'])){
    
    $picId = strip_tags($_GET['id']);
    // deleteFile = "./uploads/nom_du_fichier.jpeg";
    
    // Sélectionner la requête src dans la table pictures
    $sql = $db->prepare("SELECT src FROM pictures WHERE id=?");
    $sql->execute([$picId]);
    $deleteFile = $sql->fetch(PDO::FETCH_ASSOC);
    
    //Condition quand on clique sur le bouton "DELETE", le fichier se supprime avec unlink dans le dossier 📁 uploads 
    if( isset($deleteFile["src"])){
        unlink($deleteFile["src"]);
        try{
            $sql = "DELETE FROM pictures WHERE id=?"; 
            $stmt = $db->prepare($sql);
            $stmt->bindParam(1, $picId, PDO::PARAM_INT);
            $stmt->execute();
            header("Location: ?page=adminlist");
            exit();
        } 
        catch (Exception $e) {$sqlError=$e->getMessage();
        }
        //if error
        if ( isset($sqlError)){
            echo $sqlError;
        }
    }
}