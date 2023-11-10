<?php
//Connect DB
$db = connectDB();

//UPDATE
if( isset($_POST['Update'])){
    
    // print_r($_POST); echo '<hr>';
    // > UPDATE gallery
    try{
         $stmt = $db->prepare("UPDATE pictures SET src=?, title=?, description=?, author=? WHERE id=?");
        $stmt->execute(array(
            $_POST['src'],
            $_POST['title'],
            $_POST['description'],
            $_POST['author'],
            $_GET['id']
        )); // Sécurité
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

// --- on charge la vue
include "./views/layout.phtml";